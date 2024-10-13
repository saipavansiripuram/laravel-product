<x-layout>
    <h1>Edit Product</h1>
    <x-errors></x-errors>

    <form method="post" action="{{route('products.update',$product)}}" >
        @method('PATCH')
       <x-products.form :product="$product"></x-products.form>
    </form>
</x-layout>