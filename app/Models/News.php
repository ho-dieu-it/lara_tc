<?php namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;

class News extends Model {

	//
	protected $table='news';
	
	
	public static function get_hot_news()
	{
		$result =DB::select('select * from news n 
											inner join image_news ni on n.id=ni.news_id 
											inner join images i on i.id=ni.image_id where n.hot=1 
											order by n.id DESC LIMIT 10');
		//print_r($result);
		return $result;
	}
	public static function get_news_by_code($code){
		try {
			$result=DB::select('select * from news n 
											inner join image_news ni on n.id=ni.news_id 
											inner join images i on i.id=ni.image_id where n.code=?',array($code));
			return $result[0];	
		} catch (Exception $e) {
		}
	}
	public static function get_top_news(){
	
		$result=DB::table('news')->select('news.*','images.s_image','images.l_image')
		->leftJoin('galleries', 'news.gallery_id', '=', 'galleries.id')
		->leftJoin('images', 'galleries.id', '=', 'images.gallery_id')
		->take(5)
		->get();
		return $result;
	}
}
