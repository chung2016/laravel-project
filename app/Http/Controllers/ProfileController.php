<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function update(UpdateProfileRequest $request) {
        auth()->user()->update($request->only('name'));
        if ($request->input('password')) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
        }
        return back()->with('success', 'Profile updated successfully.');
    }
}
