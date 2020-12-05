<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $translations = [
        'name' => 'Nombre',
        'price' => 'Precio',
        'category_id' => 'Categoría',
        'description' => 'Descripción',
        'image' => 'Imagen'
    ];

    private $customMessages = [
        'required' => 'El campo :attribute es necesario',
        'string' => 'El campo :attribute debe ser texto',
        'numeric' => 'El campo :attribute debe ser un valor numérico',
        'mimes' => 'La imagen debe ser de tipo: jpeg, jpg, png, svg.',
        'max' => 'La imagen no debe tener un tamaño mayor a 3mb'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::with('products')->get();

        return view('shop.productCrud', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category_id' =>['required', 'numeric'],
            'description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,jpg,png,svg', 'max:3072']
        ], $this->customMessages, $this->translations);

        $productData = $request->all();

        if($request->hasFile('image')){
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('products', $filename, 'public');
            $productData['image'] = $filename;
        }

        Product::create($productData);

        return redirect('/product')->with('success', 'Producto agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::with('products')->get();

        return view('shop.productShow', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $newProductData = null;

        if($request->hasFile('image')){
            $request->validate([
                'image' => ['required', 'mimes:jpeg,jpg,png,svg', 'max:3072']
            ]);

            Storage::delete('public/products/' . $product->image);

            $newProductData = $request->only(['image']);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('products', $filename, 'public');
            $newProductData['image'] = $filename;
        }
        else{
            $request->validate([
                'name' => ['required', 'string'],
                'price' => ['required', 'numeric'],
                'category_id' =>['required', 'numeric'],
                'description' => ['required', 'string']
            ], $this->customMessages, $this->translations);

            $newProductData = $request->except(['_token', '_method', 'image']);
        }

        Product::where('id', $product->id)->update($newProductData);

        return redirect()->route('product.show', [$product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Storage::delete('public/products/' . $product->image)){
            $product->delete();
        }

        return redirect()->route('product.index')->with('success', 'Producto eliminado exitosamente');
    }
}
