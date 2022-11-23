<x-dynamic-component :component="Auth::check() ? 'appLayout' : 'guestLayout'">
    <x-slot name="header">Editar Post {{$post->id}}</x-slot>
    <div class="w-1/2 mx-auto mt-5">

        <form class="form-post" action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')
            <h2 class="font-bold text-xl">Editar Post</h2>

            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="excerpt">Resumen</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="2">{{ $post->excerpt }}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" id="content" cols="30" rows="2">{{ $post->content }}</textarea>
            </div>
            <div class="flex gap-x-1 mt-2">
                <button type="submit" class="btn-primary">Actualizar</button>
                <a href="/posts/{{ $post->id }}" type="button">Cancelar</a>
            </div>
        </form>

    </div>
</x-dynamic-component>
