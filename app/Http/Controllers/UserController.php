<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);

    }

    public function show(User $user): View
    {
        return view('users.show', ['user' => $user]);
    }

    public function create(): View
    {

        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); // Encrypt the password

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');

    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

public function showDeleteConfirmation(User $user): View
{
    return view('users.delete_confirmation', ['user' => $user]);
}

public function destroy(User $user): RedirectResponse
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}
