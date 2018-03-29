@extends('frontend.index')
@section('content')
<div class="wapper" style="background: #F5F5F5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="assets/img/slide-img.jpg">
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="assets/img/slide-img2.jpg">
                        </div>
                        <div class="item active">
                            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="assets/img/slide-img3.jpg">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
        <div class="row magin">
            @include('frontend.sibar')
            <!-- Danh mục sản phẩm -->
            <div class="col-xs-12 col-sm-9 col-md-9">
                <section class="article">
                    <p class="title">     <!-- sản phẩm mới về -->
                        {{ Lang::get('index.homepage.latestproduct') }}
                    </p>
                    <div class="item">
                        <div class="row noboder">
                            @foreach($data['slide'] as $pron)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('productDetail', $pron->id)}}"><img src="{{ url('assets/uploads').'/'.$pron->img }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $pron->name }}</p>
                                        <p class="single-item-price">
                                            @if($pron->discount==0)
                                            <span class="flash-sale">${{ $pron->price }}</span>
                                            @else
                                            <span class="flash-del">${{ $pron->price }}</span>
                                            <span class="flash-sale">${{ $pron->discount }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" data-product-id="{{$pron->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $pron->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                </section>
                <div class="imgadvertise">  <!-- Ảnh quảng cáo -->
                    <img src="assets/img/article_ads_banner_1.jpg">
                </div>
                <section class="article">
                    <div class="title">     <!-- sản phẩm khuyến mãi -->
                       {{ Lang::get('index.homepage.discountproduct') }}
                    </div>
                    <div class="item">
                        <div class="row noboder">
                            @foreach($pro_dis as $prodis)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('productDetail', $prodis->id)}}"><img src="{{ url('assets/uploads').'/'.$prodis->img }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $prodis->name }}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">${{ $prodis->price }}</span>
                                            <span class="flash-sale">${{ $prodis->discount }}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" data-product-id="{{$prodis->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $prodis->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                </section >
                <div class="imgadvertise">  <!-- Ảnh quảng cáo -->
                    <img src="assets/img/article_ads_banner_1.jpg">
                </div>
                <section class="article foot">
                    <div class="title">     <!-- sản phẩm nổi bật -->
                        {{ Lang::get('index.homepage.mostbuyproduct') }}
                    </div>
                    <div class="item">
                        <div class="row noboder">
                            @foreach($pros as $proi)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('productDetail', $proi->id)}}"><img src="{{ url('assets/uploads').'/'.$proi->img }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $proi->name }}</p>
                                        <p class="single-item-price">
                                            @if($proi->discount==0)
                                            <span class="flash-sale">${{ $proi->price }}</span>

                                            @else
                                            <span class="flash-del">${{ $proi->price }}</span>
                                            <span class="flash-sale">${{ $proi->discount }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" data-product-id="{{ $proi->id }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $proi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                </section>
            </div>
        </div>  
    </div>
</div>
@endsection

