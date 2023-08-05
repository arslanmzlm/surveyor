<?php

namespace App\Repository;

use App\Models\Group;
use App\Models\Workspace;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class WorkspaceRepository
{
    /**
     * Store workspace data.
     *
     * @return \App\Models\Workspace
     */
    public static function store(): \App\Models\Workspace
    {
        $workspace = new Workspace();
        $workspace->user_id = request()->user()->id;
        $workspace->name = request()->input('name');
        if ($file = request()->file('logo')) {
            $fileName = Str::slug($workspace->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
            $file->storeAs('/public/images/workspaces/logos', $fileName);
            $workspace->logo = $fileName;
        }
        $workspace->save();

        self::storeGroups($workspace);

        return $workspace->fresh();
    }

    /**
     * Update workspace data.
     *
     * @param \App\Models\Workspace $workspace
     * @return \App\Models\Workspace
     */
    public static function update(Workspace $workspace): \App\Models\Workspace
    {
        $workspace->name = request()->input('name');
        if ($file = request()->file('logo')) {
            $fileName = Str::slug($workspace->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
            $file->storeAs('/public/images/workspaces/logos', $fileName);
            $workspace->logo = $fileName;
        }
        $workspace->save();

        self::deleteGroups($workspace);

        self::storeGroups($workspace);

        return $workspace->fresh();
    }

    /**
     * Delete groups that are no longer used.
     *
     * @param \App\Models\Workspace $workspace
     * @return mixed
     */
    public static function deleteGroups(Workspace $workspace)
    {
        $groups = collect(request()->input('groups'));

        if ($groups) {
            return $workspace->groups()->whereNotIn('id', $groups->pluck('id'))->delete();
        }

        return true;
    }

    /**
     * Store group data.
     *
     * @param \App\Models\Workspace $workspace
     * @return void
     */
    public static function storeGroups(Workspace $workspace): void
    {
        $groups = request()->input('groups');

        foreach ($groups as $item) {
            /**
             * @var Group $group
             */
            $group = Group::findOrNew($item['id'] ?? null);
            $group->workspace_id = $workspace->id;
            $group->name = $item['name'];
            $group->size = (int)$item['size'];
            if (isset($item['logo']) && $item['logo'] instanceof UploadedFile) {
                $file = $item['logo'];
                $fileName = Str::slug($group->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
                $file->storeAs('/public/images/groups/logos', $fileName);
                $group->logo = $fileName;
            }
            $group->save();
        }
    }
}
