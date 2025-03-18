<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }
    
    public function search(Request $request)
    {
        $products = Product::ProductsSearch($request->keyword)->get();
        $products = Product::productsSearch($request->keyword)->paginate(6);

        return view('products', compact('products'));
    }

    public function detail($productId)
    {
    
        $product = Product::find($productId);
        if (!$product){
            return redirect()->route('products');
        } 

        return view('detail', compact('product'));
    }

    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
        }
        return redirect()->route('products.index');
    }

    public function register()
    {
        $product = new Product();
        return view('register', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $productData = $request->only(['name', 'price', 'image', 'description']);
        if ($request->hasFile('image')) {
            $productData['image'] = $request->file('image')->store('product', 'public');
        }

        Product::create($productData);
        return redirect()->route('products.index');
    }
}