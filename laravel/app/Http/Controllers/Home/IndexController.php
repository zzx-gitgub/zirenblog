<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;
class IndexController extends BaseController
{
	public function index()
	{
		
		$sql = DB::table("b_article")->orderBy('aid','desc')->Paginate(10);
		
		$data = array(
			're'=>$sql,
			'type'=>$this->type,
			'hot'=>$this->hot,
			'flink'=>$this->flink
		);
		return view('home.index.index',$data);
	}
	public function detail(Request $request)
	{
		//dd($request->aid);die;
		$aid = $request->aid;
		$article = DB::table('b_article');
		$re = $article->where('aid','=',$aid)->first();
		//dd($re);die;
		//浏览文章次数
		$click = $re->click+1;
		$article->update(['click'=>$click]);
		//获取评论数据
		$comment = DB::table('b_comment')->where('aid',$aid)->get();
		//dd($comment->count());
		//获取评论的回复内容
		$reply = DB::table('b_commentreply')
				->get();
		$data = array(
			're'=>$re,
			'type'=>$this->type,
			'hot'=>$this->hot,
			'flink'=>$this->flink,
			'comment'=>$comment,
			'reply'=>$reply
		);
		return view('home.index.detail',$data);

	}
	//点击分类显示相应数据
	public function type(Request $request)
	{
		//dd($request->tid);
		$tid = $request->tid;
		
		//查询出相应的数据
		$article = DB::table('b_article')->where('type',$tid)->Paginate(10);
		$data = array(
			're'=>$article,
			'type'=>$this->type,
			'hot'=>$this->hot,
			'flink'=>$this->flink
		);
		return view('home.index.index',$data);
	}
	//文章搜索
	public function ser(Request $request)
	{
		$article = DB::table('b_article');
		if(!empty($request->input('ser'))){
			$re = $article->where('title','like','%'.$request->input('ser').'%')->Paginate(12);
		}else{
			$re = $article->Paginate(12);
		}
		$data = array(
			're'=>$re,
			'type'=>$this->type,
			'hot'=>$this->hot,
			'flink'=>$this->flink,
			'ser'=>$request->input('ser')
		);
		return view('home.index.ser',$data);
	}
}
