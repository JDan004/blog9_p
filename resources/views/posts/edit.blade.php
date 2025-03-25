<x-app-layout>

    <h1>Formulario para editar un post</h1>

    @if ($errors->any())
        <div>
            <h2>Errores</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('posts.update', $post)}}" method="POST">

        @csrf
        @method('PUT')

        <label for="title">
            Título:
            <input type="text" name="title" id="title" value="{{old('title', $post->title)}}">
        </label>

        <br>
        <br>

        <label for="slug">
            Slug:
            <input type="text" name="slug" id="slug" value="{{old('slug', $post->slug)}}">
        </label>

        <br>
        <br>

        <label for="category">
            Categoría:
            <input type="text" name="category" id="category" value="{{old('category', $post->category)}}">
        </label>

        <br>
        <br>

        <label for="content">
            Cotenido:
            <textarea name="content" id="content" cols="20" rows="5">{{old('content', $post->content)}}</textarea>
        </label>

        <br>
        <br>

        <button type="submit">Editar post</button>


    </form>

</x-app-layout>