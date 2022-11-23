<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $titulo }} </title>

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d2400a49aa.js" crossorigin="anonymous"></script>
    
    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/js/vendor/bootstrap/js/bootstrap.js" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap/css/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/bootstrap/css/boxicons.min.css" rel="stylesheet">
    <link href="/css/bootstrap/css/glightbox.min.css" rel="stylesheet">
    <link href="/css/bootstrap/css/swiper-bundle.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    
    <x-navbar/>
    {{-- <h1> {{ $titulo }} </h1> --}}
    <div class="my-3 py-2">
        {{ $slot }}
    </div>
    {{-- <x-footer/> --}}


    <!-- Recursos de JS -->
    <script src="/js/vendor/main.js"></script>
    <script src="/js/vendor/functions.js"></script>
    <script src="/js/vendor/aos/aos.js"></script>
    <script src="/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/js/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/js/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/js/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/js/vendor/php-email-form/validate.js"></script>
    {{-- <script src="/js/vendor/purecounter/purecounter_vanilla.js"></script> --}}
</body>

</html>