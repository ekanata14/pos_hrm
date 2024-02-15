<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show(string $id)
    {

        return view('pages.user-profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:5',
            'id_role' => 'required' 
        ]);

        $user = User::findOrFail($request->id_user);
        $user->update($validatedData);
        return back()->with('succes', 'Profile succesfully updated');
    }
}
