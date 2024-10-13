<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;

class ProductController extends Controller
{
    public function index()
    {


        // var_dump($products);
        // die;

        // dd($products); // dumpanddie
        return view('products.index', [
            'products' => Product::orderBy('created_at')->paginate(3)
        ]); // Pass the products to the view
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // $name = $_POST['name'];

        // $name = $request->input('name');
        // $name = $request->name; // even this is also correct.
        // $input = $request->all();

        // $product = new Product;

        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->size = $request->size;

        // $product->save();

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|min:3',
            'size' => 'required|max:100',
        ]);
        Product::create($request->input());

        return redirect()->route('products.index')
                         ->with('status','Product created');
    }
    // public function show(string $id)
    // {
    //     // dd($id);
    //     // $product = Product::find($id);
    //     // if($product === null){
    //     //     abort(404);
    //     // }
    //      $product = Product::findorFail($id);
    //     return view('products.show',compact('product'));
    // }

    // Above code can be reduced further more

    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function edit(Product $product){
        return view('products.edit',compact('product'));
    }

    public function update(SaveProductRequest $request,Product $product){
      $product->update($request->validated());
      return redirect()->route('products.show',$product)
                        ->with('status','Product updated');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')
            ->with('status','Product deleted');
    }
}
