<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ability;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(Ability::orderBy('group')->orderBy('name')->get());
    }
}
