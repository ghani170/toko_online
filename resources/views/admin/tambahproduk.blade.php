@extends('layoutadmin.admin')

@section('content')
<div class="container">
    <h2>Tambah Produk</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label">Nama Produk:</label>
            <input type="text" name="name" class="form-input" placeholder="Masukkan nama produk" required>
        </div>

        <div>
            <label class="form-label">Harga:</label>
            <input type="number" name="price" class="form-input" placeholder="Masukkan harga produk" required>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi:</label>
            <textarea name="description" class="form-input" placeholder="Masukkan deskripsi produk" id="message" required></textarea>
        </div>

        <div class="form-group">
            <label for="form-label">Stok:</label>
            <input type="number" name="stock" class="form-input" placeholder="Masukan stok produk" required>
        </div>

        <div>
            <label class="form-label">Gambar Produk:</label>
            <input type="file" name="image" class="form-control">
        </div><br>
        <button type="submit" class="form-button">Simpan</button>
    </form>
    <p><a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="margin-top: 10px;">Kembali</a></p>
</div>
@endsection
