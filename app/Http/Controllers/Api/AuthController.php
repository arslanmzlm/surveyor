<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(LoginRequest $request): \Illuminate\Http\Response
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('LOGIN');

            return response(['user' => $request->user(), 'token' => $token->plainTextToken]);
        }

        return response(['message' => trans('auth.failed')], 422);
    }
}
