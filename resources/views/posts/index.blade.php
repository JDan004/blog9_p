<x-app-layout>

    <h1>Listado de Posts</h1>

    <a href="{{route('posts.create')}}">Crear nuevo post</a>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{route('posts.show', $post)}}">{{$post->title}}</a>
            </li>
        @endforeach
    </ul>

    {{$posts->links()}}
    
</x-app-layout>