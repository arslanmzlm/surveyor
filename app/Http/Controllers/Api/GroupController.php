<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Repository\GroupRepository;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $groups = new Filter(Group::class);

        return response($groups->userRelated('workspace')->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(Group::all());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group): \Illuminate\Http\Response
    {
        return response($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGroupRequest $request
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group): \Illuminate\Http\Response
    {
        GroupRepository::updateGroup($group);

        return response(Group::find($group->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Group $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $groups): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$groups->delete()]);
    }
}
