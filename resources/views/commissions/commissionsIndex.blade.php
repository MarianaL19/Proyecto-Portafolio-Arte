
<x-plantilla titulo="Listado de Comisiones">
    <div class="my-5 py-2 mx-5" >
        <!-- <h2>Usuario: {{ \Auth::user()->name }} - {{ auth()->user()->email }}</h2> -->
        <h2 class="text-center">Mis comisiones</h2>
        <div class="mt-4 mb-3">
            <button type="button" class="btn btn-primary rounded py-3 px-4" style="background-color:#34B7A7; border-color:#34B7A7;">
                <a href="/commission/create" class="text-decoration-none text-white">Pedir comisión</a>
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Título</th>
                        <!-- <th scope="col">Cliente</th> -->
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="text-center">Propina</th>
                        <th scope="col" class="text-center">Precio</th>
                        <th scope="col" class="text-center">Uso comercial</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($commissions as $commission)
                <tbody style="border-style:none">
                    <tr>
                        <td class="text-center"> <a href="/commission/{{ $commission->id }}/edit"><i class="fa-solid fa-pen"></i></a> </td>
                        <td>
                            <a href="/commission/{{ $commission->id }}"  class="text-decoration-none">
                                {{ $commission->title }}
                            </a>
                        </td>
                        <!-- <td>{{ $commission->user->name }}</td> -->
                        <td>{{ $commission->type }}</td>
                        <td>{{ $commission->info }}</td>
                        <td class="text-center">{{ $commission->tip == null ? 'NA' : $commission->tip }}</td>
                        <td class="text-center">${{ $commission->price }}</td>
                        <td class="text-center">{{ $commission->commercial == 1 ? 'Sí' : 'No'}}</td>
                        <td>
                            <form action="/commission/{{ $commission->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-primary py-1 px-3"
                                    style="background-color:#ffeef5; border-color:#ffeef5; border-width:2px; color:#e80368; font-weight:500;">
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-plantilla>