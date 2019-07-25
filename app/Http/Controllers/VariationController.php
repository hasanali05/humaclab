<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variation;
use App\Product;

class VariationController extends Controller
{
	public function index()
	{
		$variations = Variation::all();
		return view('admin.variations-index')->with(compact('variations'));
	}
	public function getVariants(Request $request)
	{
		$variations = Variation::where('product_id', '=', $request->product_id)->get();
        return response()->json(["success"=>true, 'variations'=>$variations]);   
	}
	public function create()
	{
		$products = Product::all();
		return view('admin.variations-create')->with(compact('products'));
	}
	public function store(Request $request)
	{
       $variation = new Variation;

       $variation->name=$request->name;
       $variation->value=$request->value;
       $variation->product_id=$request->product_id;
       $variation->Save();

       return redirect(route('variations'));

	}
	public function edit(Request $request,$id)
	{
        $variation =Variation::find($id);
         $products =Product::all();
        return view('admin.variations-edit')->with(compact('variation','products'));
	}
	public function update(Request $request)
	{
       $variation = Variation::find($request->id);
       $variation->name= $request->name;
       $variation->value= $request->value;
       $variation->product_id=$request->product_id;
       $variation->Update();
       
       return redirect(route('variations'));

	}

}
