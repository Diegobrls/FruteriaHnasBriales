<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria Hnas Briales</title>
    <style>
        /* fondo */
        body {
            background-image: url('https://tufruteria.es/wp-content/uploads/2021/08/tufruteria-fruteria-san-antonio-benageber.jpg');
            background-size: cover;
            background-blur: 5px; 
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0;
        }

        /* barra de navegación */
        .navbar {
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            color: #333;
            padding: 1rem;
        }

        .navbar-logo img {
            width: 100px; 
            height: auto; 
        }

        .navbar-links {
            margin-right: 1rem;
        }

        .navbar-links a {
            color: #333;
            text-decoration: none;
            margin-right: 1rem;
        }

        .main-content {
            text-align: center;
            margin-top: 400px; 
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 1rem;
            border-radius: 10px;
        }

        .main-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
        }

        .subtitle {
            font-size: 1.5rem;
            color: white; 
        }

        /* botón */
        .btn {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo"><img src="https://www.fruteriahermanasbriales.com/uploads/fCip5w6h/logo-Fruteria1.jpg" alt="Logo"></div>
        <div class="navbar-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registro</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="main-content">
        <h1 class="main-title">¡Bienvenido Cestas Fruteria Hnas Briales!</h1>
        <p class="subtitle">Aquí encontrarás las mejores cestas de regalo.</p>
    </div>
</body>
</html>
