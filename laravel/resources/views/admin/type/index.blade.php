@extends('admin')
@section('main')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/admin/type/create"><i class="icon-font"></i>新增分类</a>
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($re as $v)
                        <tr>
                            
                            <td>
                                {{$v->tid}}
                            </td>
                            <td>{{$v->tname}}</td>
                            <td>
                                <a class="link-update" href="/admin/type/edit/{{$v->tid}}">编辑</a>
                                <a class="link-del" href="/admin/type/destroy/{{$v->tid}}">删除</a>
                            </td>
                        </tr>
						@endforeach
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection