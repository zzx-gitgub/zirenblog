@extends('home')
@section('main')
<div class="content-wrap">
      <div class="title">
        <h3>最新发布</h3>
		@foreach($re as $v)
      <article class="excerpt excerpt-1"><a class="focus" href="/detail/{{$v->aid}}" title=""><img class="thumb"  src="/upload/{{$v->pic}}" alt=""></a>
		@foreach($type as $t)
		@if($v->type == $t->tid)
        <header><a class="cat" href="program">{{$t->tname}}<i></i></a>
		@endif
		@endforeach
          <h2><a href="/detail/{{$v->aid}}" title="">{{$v->title}}</a></h2>
        </header>
        <p class="meta">
          <time class="time"><i class="glyphicon glyphicon-time"></i> {{date('Y-m-d',$v->create_at)}}</time>
          <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共{{$v->click}}人浏览</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0条评论</a></p>
	<p style="font-size:14px" class="note">{{$v->description}}</p>
      </article>
	  @endforeach
       <div class="page-posi">
            {{$re->links()}}
        </div>
    </div>
  </div>
@endsection
