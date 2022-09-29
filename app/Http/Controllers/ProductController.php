<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\ProductCreateValidation;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        return view('admin.product.createOrUpdate');
    }

    public function store(ProductCreateValidation $request)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        $photo = $request->file('photo_file')->store('public');

        $validate['photo']=explode('/',$photo)[1];
        Product::create($validate);
        return back()->with(['success'=>true]);
    }

    public function show(Product $product)
    {
        $breadcrumbs = [
            ['routeName'=>'welcome','name'=>'Главная страница'],
            ['routeName'=>'admin.product.index','name'=>'Все продукты'],
            ['name'=>$product->name],
        ];
        return view('admin.product.show',compact('product','breadcrumbs'));
    }

    public function edit(Product $product)
    {
        
        return view('admin.product.createOrUpdate',compact('product','breadcrumbs'));
    }

    public function update(Request $request, Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
