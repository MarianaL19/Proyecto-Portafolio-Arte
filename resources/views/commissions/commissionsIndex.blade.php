
<x-plantilla titulo="Listado de Comisiones">
    <div class="my-5 py-2 mx-5" >
        <h2>Usuario: {{ \Auth::user()->name }} - {{ auth()->user()->email }}</h2>
        <a href="/commission/create">Crear nueva comisión</a>

        <div class="table-responsive">
            <table class="table table-hover  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Uso comercial</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($commissions as $commission)
                <tbody>
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
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-plantilla>