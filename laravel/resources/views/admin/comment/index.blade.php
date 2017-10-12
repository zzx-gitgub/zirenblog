@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">评论管理</span></div>
        </div>
        <div class="result-wrap">
                    <div class="result-list">
                        <a href="/admin/comment"><i class="icon-font"></i>评论管理</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                           
                            <th>ID</th>
                            <th>访客昵称</th>
                            <th>访客邮箱</th>
                            <th>评论文章</th>
                            <th>评论内容</th>
                            <th>评论时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($re as $v)
                         <tr>
                           
                            <td>
                                {{$v->cid}}
                            </td>
                            <td>{{$v->cname}}</td>
                            <td>{{$v->cemail}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->comment}}</td>
                            <td>{{$v->create_at}}</td>
                            <td>
                                <a class="link-del" href="/admin/comment/destroy/{{$v->cid}}/{{$page}}">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div id="pull_right">
                    <div class="pull-right">
                        {{$re->links()}}
                    </div>
                </div>
        </div>
    </div>
    
@endsection
