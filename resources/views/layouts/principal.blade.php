<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('titulo')</title>
</head>

<body class="bg-gradient-to-r from-blue-200 via-purple-300 to-pink-400 p-6 font-sans">
    <h3 class="text-center text-4xl font-semibold text-gray-900 mb-6">@yield('cabecera')</h3>
    <div class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl p-8">
        <main>
            @yield('contenido')
        </main>
    </div>
    @yield('alertas')
</body>

</html>