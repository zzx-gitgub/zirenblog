@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">博文管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/admin/article/search" method="post">
                {{csrf_field()}}
                    <table class="search-tab">
                        <tr>
                            <td><input class="common-text" placeholder="关键字" name="ser" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/admin/article/create"><i class="icon-font"></i>新增文章</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>文章图片</th>
                            <th>分类</th>
                            <th>点击</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($res as $v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v->aid}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->pic}}</td>
                            <td>{{$v->tname}}</td>
                            <td>{{$v->click}}</td>
                            <td>{{$v->create_at}}</td>
                            <td>
                                <a class="link-update" href="/admin/article/edit/{{$v->aid}}">编辑</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div id="pull_right">
                        <div class="pull-right">{!!$res->appends(['ser'=>$ser])->render()!!}</div>
                    </div>
                </div>
        </div>
    </div>
@endsection