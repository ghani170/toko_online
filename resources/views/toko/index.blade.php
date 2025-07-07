@extends('layouttoko.toko')
@section('title', 'Toko')

@section('content')

<div class="container hero">
    <h1>Selamat Datang di Toko Kami!</h1>
    <p>Temukan berbagai produk menarik dan penawaran terbaik untuk Anda.</p>
    <a href="#daftar-produk" class="buttn">
        <span><h3>Belanja Sekarang</h3></span>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 74 74"
            height="34"
            width="34"
        >
            <circle stroke-width="3" stroke="black" r="35.5" cy="37" cx="37"></circle>
            <path
            fill="black"
            d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
            ></path>
        </svg>
    </a>

</div>

<div class="container mt-5 tentang-kami" id="tentang">
    <div class="row align-items-center">
        <div class="col-md-9 text-md-start text-center">
            <h2 style="color: rgb(27, 33, 37);">Tentang Kami</h2>
            <p>
                Kami adalah toko online yang menyediakan berbagai produk berkualitas dengan harga terjangkau. <br>
                Kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami.
            </p>
        </div>
        <div class="col-md-3 text-center">
            <img src="{{ asset('storage/imag/TokoOnline.png') }}" alt="" width="270px" >
        </div>
    </div>
</div>

<div class="container produk-section mt-5" id="daftar-produk" >
    <h2 class="mb-4">Daftar Produk</h2>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-lg-4 col-md-4 col-sm-6 col-6 mb-4">

                <div class="card card-product h-100" data-aos="fade-up" data-aos-duration="25" data-aos-delay="10">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-hover-zoom" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($product->name, 30) }}</h5>
                        <p class="card-text text-danger fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="card-text">{{ Str::limit($product->description, 10) }}</p>
                    </div>
                    <div class="mt-auto mb-3" style="margin-left: 7px;">
                        <a href="{{ route('produk.lihat', $product->id) }}" class="btn btn-primary w-30">Lihat</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Tidak ada produk.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

