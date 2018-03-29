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
                                <form action="" method="get" accept-charset="utf-8">
                                    <input type="text" id="qtym" name="quantity" value="1" min="1"  style="width: 10%;" />
                                    <a class="add-to-cart l" data-product-id="{{ $product->id }}"><i class="fa fa-shopping-cart "></i></a>
                                </form>
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
                        <?php print_r($comment->content); ?>
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
                        <div class="content3-slide owl-theme owl-carousel">
                            <div class="row noboder">
                                @foreach($pros as $proi)
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
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"  data-product-id="{{ $proi->id }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('productDetail', $proi->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <!-- .beta-products-list -->
                    </div>
                </div>

                <div class="col-sm-3 aside">
                    <div class="widget">
                        <div class="best_product block">
                            <div class="block-title">
                                <h5>{{ Lang::get('index.homepage.care')}}</h5>
                            </div>
                            <div class="block-content" id="scro" style="overflow: hidden; width: 270px; height: 90px;">
                                <div class="owl_hot_sale  owl-carousel owl-theme">
                                    <div class="item cat-slide-item"> 
                                        @foreach($data['slide'] as $proItem)
                                        <div class="item item_pd">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 item-img">
                                                <a href="{{route('productDetail', $proItem->id)}}"><img src="{{url('assets/uploads').'/'.$proItem->img}}"  width="81" height="81" alt="Sản phẩm demo"></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 item-info">
                                                <p class="item-name"><a href="{{route('productDetail', $proItem->id)}}">{{$proItem->name}}</a></p>
                                                <p class="item-price cl_price fs16"><span>${{$proItem->price}}</span></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
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