@extends('frontend.index')
@section('content') 
<div id="giohang">
    <div class="container">
        <div class="super-link">     <!-- Tên sản phẩm đc bấm vào chi tiết -->
            <a class="gotohome" href="#">{{Lang::get('index.index.home')}}</a>   &gt;&gt;<span>{{ Lang::get('index.homepage.mycart') }}</span>
        </div>
        <hr style="margin: 0px !important">
        <table>
            <tbody>
                <tr class="detail-descript-item">
                    <td class="big-column">{{ Lang::get('index.homepage.proimg') }}</td>
                    <td class="big-column">{{ Lang::get('index.homepage.product') }}</td>
                    <td class="medium-column">{{ Lang::get('index.homepage.price') }}</td>
                    <td class="medium-column">{{ Lang::get('index.homepage.qty') }}</td>
                    <td class="medium-column">{{ Lang::get('index.homepage.total') }}</td>
                    <td class="small-column">{{ Lang::get('index.homepage.del') }}</td>
                </tr>
                <form method="POST" action="">
                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                 
                    @foreach($data as $cart)
                    <tr class="d-d-item2">
                        <td class="b-c2"><img style="width: 80px;height: 80px" src="{{ url('assets/uploads').'/'.$cart->options['img'] }}"></td>
                        <td class="b-c2">{{ $cart->name }}</td>
                        @if($cart->options['dis'] == 0)
                        <td class="me-c2">${{ $cart->price }}</td>
                        <td id="m-c2">
                            <input type="number" value="{{$cart->qty}}" min="1" name="" style="width: 62px;height: 40px" 
                            class="qty" />
                            <img src="assets/img/res.png" alt="" class="upCart" id="{{$cart->id}}" data-row-id="{{$cart->rowId}}">
                        </td>
                        <td class="me-c2">${{ $cart->price * $cart->qty }}</td>
                        @else
                        <td class="me-c2">${{ $cart->options['dis'] }}</td>
                        <td id="m-c2">
                            <input type="number" value="{{$cart->qty}}" min="1" name="" class="qty" style="width: 62px;height: 40px">
                            <img src="assets/img/res.png" alt="" class="upCart" id="{{$cart->id}}" data-row-id="{{$cart->rowId}}">
                        </td>
                        <td class="me-c2">${{ $cart->options['dis'] * $cart->qty }}</td>
                        @endif
                        <td class="s-c2"><a href="{{url('delCart')}}/{{$cart->rowId}}"><img src="assets/img/bin.png"></a></td>
                    </tr>
                    @endforeach
     
                </form>
            </tbody>
        </table>
        <div class="row continued">
            <div class="col-md-2 ">
                <a href="homepage" class="btn-cont">{{ Lang::get('index.homepage.continue') }}</a>
            </div>
            <div class="col-md-5 col-md-push-5 all-price">
                <div id="a-left">
                    {{ Lang::get('index.homepage.total_price') }}
                </div>
                <div id="a-right">
                    ${{ Cart::subtotal()}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-push-7">
                <button id="pay-bill"><a href="checkout"> {{ Lang::get('index.homepage.checkout') }}</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
