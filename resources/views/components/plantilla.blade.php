<div>
    <!-- Well begun is half done. - Aristotle -->
</div>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $titulo }} </title>
    <!-- @vite(['resources/css/bootstrap/bootstrap.css','resources/js/bootstrap/bootstrap.js']) -->

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Archivos principales de JS y CSS -->
    @vite(['resources/css/style.css','resources/js/main.js'])
</head>

<body>
    <x-header/>
    <h1> {{ $titulo }} </h1>
    {{ $slot }}
    <br><br><br><br>
    <x-footer/>
</body>

</html>