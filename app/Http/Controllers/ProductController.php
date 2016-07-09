<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Cate;
use App\Product;
use App\ProductImages;
use Input;
use DB;
use File;
use Request;
use Auth;
class ProductController extends Controller {
	public function getList()
	{
		$products=Product::all();
		//var_dump($products);
		return view('admin.product.list',compact('products'));
	}
	public function getAdd()
	{
		$cate_id=Cate::select(['id','name','parent_id'])->get()->toArray();
		return view('admin.product.add',compact('cate_id'));
	}
	public function postAdd(ProductFormRequest $request)
	{
		
		//Tao bien chua file anh
		$fileImage=$request->file('fImages');
		//Lay ten file anh
		$product_img=$fileImage->getClientOriginalName();
		//Tao model
		$product=new Product();
		$product->name = $request->txtName;
		$product->alias = changeTitle($request->txtName);
		$product->price = $request->txtPrice;
		$product->intro = $request->txtIntro;
		$product->content =$request->txtContent;
		$product->keywords = $request->txtKeywords;
		$product->description = $request->description;
		$product->cate_id = $request->sltCateId;
		$product->user_id = Auth::user()->id;
		$product->image = $product_img; //Ten file anh
		//Luu vao co so du lieu
		$product->save();
		//Dua file anh vao folder
		$fileImage->move("upload/",$product_img);
		//////////////////////////////////////////////
		//////////////////////////////////////////////
		//Xu ly phan them image detail (ProductImages)
		//Kiem tra mang chua cac file anh co ton tai (co du lieu) hay khong
		if(Input::hasFile('imageDetailProduct'))
		{
			//Neu co thi tao mang chua cac file anh
			$imageDetailProduct=Input::file('imageDetailProduct');
			//Duyet qua tung phan tu
			foreach ($imageDetailProduct as $img)
			{
				//Neu phan tu co chua file anh
				if(isset($img))
				{
					//Tao ban ghi trong bang product_images
					ProductImages::create([
						'image'=>$img->getClientOriginalName(), //Lay ten
						'product_id'=>$product->id 	//ID cua model product vua tao o tren
					]);
					//Dua file anh vao folder 
					$img->move('upload/ImgDetail/',$img->getClientOriginalName());
				}
			}
		}
		return redirect()->route('admin.product.getList')->with(['flash_message'=>'Add Success !']);
	}
	public function getEdit($id)
	{
		$product=Product::find($id);
		$cates=Cate::select(['id','name','parent_id'])->get()->toArray();
		$product_images=Product::find($id)->pimages()->get()->toArray();
		//var_dump($product_images);
		return view('admin.product.edit',compact(['product','cates','product_images']));
	}
	public function postEdit(Request $request,$id) //Neu muon dung ProductFormRequest thi phai chinh sua phan rule cho phu hop voi form Edit (vd txtName bo unique)
	{
		//Tao model product
		$product=Product::find($id);
		//Update cac thong tin binh thuong
		$product->update([
			'name'	=> Request::input('txtName'),
			'alias' => changeTitle(Request::input('txtName')),
			'price' => Request::input('txtPrice'),
			'intro' => Request::input('txtIntro'),
			'content' => Request::input('txtContent'),
			'keywords' => Request::input('keywords'),
			'description' => Request::input('description'),
			'cate_id' =>Request::input('sltCateId'),
			'user_id' => Auth::user()->id
		]);
		//Xu ly phan anh
		//Tao duong dan toi file anh trong folder
		$img_current= 'upload/'.Request::input('imgCurrentName');
		if(!empty(Request::file('fImages'))) //Neu co file anh up len
		{
			//Neu ton tai anh cu trong folder
			if(File::exists($img_current))
			{
				//Xoa anh cu
				File::delete($img_current);
			}
			//Tao ten anh moi
			$newFileName=Request::file('fImages')->getClientOriginalName();
			//Update vao model
			$product->update([
				'image' => $newFileName
			]);
			//Chuyen file anh vao folder
			Request::file('fImages')->move('upload/',$newFileName);
		}
		$product->save();


		//Anh Detail
		//Tao mang chua anh detail (cac the input duoc tao ben JavaScript)
		$arrayFileImageDetail=Request::file('imageDetail');
		//Neu ton tai bat cu file nao trong mang...
		if(!empty($arrayFileImageDetail))
		{
			//Duyet tung phan tu trong mang
			foreach($arrayFileImageDetail as $fileImageDetail)
			{
				//Tao model
				$product_img=new ProductImages();
				//Neu phan tu nao chua file
				if(isset($fileImageDetail))
				{
					//Update...
					$product_img->image=$fileImageDetail->getClientOriginalName();
					$product_img->product_id=$id;
					$fileImageDetail->move('upload/ImgDetail/',$fileImageDetail->getClientOriginalName());
					$product_img->save();
				}
			}
		}
		//Luu y: Truong hop 2 product co cung ten anh -> khi 1 product xoa anh -> product kia se chua mot ten anh khong ton tai
		//->Can cai tien them
		return redirect()->route('admin.product.getList')->with(['flash_message'=>'Edit Success !']);
	}
	public function getDelete($id)
	{
		//Lay model san pham can xoa
		$product=Product::find($id);
		//Tu san pham can xoa tim them nhung anh detail cua san pham can xoa
		$product_detail_images=$product->pimages()->get()->toArray();
		//Duyet qua nhung anh detail can xoa
		foreach($product_detail_images as $item)
		{
			//Xoa file trong folder
			File::delete('upload/ImgDetail/'.$item['image']);
		}
		//Xoa file anh chinh cua product
		File::delete('upload/'.$product->image);
		//Xoa product
		$product->delete();
		return redirect()->route('admin.product.getList')->with(['flash_message'=>'Delete Success !']);
	}
	public function getDeleteDetailImage($id) //Co the xoa tham so id
	{
		//Neu ton tai ajax() -> co request gui toi
		if(Request::ajax())
		{
			//Lay trong data tu ajax gia tri id cua anh trong Database
			$idImageInDataBase=(int)Request::get('idImg');
			//Tao model
			$imageModel=ProductImages::find($idImageInDataBase);
			//Neu ton tai model
			if(!empty($imageModel))
			{
				//Tao duong dan cua file anh
				$srcImg='upload/ImgDetail/'.$imageModel->image;
				//Neu file anh ton tai
				if(File::exists($srcImg))
				{
					//Xoa anh
					File::delete($srcImg);
				}
				//Xoa model
				$imageModel->delete();
				return 1; //Tra ve data cho JS thuc hien xoa anh tai giao dien
			}
		}
		return 0;
	}
}
