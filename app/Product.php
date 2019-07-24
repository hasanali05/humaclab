<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  	protected $fillable = ['name','detail'];

  	public function inventories()
  	{
  		return$this->hasMany(Inventory::class);
  	}  	
  	public function variations()
  	{
  		return$this->hasMany(Variation::class);
  	}
}
