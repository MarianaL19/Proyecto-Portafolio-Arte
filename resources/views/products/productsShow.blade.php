
<x-plantilla titulo="Ver producto">
    <body style="
    background-image: url(../img/bg-white.jpg);
    background-size: 100% auto;
    background-position: center top;">
      
      <div class="my-5 py-2 mx-5" >
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
      
              <div class="row gy-4">
      
                <div class="col-lg-8">
                  <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
      
                      <div class="swiper-slide">
                        <img src="/img/portfolio/portfolio-8.jpg" alt="Imagen demostrativa del producto: {{ $product->title }}">
                      </div>
    
                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
      
                <div class="col-lg-4">
                  <div class="portfolio-info container mt-2 shadow-lg p-3 mb-2 bg-body rounded">
                    <h3 class="text-capitalize">{{ $product->title }}</h3>
                    <ul>
                      <li style="font-size:16px"><strong>Precio</strong>: ${{ $product->price }}</li>
                      <li style="font-size:16px"><strong>Autor</strong>: {{ $product->author }}</li>
                      <li style="font-size:16px"><strong>Técnica</strong>: {{ $product->technique }}</li>
                      <li style="font-size:16px"><strong>Formato</strong>: {{ $product->format }}</li>
                    </ul>
                  </div>
                  <div class="portfolio-description container shadow-lg p-3 mb-5 mt-3 bg-body rounded">
                    <h2 style="color:#696969">Descripción</h2>
                    <p>{{ $product->info }}</p>
                  </div>
                </div>
      
              </div>
      
            </div>
          </section><!-- End Portfolio Details Section -->
      </div>
    </body>
    </x-plantilla>
    
    