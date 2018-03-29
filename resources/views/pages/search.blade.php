@extends('frontend.index')
@section('content')
<content>
    <div class="cthd">
        <div class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="inner">
                        <ul>
                            <li class="home"><a itemprop="url" title="Quay lại trang chủ" href="/"><span itemprop="title">{{ Lang::get('index.index.home')}}</span></a></li>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <li><span itemprop="title" class="brn">{{ Lang::get('index.homepage.searchs') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row magin">
                @include('frontend.sibar')
                <!-- TẤT CẢ SẢN PHẨM -->
                <section>
                    <div class="col-md-9 col-xs-12 col-sm-12">
                        <div class="all-title">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h4><strong>TẤT CẢ SẢN PHẨM</strong></h4>
                                <strong style="color: red">{{ Lang::get('index.homepage.key') }} : {{$tk}} </br>
                                Có {{count($search)}} {{ Lang::get('index.homepage.product') }}</strong>
                            </div>
                            
                        </div>
                        <div class="row">
                            @foreach($search as $sear)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{url('assets/uploads').'/'.$sear->img }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sear->name}}</p>
                                        <p class="single-item-price">
                                            @if($sear->discount==0)
                                            <span class="flash-sale">${{$sear->price}}</span>

                                            @else
                                            <span class="flash-del">${{$sear->price}}</span>
                                            <span class="flash-sale">${{$sear->discount}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{url('/cart/add')}}/{{$sear->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $sear->id)}}">Details <i class="fa fa-chevron-right"></i></a>
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
</content>
@endsection
