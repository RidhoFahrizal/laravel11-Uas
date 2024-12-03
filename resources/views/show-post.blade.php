<x-layout-component>
    <x-slot:title>{{$title}}</x-slot:title>

    <article class="py-8 max-w-screen-md border-b border-gray-500">

            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 ">
                {{$post['title']}}
            </h2>

        <div>
         {{$post->created_at->diffForHumans()}}
        </div>

        <p class="text-base my-4 font-light">{{$post['body'], 100}}</p>
         <a  href="/posts" class="text-base text-blue-500 hover:underline">&laquo; back </a>
    </article>

    </x-layout-component>
