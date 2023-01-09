<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();
            // only allow people with @company.com to login
            if (explode("@", $user->email)[1] !== 'lpkia.ac.id') {
                return redirect()->to('/')->with('error', 'Gunakan Email dengan domain @lpkia.');;
            }
            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                $newUser->assignrole('dosen');

                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
