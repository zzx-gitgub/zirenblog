<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
	public function index()
	{
		return view('admin.login.index');
	}
	public function checklogin(Request $request)
	{
		//dd($request->input('aname'));
		$aname = $request->input('aname');
		$apass = md5($request->input('apass'));

		//实例化用户库
		$admin = DB::table('admin');
		$re = $admin->where('aname',$aname)->first();
		if($re && $apass==$re->apass){
			$request->session()->put('aname',$aname);
			return redirect('/admin');
		}else{
			return back();
		}
	}
}