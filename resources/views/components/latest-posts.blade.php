<div class="w-1/2 mx-auto">
    <h3 class="text-xs font-bold">Posts Recientes</h3>
    <ul class="text-xs text-gray-500">
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}"></a> {{ $post->title }} </li>
        @endforeach
    </ul>
</div>
