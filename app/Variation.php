<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
  	protected $fillable = ['product_id','name','value'];

  	public function product()
  	{
  		return$this->belongsTo(Product::class);
  	}
}
