<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<style>
    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .card a{
        text-decoration: none;
    }

    .card{
        background: white;
        padding: 2rem 2.5rem;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.08);
        width: 350px;
    }

    .card form{
        align-items: center;
        justify-content: center;
        margin: 0;
        display:inline;
    }

    input {
        width: 100%;
        max-width: 220px;
        height: 45px;
        padding: 12px;
        border-radius: 12px;
        border: 1.5px solid lightgrey;
        outline: none;
        transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        box-shadow: 0px 0px 20px -18px;
    }

    input:hover {
        border: 2px solid lightgrey;
        box-shadow: 0px 0px 20px -17px;
    }

    input:active {
        transform: scale(0.95);
    }

    input:focus {
        border: 2px solid grey;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 40px;
    }
    
    .card img{
        align-items: center;
        justify-content: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
    }

</style>
<body>
    <div class="card">
        @yield('content')
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>