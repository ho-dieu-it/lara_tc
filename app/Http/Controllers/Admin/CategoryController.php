<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use View;
use App\Models\Category;
use App\mytable;
class CategoryController extends  Controller{
	
	public function __construct(){
		
	}
	public function getIndex(){
		
		$categories=Category::getCategories();		
		return View::make('admin/category/list')->with(array ( 'categories'=>$categories) );
	}
	public function getList(){
		$categories=Category::getCategories();
		return $categories;
	}
	public function getCreate(){
		$categories=Category::getCategories();	
		return View::make('admin/category/create')->with(array('categories'=>$categories));
	}
	public function postCreate(Request $request){
		$this->validate($request, ['name'=>'required'],['required'=>'Please input category name.']);
		
		$name=$request->input('name');
		$description=$request->input('description');
		$parent_id=$request->input('parent');
		$category=array(
				'cat'=>1,
				'name'=>$name,
				'description'=>$description,
				'parent_id'=>$parent_id
		);
		if(Category::createCategory($category)){
			return redirect('admin/category');
		}
		return redirect('admin/category/create');
		
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