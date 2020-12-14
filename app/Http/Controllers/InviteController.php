<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function invitation($token)
    {
        $invitingAgent = Agent::where('token', $token)->first();

        if(!$invitingAgent) return view('auth.invalid-invitation');

        $idInvitingAgent = $invitingAgent->id;
        // to model
        $role = 'client';

        //repo
        $categories = Category::all();

        return view('auth.register-client', compact('categories', 'role', 'idInvitingAgent'));
    }
}
