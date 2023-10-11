<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkspaceRequest;
use App\Http\Requests\UpdateWorkspaceRequest;
use App\Models\Workspace;
use App\Repository\WorkspaceRepository;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $workspaces = new Filter(Workspace::class);

        return response($workspaces->userOnly()->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(Workspace::whereUserId(request()->user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreWorkspaceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkspaceRequest $request): \Illuminate\Http\Response
    {
        $workspace = WorkspaceRepository::store();

        return response($workspace);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Workspace $workspace
     * @return \Illuminate\Http\Response
     */
    public function show(Workspace $workspace): \Illuminate\Http\Response
    {
        return response($workspace);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateWorkspaceRequest $request
     * @param \App\Models\Workspace $workspace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkspaceRequest $request, Workspace $workspace): \Illuminate\Http\Response
    {
        $workspace = WorkspaceRepository::update($workspace);

        return response($workspace);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Workspace $workspace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workspace $workspace): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$workspace->delete()]);
    }
}
