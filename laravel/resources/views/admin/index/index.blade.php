@extends('admin')
@section('main')
<div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎进入『{{session('aname')}}』博客后台。</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="/admin/article/create"><i class="icon-font">&#xe005;</i>新增博文</a>
                    <a href="/admin/type/create"><i class="icon-font">&#xe041;</i>新增博文分类</a>
                    <a href="/admin/flink/create"><i class="icon-font">&#xe01e;</i>新增友情链接</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">{{PHP_OS}}</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">{{$_SERVER["SERVER_SOFTWARE"]}} / LNMP1.4 / PHP5.6.31</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">{{php_sapi_name()}}</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP版本</label><span class="res-info">{{PHP_VERSION}}</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">{{ini_get('upload_max_filesize')}}</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器语言</label><span class="res-info">{{$_SERVER['HTTP_ACCEPT_LANGUAGE']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名</label><span class="res-info">{{$_SERVER['SERVER_NAME']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器IP</label><span class="res-info">{{$_SERVER['SERVER_ADDR']}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>博客地址</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">网站域名：</label><span class="res-info"><a href="http://www.zirenblog.com/" target="_blank">www.zirenblog.com</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
