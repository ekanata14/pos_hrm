<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('pages.user-management', [
            'users' => User::all(),
            'usersWithRoles' => DB::table('users')->join('roles', 'users.id_role', '=', 'roles.id_role')->select('users.*', 'roles.name_role as name_role')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:5',
            'password' => 'required|min:5|max:255',
            'id_role' => 'required' 
        ]);

        User::create($validatedData);
        
        // return response()->json(['message' => 'User Created Successfully', 'user' => $validatedData], 201);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json(['message' => "User Found", 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        return view('pages.edit-user', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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
        
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $user->delete();
        return redirect('/users');
    
    }
}
