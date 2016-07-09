<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model {
	protected $table='product_images';
	protected $fillable=['image','product_id'];
	public $timestamps=false;
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
