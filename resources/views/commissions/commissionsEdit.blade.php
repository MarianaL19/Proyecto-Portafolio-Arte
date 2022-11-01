<x-plantilla titulo="Editar comisión">

    <form action="/commission/{{ $commission->id }}" method="post">
        @csrf
        @method('PATCH')

        @error('title')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ $commission->title }}">
        <br>
        @error('type')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="type">Tipo</label>
        <input type="text" name="type" id="type" value="{{ $commission->type }}">
        <br>
        @error('info')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="info">Descripción</label>
        <textarea name="info" id="info" rows="" cols="">{{ $commission->info }}</textarea>
        <br>
        @error('price')
            <i>{{ $message }}</i><br>
        @enderror
        <label for="price">Precio</label>
        <input type="number" name="price" id="price" value="{{ $commission->price }}">
        <br>
        <label for="commercial">Uso comercial</label>
        <input type="checkbox" name="commercial" id="commercial" value="1" {{ $commission->commercial == 1 ? 'checked' : ''}}>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</x-plantilla>