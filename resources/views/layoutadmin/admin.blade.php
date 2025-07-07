<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Tambahkan ini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .card{
      padding: 15px;
      border-radius: 15px;
      background-color: #F9FAFB;
      box-shadow: 1px 1px 1px whitesmoke;
      
    }

    .responsive-table {
      overflow-x: auto;
    }

    .colorful-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 10px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    .form-input {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #fff;
      color: #333;
      border-radius: 5px;
    }

    textarea.form-input {
      height: 100px;
    }

    .form-button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color:rgb(47, 83, 245);
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .form-button:hover {
      background-color: rgb(38, 69, 211);
    }

    .input {
    display: flex;
    flex-direction: column;
    width: 200px;
    justify-content: center;
    border-radius: 5px
  }

  .value {
    background-color: #21262C;
    border: none;
    padding: 10px;
    color: white;
    display: flex;
    position: relative;
    gap: 5px;
    cursor: pointer;
    border-radius: 4px;
  }

  .value:not(:active):hover,
  .value:focus {
    background-color: #21262C;
  }

  .value:focus,
  .value:active {
    background-color: #1A1F24;
    outline: none;
  }

  .value::before {
    content: "";
    position: absolute;
    top: 5px;
    left: -10px;
    width: 5px;
    height: 80%;
    background-color: #2F81F7;
    border-radius: 5px;
    opacity: 0;
  }

  .value:focus::before,
  .value:active::before {
    opacity: 1;
  }

  .value svg {
    width: 15px
  }

  
.parent {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 8px;
}
    
.div1 {
    grid-column: span 5 / span 2;
    grid-row: span 2 / span 2;
    
}


.div2 {
    grid-column: span 5 / span 5;
    grid-row: span 3 / span 3;
    grid-row-start: 3;
    
}

thead {
    font-size: 1.3rem;    /* ukuran font lebih besar */
    font-weight: bold;
    height: 20px;         /* tinggi baris thead */
    background: #f5f5f5;  /* opsional: warna latar */
    vertical-align: middle;
}

@media (min-width: 992px) {
    .card{
      width: 100%;
    }
}

        

  @media (min-width: 992px) {
    #navbarNav {
        display: none !important;
    }
}

/* .card-order {
  background-color:rgb(170, 174, 179);
  padding: 10px;
  border-radius: 20px;
  border: 2px solid rgb(135, 149, 167);
  
}

.card-order h3{
  text-align: center;
} */

