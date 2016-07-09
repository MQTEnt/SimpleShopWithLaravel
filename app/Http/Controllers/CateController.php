<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CateFormRequest;
use App\Cate;
use DB;
class CateController extends Controller {
	public function getList()
	{
		$data=Cate::select(['id','name','parent_id'])->orderBy('id','DESC')->get()->toArray();
		//var_dump($data);
		return view('admin.cate.list',compact('data'));
	}
	public function getAdd()
	{
		$data=Cate::select(['id','name','parent_id'])->get()->toArray();
		//var_dump($data);
		return view('admin.cate.add',compact('data'));
	}
	public function postAdd(CateFormRequest $request)
	{
		Cate::create([
			'name' => $request->txtCateName,
			'alias' =>changeTitle($request->txtCateName),
			'order' => $request->txtOrder,
			'parent_id'=>$request->sltParentId,
			'keywords' => $request->txtKeywords,
			'description' => $request->txtDescription
		]);
		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Add Success !']);
	}
	public function getEdit($id)
	{
		$cate=Cate::findOrFail($id)->toArray();
		//$child=DB::table('cates')->select('id')->where('parent_id','=',$id)->get();
		//var_dump($child);
		$cate_parent=Cate::select(['id','name','parent_id'])->get()->toArray();
		return view('admin.cate.edit',compact(['cate','cate_parent','child']));
	}
	public function postEdit(Request $request, $id)
	{
		//Xy ly  validate request luon trong controller
		$this->validate($request,
		['txtCateName'=>'required'],
		['txtCateName.required'=>'Fill category name']);
		//
		$cate=Cate::find($id);
		$cate->update([
			'name'=>$request->txtCateName,
			'alias' =>changeTitle($request->txtCateName),
			'order'=>$request->txtOrder,
			'keywords'=>$request->keywords,
			'description'=>$request->description,
			'parent_id'=>$request->sltParentId
		]);

		//Chu y
		//
		//Chua xu ly duoc truong hop khi chon mot cate la con cua cate dang sua de lam cate cha
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Edit Success! ']);
	}
	public function getDelete($id)
	{
		$child=Cate::where('parent_id',$id)->get()->toArray();
		if(count($child)==0)
		{
			$cate=Cate::find($id);
			$cate->delete();
			return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Delete Success!']);
		}
		else //Neu san pham xoa co san pham con -> child > 0
		{	//Thong bao khong the xoa va tai lai trang
			echo "<script type='text/javascript'>
					alert('You can not delete this category');
					window.location='";
					echo route('admin.cate.getList')."'";
			echo "</script>";
		}
	}
}
