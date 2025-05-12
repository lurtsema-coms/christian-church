<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'title' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'web_page' => 'nullable|url',
            'birthday' => 'nullable|date',
            'wedding_anniv' => 'nullable|date',
            'date_baptism' => 'nullable|date',
            'testimony' => 'nullable|string',
            'extra_detail' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'contact_number' => $request->contact_number,
            'web_page' => $request->web_page,
            'birthday' => $request->birthday,
            'wedding_anniv' => $request->wedding_anniv,
            'date_salvation' => $request->date_salvation,
            'date_baptism' => $request->date_baptism,
            'testimony' => $request->testimony,
            'extra_detail' => $request->extra_detail,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return to_route('admin_accounts');
    }
}
