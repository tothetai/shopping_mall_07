<div class="container">
    <div class="row">
        <div class="col-md-7 col-xs-12  ">
         <h1><a href="homepage" >LyLyFashion</a></h1>
            <div class="ckeck">
                <b>{{ Lang::get('index.homepage.thanks')}}</b>
                <p>{{ Lang::get('index.homepage.check')}}. <span style="color: red;">{{$bill['email']}} .</span>{{ Lang::get('index.homepage.checkmail')}} </p>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 order no">
            <b>{{ Lang::get('index.homepage.order')}} {{Cart::count()}} {{ Lang::get('index.homepage.product')}}</b>
            <div class="product-items">
                @foreach($cart as $ct)
                <div class="item">
                    <img src="{{ url('assets/uploads').'/'.$ct->options['img'] }}" alt="">
                    <span class="nameproduct">{{$ct->name}}</span>
                    @if($ct->qty == 1)
                    <span class="price">${{$ct->price}}</span>
                    @else
                    <span class="price">${{ $ct->options['dis'] * $ct->qty }}</span>
                    @endif
                </div>
                @endforeach
                <p class="totalpay">{{ Lang::get('index.homepage.sum')}}<span class="money">${{Cart::subtotal()}}</span></p>
            </div>
        </div>
    </div>
</div>