<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $translations = [
        'name' => 'Nombre',
        'price' => 'Precio',
        'category_id' => 'Categoría',
        'description' => 'Descripción',
        'image' => 'Image'
    ];

    private $customMessages = [
        'required' => 'El campo :attribute es necesario',
        'string' => 'El campo :attribute debe ser texto',
        'numeric' => 'El campo :attribute debe ser un valor numérico'
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

        return view('productCrud', compact('products', 'categories'));
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
            'description' => ['required', 'string']
        ], $this->customMessages, $this->translations);

        Product::create($request->all());

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::with('categories')->get();
        $categories = Category::with('products')->get();

        return view('productCrud', compact('product', 'products', 'categories'));
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
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category_id' =>['required', 'numeric'],
            'description' => ['required', 'string']
        ], $this->customMessages, $this->translations);

        Product::where('id', $product->id)->update($request->except('_token', '_method'));

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
