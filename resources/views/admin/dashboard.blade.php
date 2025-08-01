@extends('layoutadmin.admin')

@section('title', 'Dashboard Admin')

@section('content')
    
        <h1 style="text-align: center;">Selamat Datang, {{ Auth::user()->name }}</h1>
        <p style="text-align: center; font-size: 18px;">Ini adalah dashboard khusus admin.</p>

        <div >
            <!-- Contoh konten admin -->
            <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
            <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Kelola Pesanan</a>
        </div>
   
        <div class="responsive-table">
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th>DESKRIPSI</th>
                        <th>STOK</th>
                        <th>GAMBAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 0,',', '.') }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="image" width="60">
                            @else
                            Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-primary" style="margin-bottom: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 7px;" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada produk ditemukan.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
@endsection


