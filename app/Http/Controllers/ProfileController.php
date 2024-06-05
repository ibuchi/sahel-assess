<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return Response::api([
            'message' => 'Your profile!',
            'data' => Auth::user()
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {

        $user = $request->user();
        $validated = $request->validated();

        $request->whenHas('photo', function ($photo) use ($user, &$validated) {
            if ($user->photo) Storage::disk('public')->delete($user->photo);

            $fileName = Str::slug($validated['name']) . "-profile-image." . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('profile', $fileName, 'public');

            $validated['photo'] = $path;
        });

        $user->fill($validated);

        if ($user->isDirty('email')) $user->email_verified_at = null;

        $user->save();

        return Response::api('Profile updated!');
    }
}
