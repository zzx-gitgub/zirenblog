@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">友链管理</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/admin/flink/create"><i class="icon-font"></i>新增友链</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>友链名称</th>
                            <th>友链地址</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($re as $v)
                        <tr>
                            <td>
                                {{$v->lid}}
                            </td>
                            <td>{{$v->lname}}</td>
                            <td>{{$v->laddr}}</td>
                            <td>
                                <a class="link-update" href="/admin/flink/edit/{{$v->lid}}/{{$page}}">编辑</a>
                                <a class="link-del" href="/admin/flink/destroy/{{$v->lid}}/{{$page}}">删除</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    
                </div>
        </div>
    </div>
    <div id="pull_right">
       <div class="pull-right">
          {{$re->links()}}
       </div>
    </div>
@endsection