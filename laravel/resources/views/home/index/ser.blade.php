@extends('home')
@section('main')
<div class="content-wrap">
      <div class="title">
        <h3>最新发布</h3>
		@foreach($re as $v)
      <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" src="/upload/{{$v->pic}}" alt=""></a>
		@foreach($type as $t)
		@if($v->type == $t->tid)
        <header><a class="cat" href="program">{{$t->tname}}<i></i></a>
		@endif
		@endforeach
          <h2><a href="/detail/{{$v->aid}}" title="">{{$v->title}}</a></h2>
        </header>
        <p class="meta">
          <time class="time"><i class="glyphicon glyphicon-time"></i> {{$v->create_at}}</time>
          <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共{{$v->click}}人浏览</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0条评论</a></p>
        <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
      </article>
	  @endforeach
       <div class="page-posi">
            {{$re->appends(['ser'=>$ser])->render()}}
        </div>
    </div>
  </div>
@endsection
