<x-layout-component>
<x-slot:title>{{$title}}</x-slot:title>
<div class="text-3xl tracking-tight text-black">
    <a href="#">User id :{{$user['id']}}</a><br>
    <a href="#">Username:{{$user['name']}}</a><br>
    <a href="#">Email   :{{$user['email']}}</a>
</div>
</x-layout-component>

