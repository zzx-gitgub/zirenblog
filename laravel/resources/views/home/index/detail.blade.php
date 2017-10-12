@extends('home')
@section('main')
<div style="background-color:white" class="content-wrap">
    <div class="content">
      <header class="article-header">
        <h1 class="article-title"><a href="article.html">{{$re->title}}</a></h1>
        <div class="article-meta"> <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：2016-1-4 10:29:39"><i class="glyphicon glyphicon-time"></i> {{date('Y-m-d',$re->create_at)}}</time>
          </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-globe"></i> @if($re->origin==0)原创@else转载@endif</span> 
		  
		  @foreach($type as $t)
		  @if($re->type==$t->tid)
		  <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" ><i class="glyphicon glyphicon-list"></i> <a href="program" title="">{{$t->tname}}</a></span> 
		  @endif
		  @endforeach
		  <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="查看：120"><i class="glyphicon glyphicon-eye-open"></i> {{$re->click}}</span> 
      </header>
        <p> {!!$re->contents!!}</p>
	 <hr> 
      <div class="title" id="comment">
        <h3>评论</h3>
      </div>
      <div id="respond">
        <form action="/comment/store/{{$re->aid}}" method="post" id="comment-form">
		{{csrf_field()}}
          <div class="comment">
            <div class="comment-title"><img class="avatar" src="/image/icon/icon.png" alt="" /></div>
			<input type="text" name="cname" id="" placeholder="您的名称" />
			<input type="email" name="cemail" id="" placeholder="您的邮箱" />
            <div style="margin-top:5px" class="comment-box">
              <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" cols="100%" rows="3" tabindex="1" ></textarea>
				
                <button type="submit" name="comment-submit" id="comment-submit" tabindex="5" articleid="1">评论</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="postcomments">
        <ol class="commentlist">
          <!-- <li class="comment-content"><span class="comment-f">#1</span> -->
			@foreach($comment as $c)
            <div class="comment-avatar"><img class="avatar" src="/image/icon/icon.png" alt="" /></div>
            <div class="comment-main">
              <p><span class="address">{{$c->cname}}</span><span class="time">{{date('Y-m-d',$c->create_at)}}</span><a class="reply" href="###">回复</a> | <a class="del-reply" href="###">取消</a><br />
			  {{$c->comment}}。</p>
            </div>
			@foreach($reply as $r)
			@if($c->cid==$r->cid)
			<div class="comment-main">
              <p><span class="address">{{$r->replyname}}</span><span style="color:red">已回复</span>
			  {{$r->replycontent}}</p>
            </div>
			@endif
			@endforeach
			<div style="width:400px;display:none" id="respond">
				<form action="/comment/reply/{{$c->cid}}" method="post" id="comment-form">
				{{csrf_field()}}
					<div class="comment">
					<div class="comment-title"><img class="avatar" src="/image/icon/icon.png" alt="" /></div>
					<input type="text" name="replyname" id="" placeholder="您的名称" />
					<div style="margin-top:5px" class="comment-box">
					<textarea placeholder="您的回复内容" name="replycontent" id="comment-textarea" cols="100%" rows="3" tabindex="1" ></textarea>
				
				<button type="submit" name="comment-submit" id="comment-submit" tabindex="5" articleid="1">回复</button>
             </div>
           </div>
         </div>
       </form>
     </div>
			@endforeach
		</ol>
    </div>
  </div>
 <script type="text/javascript">
	$(function(){
		$(".reply").click(function(){
			$(this).parent().parent().nextAll('#respond').show();
		});
		$(".del-reply").click(function(){
			$(this).parent().parent().nextAll('#respond').hide();
		});
	});
</script>
@endsection
