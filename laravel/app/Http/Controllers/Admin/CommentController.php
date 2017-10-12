<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * 显示评论列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示评论列表
        $comment = DB::table('b_comment');
        $re = $comment->join('b_article','b_comment.aid','=','b_article.aid')
                ->select('b_comment.cid','b_comment.cname','b_comment.cemail','b_article.title','b_comment.comment','b_comment.create_at')
                ->Paginate(5);
        //获取当前页
        $page = $re->currentPage();
        return view('admin.comment.index',['re'=>$re,'page'=>$page]);
    }

   

    /**
     * 删除评论.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid,$page)
    {
        //删除评论数据
        $re = DB::table('b_comment')->where('cid',$cid)->delete();
        if($re){
            return redirect('/admin/comment?page='.$page);
        }else{
            return back();
        }
    }
}
