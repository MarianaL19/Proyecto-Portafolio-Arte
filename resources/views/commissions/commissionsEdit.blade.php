<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comisión</title>
</head>
<body>
    <h1>Editar Comisión</h1>

    <form action="/commission/{{ $commission->id }}" method="post">
        @csrf
        @method('PATCH')

        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ $commission->title }}">
        <br>
        <label for="type">Tipo</label>
        <input type="text" name="type" id="type" value="{{ $commission->type }}">
        <br>
        <label for="info">Descripción</label>
        <input type="text" name="info" id="info" value="{{ $commission->info }}">
        <br>
        <label for="price">Precio</label>
        <input type="number" name="price" id="price" value="{{ $commission->price }}">
        <br>
        <label for="commercial">Uso comercial</label>
        <input type="checkbox" name="commercial" id="commercial" value="1" {{ $commission->commercial == 1 ? 'checked' : ''}}>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>