<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use DB;
use Auth;

class UserController extends Controller
{
    public function getUser(){
    	$data['userlist'] = DB::table('user_table')->paginate(4);
    	return view('backend.admin',$data);
    }
    public function getAddUser(){
    	
    	return view('backend.add');
    }
    public function postAddUser(AddUserRequest $request){
    	$user = new User;
    		$password= $request->pass;
    		$user->name = $request->user;
	    	$user ->email = $request->mail;
	    	$user ->password =bcrypt($password);
	    	$user ->role = $request->level;
	    	$user ->save();
    		return redirect('admin/user');
    }
    public function getEditUser($id){
    	$data['user']= User::find($id);
    	return view('backend.edit',$data);
   		
    }
    public function postEditUser(EditUserRequest $request, $id){
    	$user = User::find($id);
    		$password= $request->pass;
    		$user ->name = $request->user;
	    	$user ->email = $request->mail;
	    	$user ->password =bcrypt($password);
	    	$user ->role = $request->level;
	    	$user ->save();
	    	return redirect()->intended('admin/user');
    }	
	  
    public function getDeleteUser($id){
    	$user_current_login = Auth::user()->id;
    	$data_delete = User::find($id);
    	if( ($id == 23) || ($user_current_login != 23 && (($data_delete['role'] == 2) || ($data_delete['role'] == 1  && $data_delete['id']!= 23)))){
            return redirect() -> route('showuser')->with(['flash_level' => 'danger','flash_message' => 'Bạn không thể xóa được tài khoản này']);
    	}else{
            User::destroy($id);
            return redirect() -> route('showuser')->with(['flash_level' => 'success','flash_message' => 'Xóa thành công']);
    	}
    }
}
