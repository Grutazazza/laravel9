<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\ProductCreateValidation;
use App\Http\Requests\Admin\Product\ProductUpdateValidation;
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
        $breadcrumbs = [
            ['routeName'=>'welcome','name'=>'Главная страница'],
            ['name'=>'Создание нового товара'],

        ];
        return view('admin.product.createOrUpdate',compact('breadcrumbs'));
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

    public function edit(Request $request,Product $product)
    {
        $breadcrumbs = [
            ['routeName'=>'welcome','name'=>'Главная страница'],
            ['routeName'=>'admin.product.index','name'=>'Все продукты'],
            ['routeName'=>'admin.product.show','params'=>['product'=>$product->id] , 'name'=>$product->name],
            ['name'=>$product->name . ' | Редактирование'],
        ];
        $request->session()->flashInput($product->toArray());
        return view('admin.product.createOrUpdate', compact('product','breadcrumbs'));
    }

    public function update(ProductUpdateValidation $request, Product $product)
    {
        $validate = $request->validated();

        unset($validate['photo_file']);
        if ($request->hasFile('photo_file')) {
            $photo = $request->file('photo_file')->store('public');

            $validate['photo'] = explode('/', $photo)[1];
        }
        $product->update($validate);
        return back()->with(['success'=>true]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }

    public function indexMain()
    {
        $products = Product::simplePaginate(25);
        return view('users.product.main', compact('products'));
    }
}
