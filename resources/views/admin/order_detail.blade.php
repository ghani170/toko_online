@extends('layoutadmin.admin')
@section('title', 'Detail Pesanan')

@section('content')
<h2>Detail Pesanan #{{ $order->id }}</h2>
<p>User: {{ $order->user->name }}</p>
<p>Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</p>
<p>Status: {{ ucfirst($order->status) }}</p>
<hr>
<h4>Produk yang Dibeli:</h4>
<div class="responsive-table">
<table class="table table-bordered" >
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->orderItems as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<p><strong>Total: Rp {{ number_format($order->total, 0, ',', '.') }}</strong></p>
<a href="{{ route('admin.orders') }}" class="btn btn-secondary">Kembali</a>
@endsection