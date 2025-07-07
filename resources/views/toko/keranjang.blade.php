@extends('layouttoko.toko')
@section('title', 'Keranjang Belanja')

@section('content')

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            html: "{{ session('error') }}",
            confirmButtonColor: '#d33'
        });
    </script>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            html: "{{ session('success') }}",
            confirmButtonColor: '#3085d6'
        });
    </script>
@endif

@if(count($carts) > 0)
<div class="responsive-table" style=" padding-top: 30px; margin-bottom: 20px; overflow-x:auto;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($carts as $cart)
                @php
                    $subtotal = $cart->product->price * $cart->quantity;
                    $total = $total + $subtotal;
                @endphp
                <tr>
                    <td>{{ $cart->product->name }}</td>
                    <td>Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.hapus', $cart->product_id) }}" method="POST">
                            @csrf
                            
                            <button class="bin-button" type="submit">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 39 7"
                                class="bin-top"
                            >
                                <line stroke-width="4" stroke="white" y2="5" x2="39" y1="5"></line>
                                <line
                                stroke-width="3"
                                stroke="white"
                                y2="1.5"
                                x2="26.0357"
                                y1="1.5"
                                x1="12"
                                ></line>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 33 39"
                                class="bin-bottom"
                            >
                                <mask fill="white" id="path-1-inside-1_8_19">
                                <path
                                    d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
                                ></path>
                                </mask>
                                <path
                                mask="url(#path-1-inside-1_8_19)"
                                fill="white"
                                d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                                ></path>
                                <path stroke-width="4" stroke="white" d="M12 6L12 29"></path>
                                <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 89 80"
                                class="garbage"
                            >
                                <path
                                fill="white"
                                d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"
                                ></path>
                            </svg>
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
            
        </tbody>
        
    </table>
    
    <a href="{{ route('checkout') }}" class="btn btn-success" style="margin-left: 5px; margin-bottom:10px;">Bayar</a><br> 
    <a href="{{ route('toko') }}#daftar-produk" class="btn btn-secondary" style="margin-left: 5px;">Belanja Lagi</a>
@else
    <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
        <h2 style="color:rgb(136, 135, 135);">Keranjang masih kosong.</h2>
    </div>
@endif
@endsection


