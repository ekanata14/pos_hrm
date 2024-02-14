<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('pages.user-management', [
            'users' => User::all(),
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

        // dd($request);

        // $validatedData = $request->validate([
        //     'username' => 'required|max:255|min:2',
        //     'name' => 'required|max:255|min:2',
        //     'email' => 'required|email|max:255|unique:users,email',
        //     'address' => 'required|min:2',
        //     'password' => 'required|min:5|max:255',
        //     'id_role' => 'required' 
        // ]);

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|min:2',
            'password' => 'required|min:5|max:255',
            'id_role' => 'required' 
        ]);


        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['username'] = $request->username;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['adddress'] = $request->address;
        $data['password'] = $request->password;
        $data['id_role'] = $request->id_role;

        User::create($data);

        return "success";

        // dd($validatedData);

        // User::create([
        //     'username' => $request->username,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'id_role' => $request->role,
        //     'password' => Hash::make($request->password)
        // ]);
        
        // return response()->json(['message' => 'User Created Successfully', 'user' => $validatedData], 201);
        // return redirect('/users');
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
        $user = User::findOrFail($id);
        return response()->json(['message' => "User Found", 'user' => $user]);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($attributes);
        
        return response()->json(['message' => 'User Updated Successfully', 'user' => $user], 201); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User Updated Successfully', 'user' => $user], 201); 
    
    }
}
