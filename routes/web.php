<?php

use App\Models\Product;
use App\Models\AgeCategory;
use App\Models\TypeCategory;
use App\Models\GenderCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('products', ['products' => Product::filter(request(['search', 'gender_category', 'type_category', 'age_category']))->withQueryString()->get()]);
});

Route::get('/products/{product:slug}', function (Product $product) {
    return view('product', ['product' => $product]);
});

Route::get('/orders', function () {
    return view('orders');
});

Route::get('/deals', function () {
    return view('deals');
});

Route::get('/gender_category/{gendercategory:slug}', function (GenderCategory $gendercategory) {
    return view('products', ['products' => $gendercategory->products]);
});

Route::get('/type_category/{typecategory:slug}', function (TypeCategory $typecategory) {
    return view('products', ['products' => $typecategory->products]);
});

Route::get('/age_category/{agecategory:slug}', function (AgeCategory $agecategory) {
    return view('products', ['products' => $agecategory->products]);
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::post('/products/submit', [ProductController::class, 'submit'])->name('product.submit');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product:slug}', [ProductController::class, 'update'])->name('product.update');
Route::put('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
