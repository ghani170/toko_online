<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('toko');
            }
        }

        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput(); // <-- supaya input tetap diisi
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);

        Auth::login(($user));
        return redirect('/login')->with('success', 'Registrasi berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function adminDashboard()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    public function toko()
    {
        if (auth()->check() && auth()->user()->role== 'admin'){
            abort(403, 'ADMIN TIDAK BISA MASUK TOKO');  
        }

        $products = Product::all();
        return view('toko.index', compact('products'));

        
        
    }


     public function edit(User $user)
    {
        $user = Auth::user();
        return view('toko.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1000000'
        ]);

        $data = $request->only('name', 'email');

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
        $user->update($data);
        return redirect()->route('toko', $user)->with('success', 'Profil berhasil diperbarui');
    }


}
