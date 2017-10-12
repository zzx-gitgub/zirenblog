@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">博文管理</a><span class="crumb-step">&gt;</span><span>修改文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/admin/article/update/{{$re->aid}}/{{$page}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>分类：</th>
                                <td>
                                    <select name="type" id="catid" class="required">
                                        @foreach ($type as $t)
                                        @if ($t->tid==$re->type)
                                        <option selected="selected" value="{{$t->tid}}">{{$t->tname}}</option>
                                        @else
                                        <option value="{{$t->tid}}">{{$t->tname}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>来源：</th>
                               <td><input type="radio" checked="checked" name="origin" value="0">原创  <input type="radio" name="origin" value="1">转载</td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="{{$re->title}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td><input name="pic" id="" type="file"></td>
                            </tr>

                            <tr>
                                <th></th>
                               <td class="common-textarea" name="contents" id="content" width="1000" height="250">@include('UEditor::head')</td>     
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
        <script id="content"></script>
        <script>
            var ue=UE.getEditor("content");
            ue.ready(function(){
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.execCommand('serverparam','_token','{{ csrf_token() }}');
            });
        </script>
@endsection
