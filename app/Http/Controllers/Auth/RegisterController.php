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
        $categories = Category::all();

        return view('auth.register-client', compact('categories', 'role'));
    }

}
