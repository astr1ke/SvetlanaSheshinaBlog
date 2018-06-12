<div class="widget widget-about-me wow fadeInUp">
    <div class="widget-content">
        <?php
        $aboutMe = \App\aboutMe::find(1);
        ?>
        <div class="widget-about-me-profile">
            <img src="{{asset('storage').'/'.$aboutMe->foto}}" alt="...">
        </div>
        <div class="widget-extra-info-holder">
            <div class="widget-author-name">
                <h3>{{$aboutMe->name}}</h3>
                <span class="author-profession">{{$aboutMe->title}}</span>
            </div>
            <div class="widget-author-bio">
                <p>{{$aboutMe->text}}</p>
            </div>
            <div class="widget-author-signature">
                <img src="{{asset('images')}}/signature-one.jpg" alt="...">
            </div>
        </div>
    </div>
</div>