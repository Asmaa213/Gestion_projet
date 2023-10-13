<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects()
    {
        $projects = project::all();
        return view('/tables', ['projects' => $projects]);
    }

    public function create()
    {
        $teams = team::all();
        return view('new-project', compact('teams'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'team' => 'required',
        ]);
    
        $project = project::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'startdate' => $data['startdate'],
            'enddate' => $data['enddate'],
        ]);
    
        // Récupérez l'équipe associée par son ID
        $team = team::find($data['team']);
    
        // Assurez-vous que l'équipe existe avant de l'associer
        if ($team) {
            // Associez l'équipe au projet
            $project->team()->associate($team);
            $project->save();
        }
    
        return redirect()->route('project_creation')->with('success', 'Project created successfully.');
    }
    

    public function destroy($id)
    {
        $objetASupprimer = project::findOrFail($id);
        $objetASupprimer->delete();

        return redirect()->route('project_creation')->with('success', 'Project deleted successfully.');
    }
}
