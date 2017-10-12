<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CommentController extends Controller
{
	/**
	 * 评论处理
	 * @param 	int 	$aid
	 * @return Illuminate\Http\Request
	 *
	 * @return Illuminate\Http\Reponse
	 */
	public function store(Request $request,$aid)
	{
		//dd($request->input('comment'));die;
		//判断表单数据是否为空
		if($request->input('cname')==""){
			return back()->with('msg','评论信息不能为空');
		}
		if($request->input('cemail')==""){
			return back()->with('msg','评论信息不能为空');
		}
		if($request->input('comment')==""){
			return back()->with('msg','评论信息不能为空');
		}
		//获取表单数据
		$data = array(
			'cname'=>$request->input('cname'),
			'cemail'=>$request->input('cemail'),
			'comment'=>$request->input('comment'),
			'aid'=>$aid,
			'create_at'=>time()
		);
		$re = DB::table('b_comment')->insert($data);
		if($re){
			return back();
		}else{
			return back();
		}
	}
	/**
	 * 评论回复
	 * @param 	int 	$cid
	 * @return Illuminate\Http\Request
	 *
	 * @return Illuminate\Http\Reponse
	 */
	public function reply(Request $request,$cid)
	{
		//判断回复内容，若为空则返回不提交
		if($request->input('replyname')==""){
			return back();
		}
		if($request->input('replycontent')==""){
			return back();
		}
		$data = array(
			'replyname'=>$request->input('replyname'),
			'replycontent'=>$request->input('replycontent'),
			'cid'=>$cid
		);
		$reply = DB::table('b_commentreply')->insert($data);
		if($reply){
			return back();
		}else{
			return back();
		}
	}
}