<x-dynamic-component :component="Auth::check() ? 'appLayout' : 'guestLayout'">
    <x-slot name="header">
        {{ $post->title }}
    </x-slot>
    <div class="w-1/2 mx-auto">
        <article class="mt-5">
            <h1 class="text-xl font-bold border-gray-300 border-b"> {{ $post->title }} </h1>
            <p class="text-gray-600"> {{ $post->content }} </p>
        </article>
        <div class="mt-5 flex gap-2">

            <a href="/" class="btn">&#8592; Inicio</a>
            @can('update', $post)
                <a href="/posts/{{ $post->id }}/edit" class="btn">Editar</a>
            @endcan

            @can('delete', $post)
                <form action="/posts/{{ $post->id }}" method="POST" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn" type="submit"
                        onclick="return confirm('¿Estas seguro de eliminar este post?')">Eliminar</button>
                </form>
            @endcan
        </div>

        <div>
            <h4 class="mt-5 text-lg font-bold">Comentarios</h4>
            <div class="text-sm">
                @foreach ($comments as $comment)
                    <div class="mt-3"> {{ $comment->content }} </div>
                    <small class="text-gray-400"> {{ $comment->name }} </small>
                    <hr>
                @endforeach
            </div>
        </div>

        <form class="mt-8" action="/posts/{{ $post->id }}/comments" method="POST">
            @csrf
            <h2>Crear Comentario</h2>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" id="content" cols="30" rows="2"></textarea>
            </div>
            <div>
                <button type="submit" class="btn-primary mt-2">Enviar</button>
            </div>
        </form>
    </div>
</x-dynamic-component>
