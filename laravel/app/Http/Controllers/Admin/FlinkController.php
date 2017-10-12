<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FlinkController extends Controller
{
    /**
     * 友情链接显示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $flink = DB::table('b_link');
        $re = $flink->select('lid','lname','laddr')->Paginate(5);
        //获取当前页
        $page = $re->currentPage();
        //显示友链列表
        return view('admin.flink.index',['re'=>$re,'page'=>$page]);
    }

    /**
     * 添加页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //友情链接添加页面
        return view('admin.flink.create');
    }

    /**
     * 执行添加方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加数据
        //dd($request->input('lname'));die;
        $data = ['lname'=>$request->input('lname'),'laddr'=>$request->input('laddr')];
        $flink = DB::table('b_link');
        $re = $flink->insert($data);
        if($re){
            return redirect('/admin/flink');
        }else{
            return back();
        }
    }

    /**
     * 修改页面.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lid,$page)
    {
        //echo $lid;
        //从数据库中取出要修改的数据
        $flink = DB::table('b_link')->where('lid',$lid)->first();
        //dd($flink->currentPage());die;
        return view('admin.flink.edit',['re'=>$flink,'page'=>$page]);
    }

    /**
     * 执行修改的方法.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lid,$page)
    {
        //修改数据
        $flink = DB::table('b_link');
        //获取表单数据
        $data = array(
            'lname'=>$request->input('lname'),
            'laddr'=>$request->input('laddr')
        );
        $re = $flink->where('lid',$lid)->update($data);
        if($re){
            return redirect('/admin/flink?page='.$page);
        }else{
            return back();
        }
    }

    /**
     * 删除数据.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lid,$page)
    {
        //删除数据
        $re = DB::table('b_link')->where('lid',$lid)->delete();
        if($re){
            return redirect('/admin/flink?page='.$page);
        }
    }
}
