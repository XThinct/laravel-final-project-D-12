<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request->only(['search', 'gender_category', 'type_category', 'age_category']))->get();
        
        return view('products', compact('products'));
    }

    public function add()
    {
        return view('product.add');
    }

    public function submit(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);

            $product = new Product();
            $product->image = 'images/products/' . $imageName;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->gender_category_id = $request->gender_category_id;
            $product->type_category_id = $request->type_category_id;
            $product->age_category_id = $request->age_category_id;
            $product->description = $request->description;
            
            $slug = Str::slug($request->name);

            $product->slug = $slug;
            $product->save();
            }
        
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->gender_category_id = $request->gender_category_id;
        $product->type_category_id = $request->type_category_id;
        $product->age_category_id = $request->age_category_id;
        $product->description = $request->description;

        $slug = Str::slug($request->name);

        $product->slug = $slug;
        $product->update();
        
        return redirect('/products/' . $product->slug);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
