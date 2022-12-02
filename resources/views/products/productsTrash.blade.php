
<x-plantilla titulo="Papelera de Productos">
    <div class="my-5 py-2 mx-5" >

        <h2 class="text-center">Papelera</h2>
        
        <div class="mt-4 mb-3">
            <button type="button" class="btn btn-primary rounded py-3 px-4" style="background-color:#34B7A7; border-color:#34B7A7;">
                <a href="/product" class="text-decoration-none text-white">Volver a la lista</a>
            </button>
        </div>

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
        @endif

            {{-- Tabla de Productos --}}
        <div class="table-responsive">
            <table class="table table-hover  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Técnica</th>
                        <th scope="col">Formato</th>
                        <th scope="col">Link Imagen</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                <tbody style="border-style:none">
                    <tr>
                        <td>
                            {{ $product->title }}
                        </td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->info }}</td>
                        <td>{{ $product->author }}</td>
                        <td>{{ $product->technique }}</td>
                        <td>{{ $product->format }}</td>
                        <td>{{ $product->img }}</td>
                        <td>
                            <form action="/products/{{ $product->id }}/restore" method="POST">
                                @csrf                                
                                <input type="submit" value="Recuperar" class="btn btn-primary py-1 px-3"
                                style="background-color:#d3f1fa; border-color:#d3f1fa; border-width:2px; color:#4855c8; font-weight:500;">
                            </form>
                        </td>
                        <td>
                            <form action="/products/trash/{{ $product->id }}" method="POST">
                                @csrf                                
                                <input type="submit" value="Borrar" class="btn btn-primary py-1 px-3"
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