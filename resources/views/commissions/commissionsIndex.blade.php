<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @vite(['resources/css/bootstrap/bootstrap.css','resources/js/bootstrap/bootstrap.js'])
</head>
<body>
    <h1>Listado de Comisiones</h1>

    <!-- <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
    </div> -->
    
    <a href="/commission/create">Crear nueva comisión</a>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Uso comercial</th>
        </tr>
        @foreach ($commissions as $commission)
            <tr>
                <td>
                    <a href="/commission/{{ $commission->id }}">
                        {{ $commission->title }}
                    </a>
                </td>
                <td>{{ $commission->type }}</td>
                <td>{{ $commission->info }}</td>
                <td>{{ $commission->price }}</td>
                <td>{{ $commission->commercial }}</td>
                <td>
                    <a href="/commission/{{ $commission->id }}/edit">Editar</a>
                </td>
                <td>
                    <a href="">
                        <form action="/commission/{{ $commission->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar">
                        </form>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>