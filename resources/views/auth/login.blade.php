@extends('layoutauth.auth')
@section('title', 'login')

@section('content')
    <h2>Login</h2>
    <img src="{{ asset('storage/imag/fotofrofil.jpg') }}" alt="" width="150px" style="border-radius: 50%;">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST" style="margin-bottom: 15px;">
        @csrf
        <div style="text-align: center;">
            
        <input type="email" id="email" name="email" placeholder="Masukan Email" style="margin-bottom: 17px;" required><br>
        <input type="password" id="password" name="password" placeholder="Masukan Password" required><br><br>
        </div>
        <button class="btn btn-primary" type="submit" style="margin-left: 26px;">Login</button>
    </form>
    <p style="margin-left: 26px;">Belum punya akun?<a href="{{ route('register') }}">Register</a></p>
@endsection