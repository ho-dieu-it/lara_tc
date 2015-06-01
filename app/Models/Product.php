<?php namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//
	protected $table = 'products';
	public static function get_hot_product()
	{
		try {
			$result =DB::select('select * from products p 
											left join image_product ip on p.id=ip.product_id 
											left join images i on i.id=ip.image_id where p.hot=1 
											order by p.id DESC');
			return $result;
		}
		catch(Exception $e)
		{
			return $e->getMessage();
		}
	}
	public static function get_products_by_cate($cate_id,$per_page=6)
	{
		try {
// 			$result =DB::select('select p.*,i.s_image,i.l_image from products p
// 											left join image_product ip on p.id=ip.product_id
// 											left join images i on i.id=ip.image_id where p.hot=1 and p.cate_id=?
// 											order by p.id DESC',array($cate_id));
			$result=Product::leftJoin('image_product','products.id','=','image_product.product_id')
			->leftJoin('images','image_product.image_id','=','images.id')
			->where('products.hot','=',1)
			->where('products.cate_id','=',$cate_id)
			->selectRaw('products.*,images.s_image,images.l_image')
			->orderby('products.id','DESC')->paginate($per_page);
			return $result;
		}
		catch(Exception $e)
		{
			return $e->getMessage();
		}
	}
	public static function get_product_by_code($code){
		try{
			$result =DB::select('select * from products p 
											left join image_product ip on p.id=ip.product_id 
											left join images i on i.id=ip.image_id where p.code=? 
											order by p.id DESC',array($code));
			return $result;
		}
		catch(Exception $e){
			return false;
		}
	}
	public static function get_other_products_by_code($code,$cate_id){
		try{
			$result =DB::select('select * from products p 
											left join image_product ip on p.id=ip.product_id 
											left join images i on i.id=ip.image_id where p.code<>? and p.cate_id=?
											order by p.id DESC',array($code,$cate_id));
			return $result;
		}
		catch(Exception $e){
			return false;
		}
	}
}
