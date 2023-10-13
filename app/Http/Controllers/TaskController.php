<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tasks()
    {
        $tasks = task::all();
        return view('task', ['tasks' => $tasks]);
    }

    public function create()
    {
        $users = User::all();
        return view('new-task', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'enddate' => 'required',
            'user' => 'required',
        ]);
    
        $task = task::create([
            'label' => $data['label'],
            'description' => $data['description'],
            'status' => $data['status'],
            'enddate' => $data['enddate'],
        ]);
    
        // Récupérez l'équipe associée par son ID
        $user = User::find($data['user']);
    
        // Assurez-vous que l'équipe existe avant de l'associer
        if ($user) {
            // Associez l'équipe au projet
            $task->user()->associate($user);
            $task->save();
        }
    
        return redirect()->route('tasks')->with('success', 'Task created successfully.');
    }

    public function destroy($id)
    {
        $objetASupprimer = task::findOrFail($id);
        $objetASupprimer->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully.');
    }
}
