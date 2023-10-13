<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $posts = User::where('name', 'like', '%' . $query . '%')->get();

        return view('search', compact('posts', 'query'));
    }
}


