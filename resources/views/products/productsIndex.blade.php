
<x-plantilla titulo="Listado de Productos">
    <div class="my-5 py-2 mx-5" >

        <h2 class="text-center">Productos</h2>
        
        {{-- Evaluamos si hay un usuario logueado --}}
        @if (\Auth::user() != null)
            {{-- Si hay un usuario logueado, evaluamos si es el admin para mostrar la tabla de productos --}}
            @if (\Auth::user()->rol == "admin")
            {{-- Botón para añadir productos --}}
            <div class="">
                <div class="row align-items-start">
                    <div class="col mt-4 mb-3">
                        <button type="button" class="btn btn-primary rounded py-3 px-4" style="background-color:#34B7A7; border-color:#34B7A7;">
                            <a href="/product/create" class="text-decoration-none text-white">Añadir producto</a>
                        </button>
                    </div>
                    <div class="col mt-4 mb-3">
                        <button type="button" class="btn btn-primary rounded py-3 px-4" style="background-color:#b0afaf; border-color:#b0afaf;float:right;">
                            <a href="/products/trash" class="text-decoration-none text-white">Ir a la Papelera</a>
                        </button>
                    </div>
                </div>
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
                            <th scope="col"></th>
                            <th scope="col">Título</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Técnica</th>
                            <th scope="col">Formato</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                    <tbody style="border-style:none">
                        <tr>
                            <td class="text-center"> <a href="/product/{{ $product->id }}/edit"><i class="fa-solid fa-pen"></i></a> </td>
                            <td>
                                <a href="/product/{{ $product->id }}"  class="text-decoration-none">
                                    {{ $product->title }}
                                </a>
                            </td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->info }}</td>
                            <td>{{ $product->author }}</td>
                            <td>{{ $product->technique }}</td>
                            <td>{{ $product->format }}</td>
                            <td>
                                <form action="/product/{{ $product->id }}" method="post">
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
            @endif
        @endif

        {{-- Visualización de productos en grid --}}
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 assetsportfolio-item filter-app">
                    <div class="portfolio-wrap  mb-5">

                        @if($product->img == null)
                            <img src="/img/no-disponible.png" class="img-fluid" alt="">
                        @else
                            <img src="{{ \Storage::url($product->img) }}" class="img-fluid"  alt="">
                        @endif

                        <div class="portfolio-info">
                        <a href="/product/{{ $product->id }}" class="portfolio-details-lightbox text-decoration-none" ><h4>{{ $product->title }}</h4></a>
                        <p class="fw-bold">{{ $product->format }}</p>
                        @php
                        $semi_info = substr($product->info,0,40);
                        @endphp
                        <p>{{ $semi_info }}...</p>
                        <div class="portfolio-links">
                            <form action="/favorite/{{ $product->id }}" method="post">
                                @csrf
                                <input type="hidden" name="id_product" id="id_product" value={{ $product->id }}>

                                {{-- Imagen de corazón para añadir a favoritos, solo se muestra si se está logueado --}}
                                @if (\Auth::user() != null && \Auth::user()->rol != "admin")
                                <button type="submit" style="border:none; background:none; color:#e80368; font-size:25px;">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                                @endif
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
            </div>
        </section>
    </div>
</x-plantilla>