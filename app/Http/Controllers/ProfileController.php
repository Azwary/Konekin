<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\joins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dasboard()
    {
        $joint = joins::all();
        return view('profile/userdshbrd', compact('joint'));
        // return view('profile/userdshbrd');
    }
    public function profile()
    {
        return view('profile/usermyprofile');
    }
     public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Update existing profile fields
        $user->fill($data);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Generate unique filename based on user name and current timestamp
            $filename = $user->name . '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();

            // Store the new avatar in public/images/avatars
            $avatarPath = $request->file('avatar')->storeAs('images/avatars', $filename, 'public');

            // Delete the old avatar (if exists)
            if ($user->avatar) {
                // Check if the avatar exists before attempting to delete
                if (Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }

            // Update user's avatar field with the new file name
            $user->avatar = $avatarPath;
        }

        // Save changes to the user model
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
