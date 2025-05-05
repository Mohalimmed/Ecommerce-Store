<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.profile.edit', [
            'user' => $user,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
    }


    public function update(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|size:2',
            'birthday' => 'nullable|date|before:today',
        ]);
        $user = $request->user();

        $user->profile->fill($request->all())->save();

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully');
        // $profile = $user->profile;
        // if ($profile->user_id) {
        //     $profile->update($data);
        // } else {
        //     $user->profile()->create($data);
        // }
    }
}
