<x-plantilla titulo="Editar comisión">
    <div class="my-5 py-2 mx-5 pt-5" >
        <h3 class="text-center mb-4" style="color:rgb(96, 96, 96)">Editar comisión</h3>
        <div style="display: flex; align-items: center; justify-content: center;">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="/commission/{{ $commission->id }}" method="post">
                @csrf
                @method('PATCH')

                <div class="row mb-2">
                    <div class="col-md-6 form-group">
                        @error('title')
                        <i class="text-danger">{{ $message }}</i><br>
                        @enderror
                        <input type="text" required name="title" class="form-control" id="title" placeholder="Título de la comisión" value="{{ $commission->title }}">
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        @error('title')
                        <br>
                        @enderror
                        <input type="number" class="form-control" name="tip" id="tip" placeholder="Propina (no obligatoria)" value="{{ $commission->tip }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="type" class="my-1">Tipo de comisión</label>
                        <select name="type" id="type" class="form-control">
                            <option value="Perfil" {{ $commission->type == "Perfil" ? "selected" : "" }}>Perfil</option>
                            <option value="Busto" {{ $commission->type == "Busto" ? "selected" : "" }}>Busto</option>
                            <option value="Medio cuerpo" {{ $commission->type == "Medio cuerpo" ? "selected" : "" }}>Medio Cuerpo</option>
                            <option value="Cuerpo completo" {{ $commission->type == "Cuerpo completo" ? "selected" : "" }}>Cuerpo Completo</option>
                            <option value="Escena" {{ $commission->type == "Escena" ? "selected" : "" }}>Escena</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="commercial" class="mt-3">¿Uso comercial?</label>
                        <div class="col-md-6 form-group">
                            <input type="checkbox" name="commercial" id="commercial" value="1" {{ $commission->commercial == 1 ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    @error('info')
                    <i class="text-danger">{{ $message }}</i><br>
                    @enderror
                    <textarea class="form-control" name="info" id="info" rows="5" placeholder="Descripción" required>{{ $commission->info }}</textarea>
                </div>
                
                <!-- <div class="text-center"><input type="submit" value="Guardar"></div> -->
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