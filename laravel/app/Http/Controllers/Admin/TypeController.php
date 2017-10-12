<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TypeController extends Controller
{
    /**
     * 显示分类列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示分类列表
        $type = DB::table('b_type');
        $re=$type->select('tid','tname')->get();
        return view('admin.type.index',['re'=>$re]);
    }

    /**
     * 添加页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加页面展示
        return view('admin.type.create');
    }

    /**
     * 执行添加方法.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $re = DB::table('b_type')->insert(['tname'=>$request->input('tname')]);
        if($re){
            return redirect('/admin/type');
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
    public function edit($tid)
    {
        //取出需要修改的数据
        $re = DB::table('b_type')->where('tid',$tid)->first();
        //修改页面展示
        return view('admin.type.edit',['re'=>$re]);
    }

    /**
     * 执行修改的方法.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tid)
    {
        //执行修改
        $re=DB::table('b_type')->where('tid',$tid)->update(['tname'=>$request->input('tname')]);
        if($re){
            return redirect('/admin/type');
        }else{
            return back();
        }
    }

    /**
     * 执行删除方法.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tid)
    {
        //执行删除
        $re = DB::table('b_type')->where('tid',$tid)->delete();
        if($re){
            return redirect('/admin/type');
        }else{
            return back();
        }
    }
}
