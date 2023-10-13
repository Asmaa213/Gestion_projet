<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function tables()
    {
        $teams = $this->teams();
        $users = $this->users();
        return view('laravel-examples/user-management', ['users' => $users, 'teams' => $teams]);
    }
    public function teams()
    {
        $teams = team::all();
        return  $teams;
    }

    public function users()
    {
        $users = User::all();
        return $users;
    }

    public function create()
    {
        $teams = $this->teams();
        $users = $this->users();
        return view('new-team', ['users' => $users, 'teams' => $teams]);
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|max:255',
            'description'=>'required',
            'users' => 'required|array',
        ]);

        $team = team::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $team->users()->attach($data['users']);

        return redirect()->route('user-management')->with('success', 'Team created successfully.');
    }

    public function destroy($id)
    {
        $objetASupprimer = team::findOrFail($id);
        $objetASupprimer->delete();

        return redirect()->route('user-management')->with('success', 'Team deleted successfully.');
    }

}
