<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChooseRoleController extends Controller
{
    public function chooseRole()
    {
        return view('choose-role');
    }


}
