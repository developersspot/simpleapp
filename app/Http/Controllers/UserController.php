<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'status' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');

        $user->save();

        return redirect()->route('user.index')->with('status-success', 'User created successfully');
    }

    /**
     * Display the specified resource     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'status' => 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->status = $request->input('status');
        $user->save();

        return redirect()->route('user.edit', ['user' => $user])->with('status-success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status-success', 'User deleted successfully');
    }

    public function changePassword()
    {
        return view('users.change-password');
    }

    public function doChangePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);

        $user = $request->user();
        $curr_password = $request->input('current_password');

        if (!Hash::check($curr_password, $user->password)) {
            return redirect()->route('changePassword')->with('status-warning', 'Invalid Current Password');
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('changePassword')->with('status-success', 'Password updated successfully');
    }
}
