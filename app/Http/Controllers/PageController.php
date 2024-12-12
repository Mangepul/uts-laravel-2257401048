<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PageController extends Controller
{
    public function __construct()
    {
        // Middleware sudah diatur di routes, jadi bisa dihapus dari constructor
        // Atau bisa tetap dipakai sebagai alternative dari middleware di routes
        $this->middleware('auth')->only(['home']);
        $this->middleware('guest')->only(['login', 'register', 'registerSubmit', 'loginSubmit']);
    }

    public function welcome()
    {
        // Tambahkan pengecekan user yang sudah login
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('welcome');
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:users,nim|max:20',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Tambahkan confirmed untuk password confirmation
        ]);

        User::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'kelas' => $validated['kelas'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Tambahkan flash message
        return redirect()->route('login')
            ->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) { // Tambahkan remember me
            $request->session()->regenerate();
            
            // Redirect ke intended URL jika ada
            return redirect()->intended(route('home'))
                ->with('success', 'Login berhasil!');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password salah.',
            ]);
    }

    public function home()
    {
        $user = auth()->user();
        
        return view('home', [
            'nim' => $user->nim,
            'nama' => $user->nama,
            'kelas' => $user->kelas
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('welcome')  // Ubah ke welcome page
            ->with('success', 'Anda telah berhasil logout.');
    }
}
