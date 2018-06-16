@foreach($items as $item)

<li id="li-comment-{{$item->id}}" class="comment">
	<div id="comment-{{$item->id}}" class="comment-container">


		<article class="review-box clearfix" style="margin-bottom: 0px; min-height: 90px; padding-left: 90px">
			<?php
				$userCom = \App\User::find($item->user_id);
            if(isset($userCom)){
                $ava =$userCom -> avatar;
                if (mb_substr($ava, 0,1) == 'a'){
                    $ava = '/storage/'.$ava;
                }
            }
			?>
			@if(isset($ava))
				<figure class="rev-thumb"><img src="{{$ava}}" alt=""></figure>
			@endif
			<div class="rev-content" style="padding: 10px">
				<div class="rev-info" style="padding: 0px"><strong>{{$item->user}} – {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}} </strong></div>
				<div class="rev-text">
					<p>{{ $item->text }}</p>
				</div>
				<div class="rev-reply" style="padding-top: 0px">
					<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;,&quot;{{$item->id}}&quot;,&quot;respond&quot;,&quot;{{$item->article_id}}&quot;)">Ответить</a>
					<?php
						if(\Illuminate\Support\Facades\Auth::check()){
							if((\Illuminate\Support\Facades\Auth::user()->role_id == 1) or
								((\Illuminate\Support\Facades\Auth::user()->name == $item->user)and
									($item->text != 'Пользователь удалил свой комментарий'))){
								echo ("<a class=\"comment-reply-link\" href=\"#respond\" onclick=\"return delComment.updForm(&quot;$item->id&quot;)\">Удалить</a>");
							}
						}
						?>
				</div>
			</div>
		</article>



	@if(isset($com[$item->id]))
	<ul class="children">
		@include('comments.comment', ['items' => $com[$item->id]])
	</ul>
	@endif
	
</li>

@endforeach