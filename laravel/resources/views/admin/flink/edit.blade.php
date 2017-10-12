@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/admin/flink">友链管理</a><span class="crumb-step">&gt;</span><span>修改友情链接</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/admin/flink/update/{{$re->lid}}/{{$page}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                	{{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <tr>
                                <th><i class="require-red">*</i>链接名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="lname" size="50" value="{{$re->lname}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>链接名称：</th>
                                <td><input class="common-text" name="laddr" size="50" value="{{$re->laddr}}" type="text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection