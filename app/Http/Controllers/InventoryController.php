<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product;

class InventoryController extends Controller
{
	public function index()
	{
		$inventories = Inventory::with('product')->get();
		return view('admin.inventories-index')->with(compact('inventories'));
	}
	public function create()
	{
		$products = Product::all();
		return view('admin.inventories-create')->with(compact('products'));
	}
	public function Store(Request $request)
	{
		$inventory = new Inventory;

		$inventory->variations =$request->variations;
		$inventory->qty =$request->qty;
		$inventory->price =$request->price;
		$inventory->product_id =$request->product_id;
		$inventory->Save();

		$request->session()->flash('alert-success', 'Developer Add Successfully');

		return redirect(route('inventories.index'));


	}
}
