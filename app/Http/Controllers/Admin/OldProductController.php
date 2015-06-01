<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use View;
use App\Product;
use App\Customer;
use App\News;
use Illuminate\Pagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Response;
use Input;
use App\App;
class OldProductController extends Controller {
	
	/*
	 * |--------------------------------------------------------------------------
	 * | Home Controller
	 * |--------------------------------------------------------------------------
	 * |
	 * | This controller renders your application's "dashboard" for users that
	 * | are authenticated. Of course, you are free to change or remove the
	 * | controller as you wish. It is just here to get your app started!
	 * |
	 */
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		
		if(empty(Input::get())){
			$cate_id=10;
			$page=1;
		}
		else{
			$cate_id=Input::get('cate_id');
			$page=Input::get('page');	
		}
		$per_page=5;
		$products=Product::get_products_by_cate($cate_id,$per_page);
		$paginator=new LengthAwarePaginator($products,$products->total(),$per_page,$page);
		return View::make('admin/list')->with(array ( 'paginator'=>$paginator) );
	}
	public function create() {
		return View::make('admin/create')->with(array ('product'=>$product ) );
	}
	public function edit() {
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$products=Product::get_products_by_cate(10);
		
		//$menu=Category::create_dynamic_menu(0,$menus);
		return View::make('admin/products')->with(array ( 'products'=>$products) );
	}
	public function wedding_card()
	{
		 
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
		// thiep cuoi id::10
		//$products=Product::get_products_by_cate(10);
		
		//$paginator=new LengthAwarePaginator($products,count($products),3,1);
		//$pagination=$paginator->render();
		//$menu=Category::create_dynamic_menu(0,$menus);
		return View::make('wedding_card')->with(array ( 'category'=>$category, 'cate_all'=>$menu) );
	}
	/**
	 * todo: detail product
	 * Date 2015-04-09
	 * @param  $code
	 * return product
	 */
	public function wedding_card_detail($code)
	{	
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
		// thiep cuoi id::10
		$product=Product::get_product_by_code($code)[0];
		$other_products=Product::get_other_products_by_code($code,2);
		
		return View::make('wedding_card_detail')->with(array ( 'category'=>$category, 'cate_all'=>$menu,'product'=>$product,'other_products'=>$other_products) );
	}
	public function introduce()
	{
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
	
		//$menu=Category::create_dynamic_menu(0,$menus);
		return View::make( 'introduce')->with(array ( 'category'=>$category, 'cate_all'=>$menu ) );
	}
	public function danhthiep()
	{
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
	
		//$menu=Category::create_dynamic_menu(0,$menus);
		return View::make( 'danhthiep')->with(array ( 'category'=>$category, 'cate_all'=>$menu ) );
	}
	public function sanphamkhac()
	{
		$category = Category::find (2);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
	
		//$menu=Category::create_dynamic_menu(0,$menus);
		return View::make( 'sanphamkhac')->with(array ( 'category'=>$category, 'cate_all'=>$menu ) );
	}
	public function product_category($id)
	{
		$category = Category::find ($id);
		$cates = Category::all();
		foreach ($cates as $value)
		{
			$menus['items'][$value->Id]=$value;
			$menus['parent'][$value->Parent][]=$value->Id;
		}
		$menu=Category::get_categories_all();
		$products=Product::get_products_by_cate($id);
		
		return View::make( 'product_category')->with(array ( 'category'=>$category, 'cate_all'=>$menu,'products'=>$products ) );
	}
	public function json()
	{
		$no_page=Input::get('page');
		$products=Product::get_products_by_cate(10);
		
		$paginator=new LengthAwarePaginator($products,$products->total(),6,$no_page);
		
		return Response::json($paginator->toArray());
	}
	
}
