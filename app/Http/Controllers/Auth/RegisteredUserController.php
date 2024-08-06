<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $section = Section::where('name', $request->section)->first();
        $mfc_id = random_int(1000000, 99999999);


        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make('mfc_portal123'),
            'section_id' => $section->id,
            'contact_number' => $request->contact_number,
            'role_id' => 3,
            'mfc_id_number' => $mfc_id,
        ]);

        $user->assignRole('member');

        event(new Registered($user));

        Auth::login($user);

        // $user->sendEmailVerificationNotification();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
