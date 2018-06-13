<li id="li-comment-{{$data['id']}}" class="comment">

	<article class="review-box clearfix">
		<figure class="rev-thumb"><img src="" alt=""></figure>
		<div class="rev-content">
			<div class="rev-info"><strong>{{$data['user']}} – February 04, 2017: </strong></div>
			<div class="rev-text">
				<p>{{ $data['text'] }}</p>
			</div>
			<div class="rev-reply">
				<a href="#"><span><i class="fa fa-reply" aria-hidden="true"></i> Ответить</span></a>
			</div>
		</div>
	</article>

</li>