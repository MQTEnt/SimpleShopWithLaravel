<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\About;
use Request;
use Input;
//use App\Http\Requests\BannerFormRequest;
use Validator;
use File;
class AboutController extends Controller {
	public function index()
	{
		$about=About::find(1);
		$phone=About::select(['id','value'])->where('name','phone')->first();
		$facebook=About::select(['id','value'])->where('name','facebook')->first();
		$twitter=About::select(['id','value'])->where('name','twitter')->first();
		$email=About::select(['id','value'])->where('name','email')->first();
		//var_dump($facebook);
		return view('admin.about.index',compact('about','facebook','twitter','phone','email'));
	}
	public function updateAbout()
	{
		//Chu y use Request
		if(Request::ajax())
		{
			$about=About::find(1);
			$about->value=Request::get('txtAbout');
			$about->save();
			return 1;
		}
		else
			return 0;
	}
	public function listBanner()
	{
		$banners=About::select(['id','value'])->where('type','banner')->get()->toArray();
		//var_dump($banners);
		return view('admin.about.listbanner',compact('banners'));
	}
	public function uploadBanner()
	{
		$files = Input::file('fileBanner');
		// Make sure it really is an array
		if (!is_array($files)) 
		{
			$files = array($files);
		}
		$errors = array();
		// Loop through all uploaded files
		foreach ($files as $file)
		{
    		// Ignore array member if it's not an UploadedFile object, just to be extra safe
			if (!is_a($file, 'Symfony\Component\HttpFoundation\File\UploadedFile')) {
				continue;
			}
			$validator = Validator::make(
				array('file' => $file),
				array('file' => 'required|image')
			);
			if ($validator->passes())
			{
				//Xu ly neu la file anh ...
				//Bo xung them neu can
				//echo $file->getClientOriginalName();
			} 
			else
			{
        		// Collect error messages
				$errors[] = 'File ' . $file->getClientOriginalName() . ':' . $validator->messages()->first('file');
				//Gui $error sang view de hien thi
				return redirect()->route('admin.about.listBanner')->with(['errors'=>$errors]);
			}
		}
		foreach($files as $index => $file)
		{
			$banner=new About();
			$banner->save(); //Luu lai lan dau de lay id
			$fileName=$banner->id.$file->getClientOriginalName();
			$file->move('upload/banners/',$fileName);
			$banner->name='banner';
			$banner->type='banner';
			$banner->value=$fileName;
			$banner->save();
		}
		return redirect()->route('admin.about.listBanner')->with(['flash_message'=>'Upload Banner Success']);
	}
	public function deleteBanner($id)
	{
		$banner=About::find($id);
		$nameFileBanner='upload/banners/'.$banner->value;
		if(File::exists($nameFileBanner))
		{
			File::delete($nameFileBanner);
		}
		$banner->delete();
		return redirect()->route('admin.about.listBanner')->with(['flash_message'=>'Delete Banner Success']);
	}
	public function updateContact()
	{
		if(Request::ajax())
		{
			//Phone
			$phone=About::where('name','phone')->first();
			$phone->value=Request::get('txtPhone');
			$phone->save();
			//Email
			$email=About::where('name','email')->first();
			$email->value=Request::get('txtEmail');
			$email->save();
			//Facebook
			$facebook=About::where('name','facebook')->first();
			$facebook->value=Request::get('txtFacebook');
			$facebook->save();
			//Twitter
			$twitter=About::where('name','twitter')->first();
			$twitter->value=Request::get('txtTwitter');
			$twitter->save();
			return 1;
		}
		return 0;
	}
}
