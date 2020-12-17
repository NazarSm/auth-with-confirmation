<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerAgent()
    {
        //
    }

    //naming
    public function registerClient($role)
    {
        if($role == 'client'){
            $categories = Category::all();

            return view('auth.register-client', compact('categories', 'role'));
        }

        return view('auth.register-agent', compact( 'role'));


    }

}
