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
}
