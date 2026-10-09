<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();

        // Jika admin tidak ada atau password salah
        if (!$admin || $admin->password !== $request->password) {
            return back()->with('error', 'Email atau password salah!');
        }

        // Simpan session admin
        session([
            'admin_id'    => $admin->id,
            'admin_name'  => $admin->name,
            'admin_email' => $admin->email,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name', 'admin_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
