<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::all();
		return view('admin.products-index')->with(compact('products'));
	}
	public function create()
	{
		return view('admin.products-create');
	}
	public function Add(Request $request)
	{
		$product = new Product;

		$product->name=$request->name;
		$product->detail=$request->detail;
		$product->Save();

         $request->session()->flash('alert-success', 'Product Add Successfully');
		return redirect(route('products.index'));
	}
	public function edit(Product $product,$id)
	{
         $product = Product::find($id);
         return view('admin.products-edit')->with(compact('product'));
	}
	public function update(Request $request)
	{
         $product = Product::find($request->id);

          $product->name=$request->name;
		  $product->detail=$request->detail;
		  $product->Update();

         return redirect(route('products.index'));
	}
	public function deleteProduct(Request $request, $id )
    {
        $products = Product::find($id);
        $products->delete();

        $request->session()->flash('alert-danger', 'Product Delete Successfully');
          return back();
    }

}
