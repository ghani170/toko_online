@extends('layoutadmin.admin')
@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
 </div>
@if ($errors->any())
 <div class="alert alert-danger">
    <strong>Terjadi kesalahan</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
 </div>
 @endif

 <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama Produk:</label>
        <input type="text" name="name" class="form-input" value="{{ old('name' ,$product->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Harga:</label>
        <input type="number" name="price" class="form-input" value="{{ old('price' ,(int) $product->price) }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi:</label>
        <textarea name="description" id="" class="form-input">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stok:</label>
        <input type="number" name="stock" class="form-input" value="{{ old('stock', $product->stock) }}">
    </div>

   <div>
    <label for="image" class="form-label">Gambar Produk (Biarkan Kosong jika tidak ingin diubah):</label>
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="" width="120px" class="mb-2">
    @endif
    <input type="file" name="image" class="form-control">
   </div><br>

    <button type="submit" class="form-button">Simpan</button>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="margin-top: 10px;">Kembali</a>
 </form>
 </div>
 

@endsection 