<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\About;
use Request;
use Input;
//use App\Http\Requests\BannerFormRequest;
use Validator;
class AboutController extends Controller {
	public function index()
	{
		$about=About::find(1);
		return view('admin.about.index',compact('about'));
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
		$banners=About::select('value')->where('type','banner')->get()->toArray();
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
			$fileName=$file->getClientOriginalName();
			$file->move('upload/banners/',$fileName);
			About::create([
				'name' => 'banner',
				'type' => 'banner',
				'value'=> $fileName
			]);
		}
		return redirect()->route('admin.about.listBanner')->with(['flash_message'=>'Upload Banner Success']);
	}
}
