<?php namespace App\Http\Controllers;
use DB;
use Request;
use Mail;
use Cart;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//Tat che do login khi vao trang web
		//$this->middleware('web');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products=DB::table('products')->select(['id','name','image','price','alias'])
					->orderBy('id','DESC')
					->skip(0)
					->take(4)
					->get();
		$banners=DB::table('abouts')->select('value')->where('type','banner')->get();
		return view('user.pages.home',compact(['products','banners']));
	}
	public function getCate($id)
	{
		//Danh sach san pham chinh
		$products=DB::table('products')->select(['id','name','image','price','alias'])
					->where('cate_id',$id)
					->paginate(3);
		//Danh sach the loai
		$currentCate=DB::table('cates')->select(['id','name','parent_id'])
						->where('id',$id)
						->first();
		$cates=DB::table('cates')->select(['id','name','alias'])
					->where('parent_id',$currentCate->parent_id)
					->get();
		//Lastest Products
		$lastestProducts=DB::table('products')->select(['id','name','image','price','alias'])
							->where('cate_id',$id)
							->orderBy('id','DESC')
							->skip(0)
							->take(3)
							->get();
		//Random Products
		//Su dung raw query
		$randomProducts=DB::table('products')->select(['id','name','image','price','alias'])
							->orderBy(DB::raw('RAND()'))
							->limit(3)
							->get();
		$banners=DB::table('abouts')->select('value')->where('type','banner')->get();
		return view('user.pages.cate',compact(['cates','products','lastestProducts','currentCate','randomProducts','banners']));
	}
	public function getProduct($id)
	{
		$product=DB::table('products')->where('id',$id)->first();
		//var_dump($product);
		$imageDetail=DB::table('product_images')->where('product_id',$id)->get();
		//var_dump($imageDetail);
		$relateProducts=DB::table('products')
							->where(function($query) use ($product) {
								$query->where('cate_id','=',$product->cate_id)
									 ->where('id','<>',$product->id);
							})
							->orderBy('id','DESC')
							->skip(0)
							->take(4)
							->get();
		//var_dump($relateProducts);
		$banners=DB::table('abouts')->select('value')->where('type','banner')->get();
		return view('user.pages.detailProduct',compact(['product','imageDetail','relateProducts','banners']));
	}
	public function getContact()
	{
		$banners=DB::table('abouts')->select('value')->where('type','banner')->get();
		return view('user.pages.contact',compact(['banners']));
	}
	public function postContact(Request $request)
	{
		//Data gui di
		$dataSend=[
			'myName' => Request::input('txtName'),
			'myMessage' => Request::input('txtMessage')
		];
		Mail::send('emails.form', $dataSend, function($msg){
			$msg->from('mqtsnet@gmail.com','TMQ'); //Mail gui di (mail cua he thong)
			$msg->to('mqtent@gmail.com','TMQ')->subject('Title of mail'); //Mail cua khach hang (co the thay doi bang viec nhap mail vao form)
		});
		//Display alert
		echo "<script>";
		echo "alert('Thank for contact with us!');";
		echo "window.location='".url('/home')."';";
		echo "</script>";
	}
	public function getBuy($id)
	{
		$buyProduct=DB::table('products')->where('id',$id)->first();
		Cart::add([
			'id'=>$id,
			'name'=>$buyProduct->name,
			'qty'=>1,
			'price'=>$buyProduct->price,
			'options'=>['img'=>$buyProduct->image]
		]);
		return redirect()->route('home.getCart');
		
	}
	public function getCart()
	{
		$content=Cart::content();
		$total=Cart::total();
		$banners=DB::table('abouts')->select('value')->where('type','banner')->get();
		return view('user.pages.shopping',compact(['content','total','banners']));
	}
	public function deleteProductCart($idRow)
	{
		Cart::remove($idRow);
		return redirect()->route('home.getCart');
	}
	public function updateCart()
	{
		if(Request::ajax())
		{
			$rowId=Request::get('rowId');
			$qty=Request::get('qty');
			Cart::update($rowId,$qty);
			echo "success";
		}
	}
}
