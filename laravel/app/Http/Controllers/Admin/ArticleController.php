<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ArticleController extends Controller
{
    /**
     * 文章列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示文章列表
        //查询文章数据
        $article = DB::table('b_article');
        $re = $article->join('b_type','b_type.tid','=','b_article.type')
            ->select('b_article.aid','b_article.title','b_article.pic','b_type.tname','b_article.click','b_article.create_at')
            ->Paginate(5);
        //获取当前页
        $page = $re->currentPage();
        //dd($page);die;
        return view('admin.article.index',['re'=>$re,'page'=>$page]);
    }

    /**
     * 添加页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取分类数据
        $type = DB::table('b_type')->get();
        //显示添加页面
        return view('admin.article.create',['type'=>$type]);
    }

    /**
     * 数据添加.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断表单中的数据是否为空
        if($request->input('title')==""){
            return back()->with('msg','标题不能为空');
        }
        if($request->input('contents')==""){
            return back()->with('mess','内容不能为空');
        }
        //执行添加
        //dd($request->all());die;
        $article = DB::table('b_article');
        //文件上传
        if($request->hasFile('pic')){
            //获取文件后缀
            $ext = $request->file('pic')->getClientOriginalextension();
            //上传后的文件名
            $newFile = md5(time().rand()).'.'.$ext;
            //保存到服务器上
            $request->file('pic')->move('./upload',$newFile);
            $data = array(
                'type'=>$request->input('type'),
                'origin'=>$request->input('origin'),
                'title'=>$request->input('title'),
                'pic'=>$newFile,
                'contents'=>$request->input('contents'),
		'description'=>$request->input('description'),
                'create_at'=>time()
            );
            $re = $article->insert($data);
            if($re){
                return redirect('/admin/article');
            }else{
                return back();
            }
        }else{
            return back();

        }
        
    }
    /**
     * 修改页面.
     *
     * @param  int  $aid
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($aid,$page)
    {
        //echo $page;die;
        //找出要修改数据
        $type = DB::table('b_type')->get();
        $article = DB::table('b_article')
                ->where('aid',$aid)
                ->select('aid','title','type','pic')
                ->first();
        //删除原图片
	$filename = './upload/'.$article->pic;
	if($filename!=""){
        	unlink($filename);
	}
        return view('admin.article.edit',['re'=>$article,'type'=>$type,'page'=>$page]);
    }

    /**
     * 数据修改.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $aid
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$aid,$page)
    {
        //echo $page;die;
        //执行修改
        //echo $page;die;

        $article = DB::table('b_article')
                ->where('aid',$aid)
                ->select('contents')
                ->first();
        //文件上传处理
        if($request->hasFile('pic')){
            //获取文件后缀
            $ext = $request->file('pic')->getClientOriginalextension();
            //上传后的文件名
            $newFile = md5(time().rand(1000,9999)).'.'.$ext;
            //保存文件到服务器
            $request->file('pic')->move('./upload',$newFile);
            //判断修改表单中的内容是否为空
            $contents = empty($request->input('contents'))?$article->contents:$request->input('contents');
            $data = array(
                'type'=>$request->input('type'),
                'origin'=>$request->input('origin'),
                'title'=>$request->input('title'),
                'pic'=>$newFile,
                'contents'=>$contents
            );
            $article = DB::table('b_article');
            $re = $article->where('aid',$aid)->update($data);
            if($re){
                return redirect('/admin/article?page='.$page);
            }else{
                return back();
            }
        }else{
            return back();
        }
        
    }

    /**
     * 删除数据.
     *
     * @param  int  $aid
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($aid,$page)
    {
        //删除服务器其中的图片
        $article = DB::table('b_article')->where('aid',$aid)->first();
	unlink('./upload/'.$article->pic);
        //执行删除
        $re = DB::table('b_article')->where('aid',$aid)->delete();
        if($re){
        	return redirect('/admin/article?page='.$page);
        }
    }
    /**
     * 搜索数据
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function search(Request $request)
    {
        //dd($request->input('ser'));
        if(!empty($request->input('ser'))){
           $article = DB::table('b_article');
            $res = $article->join('b_type','b_type.tid','=','b_article.type')
                ->select('b_article.aid','b_article.title','b_article.pic','b_type.tname','b_article.click','b_article.create_at')
                ->where('title','like','%'.$request->input('ser').'%')
                ->Paginate(5);
        }else{
            $article = DB::table('b_article');
            $res = $article->join('b_type','b_type.tid','=','b_article.type')
                ->select('b_article.aid','b_article.title','b_article.pic','b_type.tname','b_article.click','b_article.create_at')
                ->Paginate(5);
            
        }
        return view('admin.article.ser',['res'=>$res,'ser'=>$request->input('ser')]);
    }
}
