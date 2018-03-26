@extends('frontend.index')
@section('content') 
<div class="container">
    <form action="{{'checkout'}}" method="post" class="beta-form-checkout">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-md-8 col-xs-12  ">
                <div class="row">
                    <h1><a href="homepage" >LyLyFashion</a></h1>
                    <div class="col-md-7 col-xs-12 info">
                        <div class="title">
                            <b>{{ Lang::get('index.homepage.information_Purchase ') }}</b>
                        </div>
                        @if(Auth::check())
                            <label>
                                <input type="text" name="name" placeholder="{{Auth::user()->name}}" class="black" >
                            </label>
                            <label><input type="Email" name="email" placeholder="{{Auth::user()->email}}" class="black"> </label>
                            <label><input type="text" name="number" placeholder="Số điện thoại"></label>
                            <label><input type="text" name="address" placeholder="Địa chỉ"></label>
                        @else
                            <label><input type="text" name="name" placeholder="Họ và tên"></label>
                            <label><input type="Email" name="email" placeholder="Email"></label>
                            <label><input type="text" name="number" placeholder="Số điện thoại"></label>
                            <label><input type="text" name="address" placeholder="Địa chỉ"></label>
                        @endif
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <b>{{ Lang::get('index.homepage.checkout')}}</b>
                        <div class="pay">
                            <div class="payment">
                               <input class="input-radio" type="radio" value="74554" name="PaymentMethodId" id="payment_method_74554" data-check-id="4" bind="payment_method_id" checked="">
                               <span class="code">{{ Lang::get('index.homepage.trans') }}</span>
                           </div>
                           <p>cod</p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-md-4 col-xs-12 order">
            <b>{{ Lang::get('index.homepage.orders') }} {{Cart::count()}}{{ Lang::get('index.homepage.product') }}</b>
            <div class="product-items">

                @foreach($data as $cart)
                    <div class="item">
                        <img src="{{ url('assets/uploads').'/'.$cart->options['img'] }}" alt="">
                        <span class="nameproduct">{{$cart->name}}</span>
                        @if($cart->qty == 1)
                        <span class="price">${{$cart->price}}</span>
                        @else
                        <span class="price">${{ $cart->options['dis'] * $cart->qty }}</span>
                        @endif
                    </div>
                @endforeach
                <p class="totalpay">{{ Lang::get('index.homepage.sum') }}<span class="money">${{Cart::subtotal()}}</span></p>
                <a href="giohang" >< {{ Lang::get('index.homepage.goback') }} </a>
                <button type="submit" class="money">{{ Lang::get('index.homepage.placeorder') }}</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endsection
