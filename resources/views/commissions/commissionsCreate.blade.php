<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Comisiones</title>
</head>
<body>
    <h1>Crear Comisión</h1>

    <form action="/commission" method="post">
        @csrf

        <label for="title">Título</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="type">Tipo</label>
        <input type="text" name="type" id="type">
        <br>
        <label for="info">Descripción</label>
        <input type="text" name="info" id="info">
        <br>
        <label for="price">Precio</label>
        <input type="number" name="price" id="price">
        <br>
        <label for="commercial">Uso comercial</label>
        <input type="checkbox" name="commercial" id="commercial" value="1">
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>