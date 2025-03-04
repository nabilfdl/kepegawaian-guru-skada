<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function showChangeForm()
    {
        return view('change_password_form'); // Create a view file for the form
    }

    public function changePassword(Request $request)
    {
        // Validate the new password (adjust rules as needed)
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->password_reset_required = false; // Mark the password as changed
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Your password has been changed successfully!');
    }
}
