
<x-plantilla titulo="Ver comisión">
<body style="
background-image: url(../img/bg-white.jpg);
 background-size: 100% auto;
 background-position: center top;">
  <div class="my-5 py-2 mx-5" >
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-body rounded" style="width:60%">
      <a class="text-decoration-none" href='/commission/'><i class="fa-solid fa-arrow-left text-left fs-3"></i></a>
      <div class="section-title">
        <h2 class="text-capitalize fs-1 mt-2"> {{ $commission->title }}</h2>

        <button type="button" class="btn btn-primary rounded py-2 px-4 mb-4 disabled" style="background-color:#34B7A7; border-color:#34B7A7;">
            <p class="text-capitalize fs-5">{{ $commission->type }}</p>
        </button>

        <h5 style="color:#696969">Descripción:</h5>
        <h4>{{ $commission->info }}</h4>

        <div class="container mt-5">
          <div class="row align-items-start">
            <div class="col">
              <i class="fa-brands fa-gratipay fs-3" style="color:#e80368"></i>
              <h4 style="color:#696969">Propina:</h4>
              <p class="fs-5">{{ $commission->tip == null ? 'NA' : $commission->tip }}</p>
            </div>
            <div class="col">
              <i class="fa-solid fa-dollar-sign fs-3" style="color:#ffbb2c"></i>
              <h4 style="color:#696969">Precio:</h4>
              <p class="fs-5">${{ $commission->price }}</p>
            </div>
            <div class="col">
              <i class="fa-solid fa-barcode fs-3" style="color:#666666"></i>
              <h4 style="color:#696969">Uso:</h4>
              <p class="fs-5">{{ $commission->commercial == 1 ? 'Uso comercial' : 'Uso personal'}}.</p>
            </div>
          </div>
        </div>

    </div>  
  </div>
</body>
</x-plantilla>

