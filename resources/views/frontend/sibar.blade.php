<div class="col-xs-12 col-md-3 sibar">
    <div class="product_list block">
        <div class="block-title">
            <h5><a href=""><i class="fa fa-bars" aria-hidden="true"></i>Danh mục sản phẩm</a></h5>
        </div>
    </div>
    <div class="block-content">
        @foreach($cat as $ca)
          
                <li class="level0 parent drop-menu ">
                    <a href="/thoi-trang-nu">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <span>{{ $ca->cat_name }}</span>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                @if(count($ca->subCat) > 0)
                    @foreach($ca->subCat as $subcat)       
                        <ul class="level1">
                            <li class="level1"><a href="/ao-nu"><span>{{ $subcat->sub_name }}</span></a></li>
                        </ul>
                    @endforeach
                 @endif
                </li>
        @endforeach
    </div><!-- end phần sản phẩm -->
    <div class="online_support block">
        <div class="block-title">
            <h5>{{ Lang::get('index.homepage.help') }}</h5>
        </div>
        <div class="block-content">
            <div class="sp_1">
                <p><b>{{ Lang::get('index.homepage.support') }} 1</b></p>
                <p>Mrs. Bão  <span>0971 885 136</span></p>
            </div>
            <div class="sp_2">
                <p>{{ Lang::get('index.homepage.support') }} 2</p>
                <p>Mrs. Bão  <span>0971 885 136</span></p>
            </div>
            <div class="sp_mail">
                <p>Email liên hệ</p>
                <p><a href="#"></a>hoaibao@gmail.com</p>
            </div>
        </div>
    </div>
    <!-- Sản phẩm nổi bật -->
    <div class="best_product block">
        <div class="block-title">
            <h5>{{ Lang::get('index.homepage.care') }}</h5>
        </div>
        <div class="block-content" id="scro" style="overflow: hidden; width: 270px; height: 90px;">
            <div class="owl_hot_sale slide owl-carousel owl-theme">
                <div class="item cat-slide-item"> 
                    @foreach($pro_news as $pronew)
                    <div class="item item_pd">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 item-img">
                            <a href="/trangchu/<?=$pronew->pro_id;?>"><img src="{{url('assets/uploads').'/'.$pronew->img}}"  width="81" height="81" alt="Sản phẩm demo"></a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 item-info">
                            <p class="item-name"><a href="/san-pham-demo-19">{{ $pronew->name }}</a></p>
                            @if($pronew->discount==0)
                            <p class="item-price cl_price fs16"><span>${{ $pronew->price }}</span></p>
                            @else
                            <p class="item-price cl_price fs16">
                                <span class="flash-del">${{ $pronew->price }}</span>
                                <span class="flash-sale">${{ $pronew->discount }}</span>
                            </p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <img src="assets/uploads/banner.jpg" alt="lỗi ok" width="100%">
</div>
