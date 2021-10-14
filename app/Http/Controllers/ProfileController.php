<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        //auth()->user()->update($request->all());

        if(auth()->user()->is_institution()){
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->iban = $request->input('iban');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->email = $request->input('email');

            $user->update();
        }

        if(auth()->user()->is_trainer()){
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->profession = $request->input('profession');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            
            if($request->hasFile('cv')){
              $path = $request->file('cv')->store('resume', 'public');
              $user->cv = $path;
            }

            if($request->hasFile('cap')){
              $path = $request->file('cap')->store('cap', 'public');
              $user->cap = $path;
            }

            $user->update();
        }

        return back()->withStatus(__('Perfil actualizado com sucesso.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
