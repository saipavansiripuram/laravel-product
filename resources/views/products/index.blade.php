<x-layout>
    <h1>Products</h1>
    <!-- plain php -->
    <!--
    <#? php foreach ($products as $product): ?>
        <h2><#?= $product->name ?></h2>
        <p><#?= $product->description ?></p>
        <p><#?= $product->size ?></p>
    <#?php endforeach; ?> -->

    <a href="{{route('products.create')}}">New Product</a>

    <!-- Blade syntaxs -->
    @foreach ($products as $product )
    <h2><a href ="{{route('products.show',$product->id)}}"> {{$product->name}}</a></h2>
    <p>{{$product->description}}</p>
    <p>{{$product->size}}</p>
    @endforeach

    {{ $products->links('vendor/pagination/simple-default') }}
</x-layout>