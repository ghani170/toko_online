@extends('layouttoko.toko')
@section('title', 'Detail Produk')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/400x300?text=No+Image" class="img-fluid" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <h4 class="text-danger">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
            <p class="mt-3">{{ $product->description }}</p>
            <p class="mt-3 text-danger">Tersedia: {{ $product->stock }}</p>
            
            <form action="{{ route('keranjang.tambah', $product->id) }}" method="POST">
                @csrf
                @if($product->stock > 0)
                <label for="quantity">Jumlah:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control w-25 d-inline"><br><br>
                @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            html: "{{ session('error') }}: {{ $product->stock }}",
                            confirmButtonColor: '#d33'
                        });
                    </script>
                @endif
                <button type="submit" class="btn btn-success">Tambahkan ke Keranjang<svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg></button>
                @else
                <a class="btn btn-danger" onclick="return confirm('Stock habis')">Stock Habis</a>
                @endif
            </form>
            <!-- <a href="" class="btn btn-success">Tambahkan ke Keranjang<svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a><br><br> -->
            <a href="{{ route('toko') }}#daftar-produk" class="btn btn-secondary" style="margin-top: 20px;">Kembali</a>
        </div>
    </div>
</div>
@endsection
