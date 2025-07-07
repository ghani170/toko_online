@extends('layouttoko.toko')
@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->product->name }}</td>
                <td>Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <strong>Metode Pembayaran:</strong><br> 
            <select name="metode_pembayaran" class="form-select">
                <option type="radio" value="dana" required>DANA</option>
                <option type="radio" value="gopay" required>GOPAY</option>
                <option type="radio" value="cod" required>COD</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Bayar Sekarang</button>
    </form>
    
</div>
@endsection     