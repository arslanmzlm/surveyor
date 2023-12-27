<?php

namespace App\Repository;

use App\Models\Workspace;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class WorkspaceRepository
{
    public static function store(): Workspace
    {
        $workspace = new Workspace();
        $workspace->user_id = request()->user()->id;

        return self::assignAttributes($workspace);
    }

    public static function update(Workspace $workspace): Workspace
    {
        return self::assignAttributes($workspace);
    }

    private static function assignAttributes(Workspace $workspace): Workspace
    {
        $workspace->name = request()->input('name');
        self::storeLogo($workspace);

        $workspace->save();

        $groups = request()->input('groups');
        $groups = is_array($groups) ? array_filter($groups) : null;

        if (!empty($groups)) {
            $groups = collect(request()->input('groups'));
            $groups->transform(function ($item) use ($workspace) {
                $item['workspace_id'] = $workspace->id;
                return $item;
            });

            self::deleteGroups($workspace, $groups);
            GroupRepository::storeOrUpdateMany($groups);
        }

        return $workspace->fresh();
    }

    public static function storeLogo(Workspace $workspace): void
    {
        if (request()->has('logo')) {
            if (request()->input('logo') === null && $workspace->logo !== null) {
                $workspace->logo = null;
            } else if (request()->file('logo')) {
                $file = request()->file('logo');
                $fileName = Str::slug($workspace->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
                $file->storeAs('/public/images/workspaces/logos', $fileName);
                $workspace->logo = $fileName;
            }

        }
    }

    public static function deleteGroups(Workspace $workspace, Collection $groups): void
    {
        if ($workspace->groups()->exists()) {
            $ids = $groups->whereNotNull('id')->pluck('id');
            $workspace->groups()->whereNotIn('id', $ids)->delete();
        }
    }
}
