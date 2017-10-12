@extends('home')
@section('main')
<div class="col-md-8 blog-main">
    <aside class="comments" id="comments">
    <hr>
	<h2><i class="fa fa-comments"></i>最新留言</h2>
        @foreach ($mess as $m)
	    <article class="comment">
	        <header class="clearfix">
	        <div class="meta">
	        <h3><a href="#">{{$m->mname}}</a></h3>
	        <span class="date">
	        	{{date('Y-m-d',$m->mtime)}}
	        </span>
	        </div>
	        </header>
	        <div class="body">
	        	{{$m->mcontents}}
                @if($m->mreply!="")
                <div><i style="color:#0481AA">子任</i><b>已回复</b>:{{$m->mreply}}</div>
                @endif
	        </div>
	    </article>
        @endforeach
    </aside>

        <aside class="create-comment" id="create-comment">
        <hr>
        <h2><i class="fa fa-pencil"></i> 留言板</h2>
        <form action="/message/store" method="post" accept-charset="utf-8">
            {{csrf_field()}}
            <div class="row">
            	<div class="col-md-6">
            		<input type="text" name="mname" id="comment-name" placeholder="留言名称不为空" class="form-control input-lg">
            	</div>
            	<div class="col-md-6">
            		<input type="email" name="memail" id="comment-email" placeholder="留言邮箱不为空" class="form-control input-lg">
            	</div>
            </div>

                <textarea rows="10" name="mcontents" id="comment-body" placeholder="留言内容不为空" class="form-control input-lg"></textarea>

            <div class="buttons clearfix">
                <button type="submit" class="btn btn-xlarge btn-clean-one">留言</button>
            </div>
            <div style="color:red" class="col-md-6">
                {{session('msg')}}            
            </div>
        </form>
    </aside>
</div>
@endsection