<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'Birthdate' => ['required','date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

       // Mendapatkan nilai maksimum dari kolom 'KEY'
       $prefix = "KEY";
       $maxId = User::where('KEY', 'like', $prefix . '%')->max('KEY');

        // Jika tidak ada nilai maksimum (tabel kosong atau belum ada dengan awalan tersebut), mulai dari 1
        if (!$maxId) {
            $nextNumber = 1;
        } else {
            // Mendapatkan dua digit terakhir dari $maxId
            $twoDigitLast = substr($maxId, -2);

            // Mengonversi dua digit terakhir ke angka
            $lastTwoDigits = (int)$twoDigitLast;

            // Menambahkan satu ke dua digit terakhir
            $nextNumber = $lastTwoDigits + 1;

            // Jika nilai $nextNumber melebihi 99, atur kembali ke 1
            $nextNumber = $nextNumber > 99 ? 1 : $nextNumber;
        }

        // Format nilai berikutnya dengan menambahkan dua huruf di awal
        $newKey = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

       $user = User::create([
           'name' => $request->name,
           'Birthdate' => $request->Birthdate,
           'KEY' => $newKey,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
