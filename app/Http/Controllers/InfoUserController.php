<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            'function' => ['max:70'],
            'password' => ['confirmed'],
            'about_me'    => ['max:150'],
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        if($request->get('email') != Auth::user()->email)
        {
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }
        
        
        User::where('id',Auth::user()->id)
        ->update([
            'name'    => $attributes['name'],
            'email' => $attributes['email'],
            'phone'     => $attributes['phone'],
            'function' => $attributes['function'],
            'password' => $attributes['password'],
            'about_me'    => $attributes["about_me"],
        ]);


        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
