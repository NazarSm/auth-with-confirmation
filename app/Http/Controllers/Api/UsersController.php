<?php


namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;

class UsersController
{

    public function getTokenInvitation()
    {
        return Auth::user()->agent->token;
    }
}
