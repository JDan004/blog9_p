<x-mail::message>

# Correo por aprobar

<x-mail::panel>
Se ha creado un nuevo post para revisar
</x-mail::panel>

<x-mail::button url="{{route('posts.show', $post)}}" color="success">
Click aquí para aprobar
</x-mail::button>

</x-mail::message>