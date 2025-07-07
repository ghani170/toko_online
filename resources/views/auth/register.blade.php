@extends('layoutauth.auth')
@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="POST" style="margin-bottom: 15px;">
        @csrf
        <div style="text-align: center;">
        <input type="text" id="name" name="name" placeholder="Masukan Nama" style="margin-bottom: 17px;" required>

        <input type="email" id="email" name="email" placeholder="Masukan Email" style="margin-bottom: 17px;" required>

        <input type="password" id="password" name="password" placeholder="Masukan Password" style="margin-bottom: 17px;" required>
        </div>

        <button style="margin-left: 26px;" type="submit" class="btn btn-primary">Register</button>
    </form>
        <p style="margin-left: 26px;">Sudah punya akun?<a href="{{ route('login') }}">Login</a></p>

@endsection
