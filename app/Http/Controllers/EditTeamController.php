<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;

class EditTeamController extends Controller
{
    public function create($id)
    {
        $teams = team::find($id);
        return view('edit-team' , compact('team'));
    }


    public function update(Request $request)
    {
    
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['max:200'],
        ]);

        $teams = team::find($request->id);
        $teams->name = $request->name;
        $teams->description = $request->description;
    
        $teams->update();
    
        return redirect('user-management')->with('success', 'Team updated successfully');
    }
    
    
}
