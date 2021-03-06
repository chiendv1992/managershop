<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table='product';
	protected $primaryKey = 'id';

	protected $fillable=['name','cat_id','description','price','sale','quanlity','status','stock','image','content','salefrom','saleto'];

	public $timestamps = false; 

	public function category()
	{
		return $this->belongsTo('App\Category','cat_id');
	}
	public function productimages()
	{
		return $this->hasMany('App\Productimage','product_id');
	}
	public function orderdetail()
	{
		return $this->hasMany('App\Orderdetail','id');
	}
}
