<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>子任博客，laravel，PHP，thinkPHP，Linux，服务器环境等技术分享</title>
<meta name="keywords" content="个人博客,技术学习分享,thinkphp,laravel博客,php博客,技术博客,子任" />
<meta name="description" content="子任的php博客,个人技术博客,zirenblog,子任博客网站" />
<link rel="stylesheet" type="text/css" href="/css/home/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/home/nprogress.css">
<link rel="stylesheet" type="text/css" href="/css/home/style.css">
<link rel="stylesheet" type="text/css" href="/css/home/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/image/icon/icon.png">
<link rel="shortcut icon" href="/image/icon/logo.ico">
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/nprogress.js"></script>
<script src="/js/jquery.lazyload.min.js"></script>
<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="/image/logo.png" alt=""></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="header-navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-index active"><a href="/">首页</a></li>
		  @foreach($type as $t)
          <li><a href="/type/{{$t->tid}}">{{$t->tname}}</a></li>
		  @endforeach
        </ul>
      </div>
    </div>
  </nav>
</header>
<section class="container">
	@yield('main')
  <aside class="sidebar">
    <div class="fixed">
      <div class="widget widget-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
          <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系博主</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane notice active" id="notice">
            <ul>
              <li>
                <time>{{date('Y-m-d',time())}}</time>
                <a href="" target="_blank">欢迎访问子任博客</a></li>
              <li>
                <time datetime="2016-01-04">{{date('Y-m-d',time())}}</time>
                <a target="_blank" href="">在这里可以看到服务器技术，后端程序开发，等文章，还有我的程序人生！</a></li>
            </ul>
          </div>
          <div role="tabpanel" class="tab-pane contact" id="contact">
            <h2>Email:<br />
              <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="zhixzhao@sina.com">zhixzhao@sina.com</a></h2>
          </div>
        </div>
      </div>
      <div class="widget widget_search">
        <form class="navbar-form" action="/ser" method="post">
		{{csrf_field()}}
          <div class="input-group">
            <input type="text" name="ser" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
    <div class="widget widget_hot">
      <h3>热门文章</h3>
      <ul>
		@foreach($hot as $h)
        <li><a href="/detail/{{$h->aid}}"><span class="thumbnail"><img class="thumb"  src="/upload/{{$h->pic}}" alt=""></span><span class="text">{{$h->title}}</span><span class="muted"><i class="glyphicon glyphicon-time"></i>{{date('Y-m-d',$h->create_at)}}</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i>{{$h->click}}</span></a></li>
		@endforeach
      </ul>
    </div>
	<div class="widget widget_hot">
      <h3>友情链接</h3>
      <ul>
		@foreach($flink as $f)
        <span style="border:1px solid gray;border-radius:5px;display:block;width:40%;float:left;margin:10px"><a style="padding:20px" href="{{$f->laddr}}" target="_blank">{{$f->lname}}</a></span>
		@endforeach
      </ul>
    </div>
  </aside>
</section>
<footer class="footer">
  <div class="container">
    <p style="color:black">&copy; 2017 <a style="color:black" href="http://www.zirenblog.com">zirenblog.com</a> &nbsp; <a style="color:black" href="#" target="_blank" rel="nofollow">青ICP备17001322</a> &nbsp; &nbsp; <a style="color:black" href="/admin" target="_blank">管理系统</a></p>
  </div>
  <div id="gotop"><a class="gotop"></a></div>
</footer>
<script src="/js/bootstrap.min.js"></script> 
<script src="/js/jquery.ias.js"></script> 
<script src="/js/scripts.js"></script>
</body>
</html>
