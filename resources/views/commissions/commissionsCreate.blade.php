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

        @error('title')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value={{ $title ?? old('title') }}>
        <br>
        @error('type')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="type">Tipo</label>
        <input type="text" name="type" id="type" value={{ $type ?? old('type') }}>
        <br>
        @error('info')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="info">Descripción</label>
        <textarea name="info" id="info" rows="" cols="">{{ $info ?? old('info') }}</textarea>
        <br>
        @error('price')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="price">Precio</label>
        <input type="number" name="price" id="price" value={{ $price ?? old('price') }}>
        <br>
        <label for="commercial">Uso comercial</label>
        <input type="checkbox" name="commercial" id="commercial" value="1">
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>