@extends('frontend.index')
@section('content')
<content>
    <div class="cthd">
        <div class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="inner">
                        <ul>
                            <li class="home"><a itemprop="url" title="Quay lại trang chủ" href="/"><span itemprop="title">{{ Lang::get('index.index.home')}} >> </span></a></li>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <li><span itemprop="title" class="brn">{{ Lang::get('index.homepage.productall') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row magin">
                @include('frontend.sibar')
                <section>
                    <div class="col-md-9 col-xs-12 col-sm-12">
                        <div class="all-title">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h4><strong>{{ Lang::get('index.homepage.productall') }}</strong></h4>
                            </div>
                        </div>
                        <div class="row ">
                            @foreach($product as $pro)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('productDetail', $pro->id)}}"><img src="{{url('assets/uploads').'/'. $pro->img}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $pro->name}}</p>
                                        <p class="single-item-price">
                                            @if( $pro->discount==0)
                                            <span class="flash-sale">${{ $pro->price}}</span>

                                            @else
                                            <span class="flash-del">${{ $pro->price}}</span>
                                            <span class="flash-sale">${{ $pro->discount}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{url('/cart/add')}}/{{$pro->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $pro->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                </section>  
            </div>
        </div>
    </div>
</content>
@endsection
