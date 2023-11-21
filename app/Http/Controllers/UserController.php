<?php
// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin')->only(['addUser', 'storeUser', 'editUser', 'updateUser']);
    }

    public function addUser()
    {
        $users = User::all();
        return view('admin.add-user', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,teacher,student',
            // Add other validation rules as needed
        ]);


        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => strtolower($request->role),
            // Add other fields as needed
        ]);

        
        // dd($user->all());

        // Save the changes
        // $user->save();


        // Redirect to a success page or back to the form with a success message
        return redirect()->route('addUser')->with('success', 'User updated successfully');
    }

    public function getEditUserModal($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.modal.edit-user-modal', compact('user'));
    }

    // UserController.php
        public function getDeleteUserModal($id)
        {
            $user = User::findOrFail($id);
            return view('layouts.modal.delete-user-modal', compact('user'));
        }

        public function deleteUser($id)
        {
            // Find the user by ID and delete
            User::findOrFail($id)->delete();

            // Redirect to a success page or back to the user list with a success message
            return redirect()->route('addUser')->with('success', 'User deleted successfully');
        }


        public function confirmDeleteUserModal($id)
        {
            $user = User::findOrFail($id);
            return view('modal.delete-user-modal', compact('user'));
        }        


        public function storeUser(Request $request)
        {
            // Validate the form data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8',
                // Add other validation rules as needed
            ]);
    
            // Store the user in the database
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                // Add other fields as needed
            ]);
    
            // Redirect to a success page or back to the form with a success message
            return redirect()->route('addUser')->with('success', 'User added successfully');
        }

        // UserController.php


        


    }



?>