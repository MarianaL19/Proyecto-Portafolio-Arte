<x-plantilla titulo="Editar producto">
    <div class="my-5 py-2 mx-5 pt-5" >
        <div style="display: flex; align-items: center; justify-content: center;">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="/product/{{ $product->id }}" method="post">
                @csrf
                @method('PATCH')

                <div class="row mb-2">
                    <div class="col-md-6 form-group">
                        @error('title')
                        <i class="text-danger">{{ $message }}</i><br>
                        @enderror
                        <input type="text" name="title" class="form-control" id="title" placeholder="Título del producto" value="{{ $product->title }}">
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        @error('price')
                        <i class="text-danger">{{ $message }}</i><br>
                        @enderror
                        <input type="number" class="form-control" name="price" id="price" placeholder="Precio del producto" value={{ $product->price }}>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="technique" class="mt-1">Técnica utilizada</label>
                        <select name="technique" id="technique" class="form-control">
                            <option value="Óleo" {{ $product->technique == "Óleo" ? "selected" : "" }}>Óleo</option>
                            <option value="Acuarela" {{ $product->technique == "Acuarela" ? "selected" : "" }}>Acuarela</option>
                            <option value="Grafito" {{ $product->technique == "Grafito" ? "selected" : "" }}>Grafito</option>
                            <option value="Ilustración Digital" {{ $product->technique == "Ilustración Digital" ? "selected" : "" }}>Ilustración Digital</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="format" class="mt-1">Formato de la pieza</label>
                        <div class="col-md-6 form-group">
                            <select name="format" id="format" class="form-control">
                                <option value="Digital" {{ $product->format == "Digital" ? "selected" : "" }}>Digital</option>
                                <option value="Tradicional" {{ $product->format == "Tradicional" ? "selected" : "" }}>Físico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        @error('author')
                        <i class="text-danger">{{ $message }}</i><br>
                        @enderror
                        <input type="text" name="author" class="form-control" id="author" placeholder="Nombre del autor" value={{ $product->author }}>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        @error('author')
                        <br>
                        @enderror
                        <input type="text" name="img" class="form-control" id="img" placeholder="Dirección de la imagen" value={{ $product->img }}>
                    </div>
                </div>

                <div class="form-group mt-3">
                    @error('info')
                    <i class="text-danger">{{ $message }}</i><br>
                    @enderror
                    <textarea class="form-control" name="info" id="info" rows="5" placeholder="Descripción del producto" >{{ $product->info }}</textarea>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill py-3 px-4" style="background-color:#34B7A7; border-color:#34B7A7;">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
</x-plantilla>