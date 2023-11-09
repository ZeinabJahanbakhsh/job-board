<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        //resume
        $fileName = Auth::id() . '-' . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $path     = $request->file('file')->storeAs('uploads-cv', $fileName);

        Auth::user()->candidate()->update([
            'file' => '/storage/' . $path
        ]);

        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
