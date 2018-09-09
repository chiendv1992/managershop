<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
     protected $table='orderdetail';
	protected $primaryKey = 'id';

	protected $fillable=['product_id','order_id','total','quantity'];

	public $timestamps = false; 

	public function order()
	{
		return $this->belongsTo('App\Order','id');
	}
	public function product()
	{
		return $this->belongsTo('App\Product','product_id');
	}
}
	
