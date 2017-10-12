<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class BaseController extends Controller{
	public $type;
	public $new;
	public $hot;
	public $flink;
	public function __construct()
	{
		//查询分类
		$this->type = DB::table('b_type')->get();
		//查询最新文章
		$this->new = DB::table("b_article")->orderBy('aid','desc')->limit(10)->get();
		//最热文章
		$this->hot = DB::table('b_article')->orderBy('click','desc')->limit(10)->get();
		//友情链接
		$this->flink = DB::table('b_link')->get();
	}
}