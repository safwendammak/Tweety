<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50)
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('edit', $user);
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'description' => ['string', 'required'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
            'avatar' => ['file'],
            'banner' => ['file'],
        ]);
        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        if (request('banner')) {
            $attributes['banner'] = request('banner')->store('banners');
        }
        $user->update($attributes);
        Alert::toast('Information Updated', 'success');
        return redirect($user->path());
    }
}
