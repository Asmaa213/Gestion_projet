<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function tables()
    {
        $users = $this->users();
        return view('member-management', ['users' => $users]);
    }

    public function users()
    {
        $users = User::all();
        return $users;
    }

    public function destroy($id)
    {
        $objetASupprimer = User::findOrFail($id);
        $objetASupprimer->delete();

        return redirect()->route('members')->with('success', 'Member deleted successfully.');
    }
}
