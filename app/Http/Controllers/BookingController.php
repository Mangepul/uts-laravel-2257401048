<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan form booking
     */
    public function create()
    {
        return view('booking');
    }

    /**
     * Menyimpan booking baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'email' => 'required|email',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'jumlah_tamu' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        // Buat booking baru
        $booking = Booking::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'jumlah_tamu' => $request->jumlah_tamu,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('booking.success')
            ->with('success', 'Booking berhasil! Terima kasih telah memilih NGAWAG RESORT.');
    }

    /**
     * Menampilkan halaman sukses booking
     */
    public function success()
    {
        return view('booking.success');
    }
}
