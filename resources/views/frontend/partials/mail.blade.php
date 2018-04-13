<div class="container">
    <div class="row">
        <div class="col-md-7 col-xs-12  ">
         <h1><a href="homepage" >LyLyFashion</a></h1>
            <div class="ckeck">
                <b>{{ Lang::get('index.homepage.thanks')}}</b>
                <p>{{ Lang::get('index.homepage.check')}}. <span style="color: red;">{{$bill['email']}} .</span>{{ Lang::get('index.homepage.checkmail')}} </p>
            </div>
        </div>
        @include('frontend.partials.item_mail');
    </div>
</div>