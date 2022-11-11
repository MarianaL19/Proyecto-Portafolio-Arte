<x-plantilla titulo="Crear comisión">
    <div class="my-5 py-2 mx-5" >
        <form action="/commission" method="post">
            @csrf

            @error('title')
                <i>{{ $message }}</i><br>
            @enderror
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value={{ $title ?? old('title') }}>
            <br>
            @error('type')
                <i>{{ $message }}</i><br>
            @enderror
            <label for="type">Tipo</label>
            <!-- <input type="text" name="type" id="type" value={{ $type ?? old('type') }}> -->
            <select name="type" id="type">
                <!-- Falta añadir la validación old -->
                <option value="perfil">Perfil</option>
                <option value="busto" >Busto</option>
                <option value="medio">Medio Cuerpo</option>
                <option value="full">Cuerpo Completo</option>
                <option value="escena">Escena</option>
            </select>
            <br>
            @error('info')
                <i>{{ $message }}</i><br>
            @enderror
            <label for="info">Descripción</label>
            <textarea name="info" id="info" rows="" cols="">{{ $info ?? old('info') }}</textarea>
            <br>
            @error('price')
                <i>{{ $message }}</i><br>
            @enderror
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" value={{ $price ?? old('price') }}>
            <br>
            <label for="commercial">Uso comercial</label>
            <input type="checkbox" name="commercial" id="commercial" value="1">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</x-plantilla>