<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        
        $user = Auth::user();
        
        $user->load('gyms');


        return view('users.show', compact('user'));
    }
}