</style>
<body>
     <nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-none" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu" data-bs-toggle="dropdown">
                Services
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('produk.create') }}">Tambah Produk</a></li>
                <li><a class="dropdown-item" href="#">Kelola Pesanan</a></li>
                <li><a class="dropdown-item" href="#">SEO</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    
  

     <div class="d-none d-lg-block text-white position-fixed" style="width:230px; height:100vh; left:0; top:0; z-index:1030; background-color:#0D1117;">
        <div class="p-3">
            <h5 style="margin-top: 10px;">Admin Panel</h5>
            <div class="input">
                <a href="{{ route('admin.dashboard') }}" class="value" href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: white; margin-top: 50px; margin-bottom: 20px;">
                  <svg data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="m1.5 13v1a.5.5 0 0 0 .3379.4731 18.9718 18.9718 0 0 0 6.1621 1.0269 18.9629 18.9629 0 0 0 6.1621-1.0269.5.5 0 0 0 .3379-.4731v-1a6.5083 6.5083 0 0 0 -4.461-6.1676 3.5 3.5 0 1 0 -4.078 0 6.5083 6.5083 0 0 0 -4.461 6.1676zm4-9a2.5 2.5 0 1 1 2.5 2.5 2.5026 2.5026 0 0 1 -2.5-2.5zm2.5 3.5a5.5066 5.5066 0 0 1 5.5 5.5v.6392a18.08 18.08 0 0 1 -11 0v-.6392a5.5066 5.5066 0 0 1 5.5-5.5z" fill="#7D8590"></path></svg>
                  Dashboard
                </a>
                <a href="{{ route('produk.create') }}" class="value" style="text-decoration: none; color: white; margin-bottom: 20px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path d="m109.9 20.63a6.232 6.232 0 0 0 -8.588-.22l-57.463 51.843c-.012.011-.02.024-.031.035s-.023.017-.034.027l-4.721 4.722a1.749 1.749 0 0 0 0 2.475l.341.342-3.16 3.16a8 8 0 0 0 -1.424 1.967 11.382 11.382 0 0 0 -12.055 10.609c-.006.036-.011.074-.015.111a5.763 5.763 0 0 1 -4.928 5.41 1.75 1.75 0 0 0 -.844 3.14c4.844 3.619 9.4 4.915 13.338 4.915a17.14 17.14 0 0 0 11.738-4.545l.182-.167a11.354 11.354 0 0 0 3.348-8.081c0-.225-.02-.445-.032-.667a8.041 8.041 0 0 0 1.962-1.421l3.16-3.161.342.342a1.749 1.749 0 0 0 2.475 0l4.722-4.722c.011-.011.018-.025.029-.036s.023-.018.033-.029l51.844-57.46a6.236 6.236 0 0 0 -.219-8.589zm-70.1 81.311-.122.111c-.808.787-7.667 6.974-17.826 1.221a9.166 9.166 0 0 0 4.36-7.036 1.758 1.758 0 0 0 .036-.273 7.892 7.892 0 0 1 9.122-7.414c.017.005.031.014.048.019a1.717 1.717 0 0 0 .379.055 7.918 7.918 0 0 1 4 13.317zm5.239-10.131c-.093.093-.194.176-.293.26a11.459 11.459 0 0 0 -6.289-6.286c.084-.1.167-.2.261-.3l3.161-3.161 6.321 6.326zm7.214-4.057-9.479-9.479 2.247-2.247 9.479 9.479zm55.267-60.879-50.61 56.092-9.348-9.348 56.092-50.61a2.737 2.737 0 0 1 3.866 3.866z" fill="#7D8590"></path></svg>
                  Tambah Produk
                </a>
                <a href="{{ route('admin.orders') }}" class="value" style="text-decoration: none; color: white; margin-bottom: 20px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path d="m109.9 20.63a6.232 6.232 0 0 0 -8.588-.22l-57.463 51.843c-.012.011-.02.024-.031.035s-.023.017-.034.027l-4.721 4.722a1.749 1.749 0 0 0 0 2.475l.341.342-3.16 3.16a8 8 0 0 0 -1.424 1.967 11.382 11.382 0 0 0 -12.055 10.609c-.006.036-.011.074-.015.111a5.763 5.763 0 0 1 -4.928 5.41 1.75 1.75 0 0 0 -.844 3.14c4.844 3.619 9.4 4.915 13.338 4.915a17.14 17.14 0 0 0 11.738-4.545l.182-.167a11.354 11.354 0 0 0 3.348-8.081c0-.225-.02-.445-.032-.667a8.041 8.041 0 0 0 1.962-1.421l3.16-3.161.342.342a1.749 1.749 0 0 0 2.475 0l4.722-4.722c.011-.011.018-.025.029-.036s.023-.018.033-.029l51.844-57.46a6.236 6.236 0 0 0 -.219-8.589zm-70.1 81.311-.122.111c-.808.787-7.667 6.974-17.826 1.221a9.166 9.166 0 0 0 4.36-7.036 1.758 1.758 0 0 0 .036-.273 7.892 7.892 0 0 1 9.122-7.414c.017.005.031.014.048.019a1.717 1.717 0 0 0 .379.055 7.918 7.918 0 0 1 4 13.317zm5.239-10.131c-.093.093-.194.176-.293.26a11.459 11.459 0 0 0 -6.289-6.286c.084-.1.167-.2.261-.3l3.161-3.161 6.321 6.326zm7.214-4.057-9.479-9.479 2.247-2.247 9.479 9.479zm55.267-60.879-50.61 56.092-9.348-9.348 56.092-50.61a2.737 2.737 0 0 1 3.866 3.866z" fill="#7D8590"></path></svg>
                  Kelola Pesanan
                </a>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                </button>
              </form>
                </button>
            </div>
        </div>
    </div>


    <div class="container d-flex justify-content-center" style="margin-top: 30px;">
      <div class="card">
        @yield('content')
      </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>