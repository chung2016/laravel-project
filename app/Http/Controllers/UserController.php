<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('view', User::class);
        $users = User::with('roles')->withCount(['clients'])->get();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $this->authorize('create', User::class);
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = User::create($request->validated()  + ['password' => bcrypt('password')]);
        $user->syncRoles([$request->get('role')]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        $this->authorize('update', $user);
        $roles = Role::pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);
        $user->update($request->validated());
        $user->syncRoles([$request->get('role')]);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
