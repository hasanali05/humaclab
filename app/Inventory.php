<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  	protected $fillable = ['product_id','variations','qty','price'];

  	public function product()
  	{
  		return$this->belongsTo(Product::class);
  	}
}
