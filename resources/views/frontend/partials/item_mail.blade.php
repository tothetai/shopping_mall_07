<div class="col-md-5 col-xs-12 order no">
    <b>Đơn hàng của bạn gồm {{Cart::count()}} sản phẩm</b>
        <div class="product-items">
            @foreach($cart as $ct)
                <div class="item">
                    <img src="{{ url('assets/uploads').'/'.$ct->options['img'] }}" alt="">
                    <span class="nameproduct">{{$ct->name}}</span>
                    @if($ct->qty == 1)
                    <span class="price">${{$ct->price}}</span>
                    @else
                    <span class="price">${{ $ct->options['dis'] * $ct->qty }}</span>
                    <span>{{$ct->qty}}</span>
                    @endif
                </div>
            @endforeach
        <p class="totalpay">{{ Lang::get('index.homepage.sum')}}<span class="money">${{Cart::subtotal()}}</span></p>
    </div>
</div>