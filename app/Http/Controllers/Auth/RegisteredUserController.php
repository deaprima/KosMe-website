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
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'phone_number' => ['required', 'string', 'max:15'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required'],
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'terms' => ['required', 'accepted'],
            ], [
                'name.required' => 'Nama lengkap wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'phone_number.required' => 'Nomor telepon wajib diisi',
                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password_confirmation.required' => 'Konfirmasi password wajib diisi',
                'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
                'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
            ]);

            // Check if email already exists
            if (User::where('email', $request->email)->exists()) {
                return back()->withErrors(['email' => 'Email sudah terdaftar'])->withInput();
            }

            // Check if phone number already exists
            if (User::where('phone_number', $request->phone_number)->exists()) {
                return back()->withErrors(['phone_number' => 'Nomor telepon sudah terdaftar'])->withInput();
            }

            // Handle avatar upload
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
            } else {
                $avatarPath = 'avatar/avatar-default.jpg';
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'avatar' => $avatarPath,
                'role' => 'user',
                'password' => Hash::make($request->password),
            ]);

            if (!$user) {
                return back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar'])->withInput();
            }

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false))->with('success', 'Registrasi berhasil! Silakan verifikasi email Anda.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }
}
