<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Repository\RoleRepository;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $roles = new Filter(Role::class);

        return response($roles->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request): \Illuminate\Http\Response
    {
        $role = RoleRepository::store();

        return response($role);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role): \Illuminate\Http\Response
    {
        return response($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRoleRequest $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role): \Illuminate\Http\Response
    {
        $role = RoleRepository::update($role);

        return response($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$role->delete()]);
    }
}
