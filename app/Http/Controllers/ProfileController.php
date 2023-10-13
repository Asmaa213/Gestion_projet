<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function users()
    {
        $users = User::all();
        return $users;
    }

    public function show(User $user)
    {
        return view('profile', compact('user'));
    }

    public function create()
    {
        return view('laravel-examples/user-profile');
    }
}
