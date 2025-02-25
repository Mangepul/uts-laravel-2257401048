<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PageController extends Controller
{
    public function welcome()
    {

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
        $user = auth()->user(); // Ambil data user yang sedang login

        // Pastikan data pengguna ada
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Kirim data pengguna ke halaman resort (home.blade.php)
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

    public function booking($id)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Contoh data kamar (ganti dengan query database)
        $kamar = [
            'id' => $id,
            'nama' => 'Deluxe Room 101',
            'harga' => 'Rp 1.000.000/malam',
            'deskripsi' => 'Kamar dengan pemandangan taman dan fasilitas lengkap.'
        ];

        return view('booking', compact('kamar')); // Hanya kirim $kamar ke view
    }

    // Tambahan fungsi untuk profile
    public function profile()
    {
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:users,nim,' . $user->id,
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
    }

    public function changePassword()
    {
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        return view('profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Verifikasi password saat ini
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->with('error', 'Password saat ini tidak cocok');
        }


        return redirect()->route('profile')
            ->with('success', 'Password berhasil diubah');
    }
}
