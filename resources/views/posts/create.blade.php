<x-dynamic-component :component="Auth::check() ? 'appLayout' : 'guestLayout'">
    <x-slot name="header">
        Crear nuevo post
    </x-slot>
    <div class="w-1/2 mx-auto mt-5">

        <form class="form-post" action="/posts" method="POST">
            @csrf
            <h2 class="font-bold text-xl mb-4">Crear Post</h2>

            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="excerpt">Resumen</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="2">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" id="content" cols="30" rows="2">{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <div class="flex gap-x-1 mt-2">
                    <button type="submit" class="btn-primary">Guardar</button>
                    <a href="/" class="btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</x-dynamic-component>
