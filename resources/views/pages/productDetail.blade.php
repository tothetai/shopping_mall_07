@extends('frontend.index')
@section('content')
<div class="rev-slider">
    <div class="inner-header">
        <div class="container">
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="homepage">{{ Lang::get('index.index.home') }}</a> / <a href="" class="name">{{$product->name}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="product-detail-image-for slick-initialized slick-slider">
                                <img src="{{ url('assets/uploads').'/'.$product->img }}" type="" media=""/>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="single-item-body">
                                <h3 class="single-item-title">{{$product->name}}</h3>
                                <h5>{{$product->description}}</h5>
                                <p class="single-item-price">
                                    @if($product->discount==0)
                                    <span class="flash-sale">${{$product->price}}</span>
                                    @else
                                    <span class="flash-del">${{$product->price}}</span>
                                    <span class="flash-sale" style="color:red">${{$product->discount}}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>
                            <span style="margin-right:20px; ">Số lượng:</span>
                            <div class="single-item-options">
                                    <input type="text" id="qtym" name="quantity" value="1" min="1"  style="width: 10%;" />
                                    <a class="add-to-cart l" data-product-id="{{$product->id}}"><i class="fa fa-shopping-cart "></i></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="space20">&nbsp;</div>
                        </div>
                    </div>
                    <div class="space40">&nbsp;</div>
                    @if(Auth::check())
                    <div class="well">
                        <h4>{{ Lang::get('index.index.comment') }} ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" method="post" id="form-comment">
                            <div class="form-group">
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                <textarea class="form-control" rows="3" name="content" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ lang::get('index.homepage.submit') }}</button>
                        </form>
                    </div>
                    @else
                    <div class="well">
                        <h4>{{ Lang::get('index.index.comment') }} ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form action= "comment/{{$pros->id}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token() }}";/>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" >bạn chưa đăng nhập</textarea>
                            </div>
                        </form>
                    </div>
                    @endif
                    <!-- Comment -->
                    <div class="media" id="mydiv">
                        @include('frontend.partials.comment')
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>{{ Lang::get('index.homepage.productsame')}}</h4>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row  same">
                            <p class="pull-left">Có {{ count($sp_tuongtu) }} {{ Lang::get('index.homepage.product') }}</p>
                            <div class="clearfix"></div>
                            @foreach($sp_tuongtu as $proi)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('productDetail', $proi->id)}}"><img src="{{url('assets/uploads').'/'.$proi->img}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$proi->name}}</p>
                                        <p class="single-item-price">
                                            @if($proi->discount==0)
                                            <span class="flash-sale">${{$proi->price}}</span>
                                            @else
                                            <span class="flash-del">${{$proi->price}}</span>
                                            <span class="flash-sale">${{$proi->discount}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption up">
                                        <a class="add-to-cart "  data-product-id="{{ $proi->id }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('productDetail', $proi->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        <!-- .beta-products-list -->
                    </div>
                </div>

                <div class="col-sm-3 aside"><!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">{{ Lang::get('index.homepage.discountproduct')}}</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach( $prodis as $prod)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('productDetail', $prod->id)}}">
                                        <img src="{{url('assets/uploads').'/'.$prod->img}}" alt="">
                                    </a>
                                    <div class="float">
                                        <a href="{{route('productDetail', $prod->id)}}">{{$prod->name}}</a>
                                        <p class="beta-sales-price">${{$prod->price}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection