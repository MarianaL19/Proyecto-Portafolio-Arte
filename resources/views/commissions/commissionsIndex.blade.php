
<x-plantilla titulo="Listado de Comisiones">
    <h2>Usuario: {{ \Auth::user()->name }} - {{ auth()->user()->email }}</h2>
    <a href="/commission/create">Crear nueva comisión</a>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Cliente</th>
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
                <td>{{ $commission->user->name }}</td>
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
</x-plantilla>