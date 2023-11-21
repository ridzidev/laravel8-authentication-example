<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = auth()->user();
    
        if ($request->has('edit')) {
            return view('profile.edit', ['user' => $user]);
        }
    
        return view('profile.show', ['user' => $user]);
    }
    

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:student,teacher,other',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

                // Use a raw SQL query to update the 'role' field.
        DB::table('users')
        ->where('id', $user->id)
        ->update(['role' => $request->input('role')]);

        // Debugging to check the user object after the update
        // dd($user->name);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }


}
