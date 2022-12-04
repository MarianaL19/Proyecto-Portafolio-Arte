<x-plantilla titulo="Listado de Productos">
    <div class="my-5 py-2 mx-5" >

        <h2 class="text-center">Mis Favoritos</h2>
        @if ($products->isNotEmpty())
            <section id="portfolio" class="portfolio">
                <div class="container" data-aos="fade-up">
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 assetsportfolio-item filter-app">
                        <div class="portfolio-wrap mt-3">
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
                                <form action="/favorite/delete/{{ $product->id }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_product" id="id_product" value={{ $product->id }}>
                                    <button type="submit" style="border:none; background:none; color:#e80368; font-size:25px;">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        
                </div>
            </section>
        @else
            <div class="container">
                <h2 class="text-center mt-5" style="color:#9e9e9e;">¡Añade algunos favoritos!</h2>
                <p class="text-center mt-5">
                    <a href="/product"><i class="fa-solid fa-heart-circle-plus" style="color:#ffdada; font-size:150px"></i></a>
                </p>
            </div>
        @endif
    </div>
</x-plantilla>