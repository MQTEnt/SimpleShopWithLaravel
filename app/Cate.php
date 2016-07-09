<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model {
	protected $table='cates';
	protected $fillable=['name','alias','order','parent_id','keywords','description'];
	public $timestamps=false;
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
