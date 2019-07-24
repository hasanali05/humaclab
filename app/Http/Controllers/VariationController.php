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
}
