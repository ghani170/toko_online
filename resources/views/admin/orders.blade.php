<!-- resources/views/admin/orders.blade.php -->

@extends('layoutadmin.admin')
@section('title', 'Kelola Pesanan')

@section('content')
<h1 class="text-center mb-4">Kelola Pesanan</h1>

<!-- Statistik Cards -->
<div class="row g-4 mb-4">
    <!-- Card: Jumlah Pesanan -->
    <div class="col-12 col-md-6">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-body text-center text-md-start">
                <h6 class="text-muted text-center">Jumlah Pesanan</h6>
                <h2 class="fw-bold text-primary m-0 text-center">{{ count($orders) }}</h2>
            </div>
        </div>
    </div>

    <!-- Card: Total Penghasilan -->
    <div class="col-12 col-md-6">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-body text-center text-md-end">
                <h6 class="text-muted text-center">Total Penghasilan</h6>
                <h2 class="fw-bold text-success m-0 text-center">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Pesanan -->
<div class="parent">
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-4" style="border-radius: 10px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th> 
                    <th>Status</th>
                    <th>Detail Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $i => $order)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diantar" {{ $order->status == 'diantar' ? 'selected' : '' }}>Diantar</option>
                                <option value="diterima" {{ $order->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        {{-- Menampilkan daftar produk dan kuantitas --}}
                        @foreach($order->orderItems as $item)
                            @if($item->product)
                                <p>{{ $item->product->name }} ({{ $item->quantity }})</p>
                            @else
                                <p>Produk Tidak Ditemukan ({{ $item->quantity }})</p>
                            @endif
                        @endforeach
                        <strong>Metode Pembayaran: {{ ucfirst(str_replace('_', ' ', $order->metode_pembayaran)) }}</strong>
                    </td>
                    <td>
                        <div class="d-flex">
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="me-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('orders.detail', $order->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada pesanan yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
