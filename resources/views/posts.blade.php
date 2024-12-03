

<x-layout-component>
<x-slot:title>{{$title}}</x-slot:title>

@foreach ($posts as $post )<!--posts adalah sebuah variable dari route-->
<article class="py-8 max-w-screen-md border-b border-gray-500">
    <a href="/posts/{{$post['slug']}}" class="hover:underline">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 ">
            {{$post['title']}}
        </h2>
    </a>

    <div>
        <a href="#">{{$post->author->name}}</a> | {{$post->created_at->diffForHumans()}}
    </div>

    <p class="text-base my-4 font-light">{{Str::limit($post['body'], 100)}}</p>
     <a  href="/posts/{{$post['slug']}}" class="text-base text-blue-500 hover:underline">Readmore &raquo;</a>
</article>
@endforeach

</x-layout-component>
