<?php namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Baum\Providers\BaumServiceProvider;
use Baum;

class Category extends  Baum\Node {
	
	protected $table='categories';
	
	//protected $scoped = array('cat'); 
	
	//protected  $
	public static function create_dynamic_menu($parent,$menus){	
		$output='';
		 if (isset($menus['parent'][$parent])) {
		 	$output.='<ul>';
		 	
			foreach ($menus['parent'][$parent] as $value)
			{
				//$output.='</br>'.$menus['items'][$value]->Name;
				$output.='<li><a href='.$value.'/index.html>
								<span>'.$menus['items'][$value]->Name.'</span>
						</a></li>';
				$output.=Category::create_dynamic_menu($value,$menus);
				
			}
			$output.='</ul>';
		} 
		return $output;
	}
	public static function get_categories_all(){
		
		$result=DB::select('call sp_get_categories_by_parent(?)',array(1));
		return $result;
	}
	public static function get_categories_by_parent($parent_id){
		
		$result=DB::select('call sp_get_categories_by_parent(?)',array(1));
		return $result;
	}
	
	/**
	 * @Date 22-5-2015
	 * 
	 * */
	 public static function get_categories(){
	 	$instance=new static;
	 	//$instance->children();
	 	$root=$instance::where('cat','=',1)->first();
	 	$categories=$root->getAncestors();print_r($root);//exit;
	 	return Category::all()->toArray();
	 }
	public static function createCategory($category){
		try{
			$parent_id=$category['parent_id'];
			if(empty($parent_id)){
				$category['parent_id']=4;
				$node=Category::create($category);
				$node->makeRoot();
				return true;
			}
			else{
				$parent = Category::where('id', '=', $category['parent_id'])->first();
				$node=Category::create($category);
				$node->makeChildOf($parent);
				return true;
			}
		}catch(ErrorException $e){
			throw $e;
			return false;
		}
		
	}
	/**
	 * @Date 24-5-2015 6:00 PM
	 * @At Home
	 *
	 * */
	public static function moveCategoryToNewParent($data){
		try{
			$category = Category::find((int)$data['id']);
 			$category->name=$data['name'];
 			$category->parent_id=$data['parent_id'];
 			$category->description=$data['description'];
			$category->save();
			return true;
			
		}catch(\PDOException $e){
			throw $e;
			return false;
		}
		
	}
	public static function getCategories(){
		try {
			$instance=new static;
			$root=$instance::where('id','=',4)->first();
			//$categories=$root->getDescendantsAndSelf();//print_r($categories);//exit;
			$categories=$root->Descendants()->get();
			//$categories=Category::all();
			return $categories;
		} catch (Exception $e) {
			return false;
		}
	}
	public static function getCategory($id){
		try {
			$category=Category::where('id', '=',$id)->first();
			return $category;
		} catch (Exception $e) {
			return false;
		}
	}
	public static function deleteCategory($id){
		try {
			$category=Category::where('id', '=',$id)->first();
			return $category->delete();
		} catch (Exception $e) {
			return false;
		}
	}
	
}
