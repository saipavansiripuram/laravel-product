<x-layout>
    

<h1>New Product</h1>

<x-errors></x-errors>

    <form method="post" action="{{route('products.store')}}">
       <x-products.form></x-products.form>
    </form>
</x-layout>