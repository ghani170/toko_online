@extends('layouttoko.toko')
@section('title', 'Edit Profil')

@section('content')
<div class="container d-flex justify-content-center">
<div class="kartu">
<form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-user">
    @csrf
    @method('PUT')
    <h2 style="text-align: center;">Edit Profil</h2>
    @if ($user->photo)
        <img src="{{ asset('storage/' . $user->photo) }}" alt="" width="100px" class="mb-2" style="display: block; margin: auto; border-radius: 50%;">
    @else
        <img src="{{ asset('storage/imag/fotofrofil.jpg') }}" alt="" width="100px" style="display: block; margin: auto; border-radius: 50%;">
    @endif
    <div class="mb-3">
        <label for="" class="form-label">Nama:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Foto:</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <p><a href="{{ route('toko') }}" class="btn btn-secondary" style="margin-top: 10px;">Kembali</a></p>
</form>
</div>
</div>
@endsection