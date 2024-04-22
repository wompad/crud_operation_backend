<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){
        // Validate incoming data
        $validatedData = $request->validate([
            'firstname'         => 'required|string|max:255',
            'middlename'        => 'string|max:255',
            'lastname'          => 'required|string|max:255',
            'birthdate'         => 'required|string|max:255',
            'present_address'   => 'required|string|max:255',
            'contact_number'    => 'required|string|max:255',
            'email_address'     => 'required|string|max:255'
        ]);
        
        // Create user
        $user = User::create($validatedData);
        
        return response()->json(['message' => 'User successfully registered', 'user' => $user], 201);
    }

    public function get_users(){
        $users = User::all();
        return response()->json($users);
    }

    public function update_user(Request $request, $user_id){

        $user = User::findOrFail($user_id);
        $user->update($request->all());
        return response()->json(['message' => 'User successfully update', 'user' => $user], 201);

    }

    public function delete_user(User $user){

        $user->delete();
        return response()->json(['message' => 'User successfully deleted']);

    }
}
