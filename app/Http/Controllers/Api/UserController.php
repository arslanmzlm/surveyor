<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $users = new Filter(User::class);

        return response($users->with(['hospital', 'clinic'])->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request): \Illuminate\Http\Response
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->hospital_id = $request->input('hospital_id');
        $user->clinic_id = $request->input('clinic_id');

        $user->save();

        return response($user);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): \Illuminate\Http\Response
    {
        return response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\Response
    {
        $user->first_name = $request->input('first_name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->hospital_id = $request->input('hospital_id');
        $user->clinic_id = $request->input('clinic_id');

        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$user->delete()]);
    }
}
