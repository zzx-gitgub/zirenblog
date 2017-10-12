<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/css/admin/common.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/main.css"/>
    <link rel="stylesheet" type="text/css" href="/laravel-u-editor/third-party/SyntaxHighlighter/shCoreDefault.css"/>
    <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="/js/admin/modernizr.min.js"></script>
    <script type="text/javascript" src="/laravel-u-editor/third-party/SyntaxHighlighter/shCore.js"></script>
    <script>
        SyntaxHighlighter.all();
    </script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/admin">首页</a></li>
                <li><a href="/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>{{session('aname')}}正在操作后台</li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/article"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                        <li><a href="/admin/type"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="/admin/comment"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="/admin/flink"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    @yield('main')
</div>
</body>
</html>
