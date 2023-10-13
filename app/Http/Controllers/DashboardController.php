<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\User;
use App\Models\project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = $this->users_table();
        $projects = $this->project_table();
        $teams = $this->teams();
        $projectCount = project::count();
        $teamCount = team::count();
        $memberCount = User::count();
        return view('dashboard', ['users' => $users, 'projects' => $projects, 'projectCount' => $projectCount,'teamCount'=> $teamCount,'memberCount'=>$memberCount, 'teams'=>$teams]);
    }
    public function users_table()
    {
        $users = User::all();
        return $users;
    }

    public function project_table()
    {
        $projects = project::all();
        return $projects;
    }

    public function teams()
    {
        $teams = team::all();
        return  $teams;
    }

    
}
