<?php namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	protected $table='customers';
	
	public static function get_customers(){
		
		$result=DB::table('customers')->select('customers.*','images.s_image','images.l_image')
        ->leftJoin('galleries', 'customers.gallery_id', '=', 'galleries.id')
        ->leftJoin('images', 'galleries.id', '=', 'images.gallery_id')
        ->take(5)
        ->get();
		return $result;
	}
}
