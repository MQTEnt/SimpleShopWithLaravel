<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\User;
use Hash;
use DB;
use Auth;
class UserController extends Controller {
	public function getList()
	{
		$users=User::select(['id','username','level'])->get()->toArray();
		//var_dump($users);
		return view('admin.user.list',compact('users'));
	}
	public function getAdd()
	{
		return view('admin.user.add');
	}
	public function postAdd(UserFormRequest $request)
	{
		User::create([
			'username' => $request->input('txtUser'),
			'email' => $request->input('txtEmail'),
			'password' => Hash::make($request->input('txtPass')),
			'level' => $request->input('rdoLevel'),
			'remember_token' => $request->input('_token')
		]);
		return redirect()->route('admin.user.getList')->with(['flash_message'=>'Add user success']);
	}
	public function getEdit($id)
	{
		$user=User::find($id);
		if(Auth::user()->id!=1&&$user['level']==1&&Auth::user()->id!=$id)
		{
			//Neu id sua la Super Admin (id==1) hoac User duoc sua la Admin nhung User hien tai khong phai la User duoc sua (Vi admin chi co the sua chinh minh hoac member)
			return redirect()->route('admin.user.getList')->with(['flash_message'=>"You cant access !"]);
		}
		return view('admin.user.edit',compact('user','id'));
	}
	public function postEdit(Request $request, $id)
	{
		$user=User::find($id);
		if($request->input('txtPass')!='')
		{
			//txtPass != '' -> txtRePass phai khac rong va giong voi txtPass
			$rule=[
				'txtRePass'=> 'required|same:txtPass'
			];

			$message=[
				'txtRePass.required' =>'You have to fill re-pass',
				'txtRePass.same' => '2 password is not the same'
			];
			$this->validate($request,$rule,$message);
			$user->password=Hash::make($request->input('txtPass'));
		}
		else
		{
			if($request->input('txtRePass')!='')
			{
				//txtPass == '' va txtRePass != '' -> txtRePass not same -> Fill txtPass
				$rule=[
					'txtRePass'=>'same:txtPass'
				];

				$message=[
					'txtRePass.same'=>'You have to fill pass'
				];
				$this->validate($request,$rule,$message);
				$user->password=Hash::make($request->input('txtPass'));
			}
		}
		$user->remember_token=$request->input('_token');
		$user->email=$request->input('txtEmail');
		$user->level=$request->input('rdoLevel');
		//Can cap nhat xu ly khi user truy cap HTML va bo check ca 2 radio -> level = 0
		$user->save();
		return redirect()->route('admin.user.getList')->with(['flash_message'=>'Update Success']);
	}
	public function getDelete($id)
	{
		$userDelete=User::find($id);
		$userCurrent=Auth::user();
		if($id==1||($userCurrent->id!=1&&$userDelete->level==1))
		{
			//Neu id xoa = 1 -> La Super Admin -> Khong xoa
			//Hoac neu user hien tai khong phai la Super Admin nhung user bi xoa lai la Admin (userDelete co level =1) -> Khong xoa vi chi co Super Admin moi co quyen xoa Admin
			return redirect()->route('admin.user.getList')->with(['flash_message'=>"You can't delete this user !"]); 
		}
		else
		{
			$userDelete->delete();
			return redirect()->route('admin.user.getList')->with(['flash_message'=>'Delete Success']);
		}
	}
}
