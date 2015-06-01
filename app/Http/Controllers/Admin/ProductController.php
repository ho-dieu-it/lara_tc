<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use View;
use App\Models\Category;
use App\Models\Product;
class ProductController extends  Controller{
	
	public function __construct(){
		
	}
	public function getIndex(){
		$categories=Category::getCategories();
		$products=Product::getProducts();		
		return View::make('admin/category/list')->with(array ( 'categories'=>$categories,'products'=>$products) );
	}
	public function getList(){
		$categories=Category::getCategories();
		$product=Category::getCategories();
		return $categories;
	}
	public function getCreate(){
		$categories=Category::getCategories();	
		return View::make('admin/product/create')->with(array('categories'=>$categories));
	}
	public function postCreate(Request $request){
		$this->validate($request, ['name'=>'required'],['required'=>'Please input category name.']);
		
		$name=$request->input('name');
		$code=$request->input('code');
		$summary=$request->input('summary');
		$content=$request->input('content');
		$price=$request->input('price');
		$gallery_id=$request->input('gallery');
		$visible=$request->input('gallery');
		$cat_id=$request->input('cat_id');
		$product=array(
				'cat_id'=>$cat_id,
				'name'=>$name,
				'code'=>$code,
				'summary'=>$summary,
				'price'=>$price,
				//'gallery_id'=>$parent_id,
				'visible'=>$visible,
				
		);
// 		if(Product::createProduct($product)){
// 			return redirect('admin/product');
// 		}
		return redirect('admin/product/create');
		
	}
	public function getEdit($id){
		$categories=Category::getCategories();
		$category=Category::getCategory($id);
		return View::make('admin/category/edit')->with(array('categories'=>$categories,'category'=>$category));
	}
	public function postEdit(Request $request){
		$this->validate($request, ['name'=>'required'],['required'=>'Please input category name.']);
		$id=$request->input('id');
		$name=$request->input('name');
		$description=$request->input('description');
		$parent_id=$request->input('parent');
		$category=array(
				'id'=>$id,
				'name'=>$name,
				'description'=>$description,
				'parent_id'=>$parent_id
		);
		//mytable::editData($category);
		if(Category::moveCategoryToNewParent($category)){
			return redirect('admin/category');
		}
		return redirect('admin/category/edit/'.$id);
	
	}
	public function getDelete($id){
		if(empty($id)){
			return Response::json('fail');
		}
		if(Category::deleteCategory($id)){
			return Response::json('success');
		}
		return Response::json('fail');
	
	}
}