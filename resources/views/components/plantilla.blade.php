<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $titulo }} </title>
    @vite(['resources/css/bootstrap/bootstrap.css','resources/js/bootstrap/bootstrap.js'])

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d2400a49aa.js" crossorigin="anonymous"></script>
    <!-- Archivos principales de CSS -->
    @vite(['resources/css/style.css',
    'resources/vendor/bootstrap/css/bootstrap.min.css',
    'resources/vendor/bootstrap-icons/bootstrap-icons.css',
    'resources/vendor/boxicons/css/boxicons.min.css',
    'resources/vendor/glightbox/css/glightbox.min.css',
    'resources/vendor/swiper/swiper-bundle.min.css',
    ])

</head>

<body>
    <x-navbar/>
    <h1> {{ $titulo }} </h1>
    {{ $slot }}
    <x-footer/>

    <!-- Recursos de JS -->
    {{-- <script src="/js/vendor/purecounter/purecounter_vanilla.js"></script> --}}
    <script src="/js/vendor/aos/aos.js"></script>
    <script src="/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/js/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/js/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/js/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/js/vendor/php-email-form/validate.js"></script>

    <script src="/js/vendor/main.js"></script>
</body>

</html>