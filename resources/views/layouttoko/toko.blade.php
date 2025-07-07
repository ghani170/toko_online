<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    body {
      background-color: #FFFFFF;
    }
    .navbar-custom {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-weight: bold;
      color: #000;
    }

    .nav-link {
      color: #333 !important;
      font-weight: 500;
      margin-right: 15px;
    }

    .nav-link:hover {
      color: #007bff !important;
    }

    .navbar-toggler {
      border: none;
    }

    .kartu {
      margin-top: 17px;
      padding: 20px ;
      background-color: #F9FAFB;

    }

    .hero {
       background-color: #F9FAFB;
        min-width: 100%;
        min-height: 100vh; /* atau 100vh jika ingin full layar */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .hero h1 {
        font-size: 2.8rem;
        font-weight: bold;
        color: #333;
    }
    .hero p {
        font-size: 1.2rem;
        color: #555;
    }

    .produk-section {
        padding: 13px ;
        background-color: #f9fafb;
        border-radius: 10px;
    }

    .produk-section h2 {
        color:rgb(27, 33, 37) ;
        margin-bottom: 20px;
        margin-top: 30px;
        text-align: center;
        font-size: 40px;
    }

    .card-product {
        transition: transform 0.2s, box-shadow 0.2s;
        
    }

    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .card-product img {
        height: 200px;
        object-fit: cover;
    }

    .card_img-top::after {
        content: '';
        display: block;
        width: 100%;
        
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }
    }

    .img-hover-zoom {
      transition: transform 0.3s ease;
    }

     @media (min-width: 320px) and (max-width: 750px) {
      .img-hover-zoom:hover {
        transform: scale(1.1);
      }
    }

    
    .tentang-kami{
      padding: 30px;
      border-radius: 13px;
      background-color: #f9fafb;
    }

    
    .buttn {
      cursor: pointer;
      font-weight: 700;
      transition: all 0.2s;
      padding: 7px 20px;
      border-radius: 100px;
      background: rgb(152, 162, 168);
      display: flex;
      align-items: center;
      font-size: 2px;
      text-decoration: none;
      color: black;
      border: 2px solid #000;
    }
   

    .buttn:hover {
      background:rgb(142, 153, 160);
    }

    .buttn > svg {
      width: 34px;
      margin-left: 10px;
      fill: rgb(209, 236, 243);
      transition: transform 0.3s ease-in-out;
    }

    .buttn:hover svg {
      transform:rotate(85deg);
      
    }

    .buttn:active {
      transform: scale(0.95);
    }


    .bin-button {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 55px;
      height: 55px;
      border-radius: 50%;
      background-color: rgb(255, 95, 95);
      cursor: pointer;
      border: 2px solid rgb(255, 201, 201);
      transition-duration: 0.3s;
      position: relative;
      overflow: hidden;
    }
    .bin-bottom {
      width: 15px;
      z-index: 2;
    }
    .bin-top {
      width: 17px;
      transform-origin: right;
      transition-duration: 0.3s;
      z-index: 2;
    }
    .bin-button:hover .bin-top {
      transform: rotate(45deg);
    }
    .bin-button:hover {
      background-color: rgb(255, 0, 0);
    }
    .bin-button:active {
      transform: scale(0.9);
    }
    .garbage {
      position: absolute;
      width: 14px;
      height: auto;
      z-index: 1;
      opacity: 0;
      transition: all 0.3s;
    }
    .bin-button:hover .garbage {
      animation: throw 0.4s linear;
    }
    @keyframes throw {
      from {
        transform: translate(-400%, -700%);
        opacity: 0;
      }
      to {
        transform: translate(0%, 0%);
        opacity: 1;
      }
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-custom">
      <div class="container">
        
         @if(Auth::check())
          <a class="navbar-brand" href="{{ route('user.edit', Auth::user()->id) }}" style="font-size: 20px;">
            <img src="{{ Auth::user()->photo? asset('storage/' . Auth::user()->photo) : asset('storage/imag/fotofrofil.jpg') }}" alt="" width="40px" style="border-radius: 50%; margin-right: 5px;">
            Edit Profil
          </a>
  
         @else
          <a class="navbar-brand" href="{{ route('login') }}" style="font-size: 20px;">
            <img src="{{ asset('storage/imag/fotofrofil.jpg') }}" alt="" width="40px" style="border-radius: 50%; margin-right: 5px;">
            Login Disini
          </a>
          @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('toko') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('toko') }}#tentang ">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu" data-bs-toggle="dropdown">
                Services
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('keranjang.index') }}">Keranjang</a></li>
                @if(Auth::check())
                  <li><a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Edit Profil</a></li>
                @else
                  <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                @endif
                <li><a class="dropdown-item" href="#">SEO</a></li>
              </ul>
            </li>
            <li class="nav-item">
             @if(Auth::check())
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                </button>
              </form>
              @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
       AOS.init();
    </script>
</body>
</html>