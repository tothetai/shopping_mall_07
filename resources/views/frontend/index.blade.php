<!DOCTYPE html>
<html>
<head>
	@include('frontend.header')
</head>
<body>
    <div class="header_container">
        <div class="header-top hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-7">
                        <div class="welcome-msg">{{ Lang::get('index.header.welcome') }}</div>
                    </div>
                  <!--   <div class="social-sharing pull-right">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Vietnam
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="{!! route('user.change-language', ['en']) !!}">English</a></li>
                                  <li><a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a></li>
                              </ul>
                          </div>
                      </div> -->
                  </div>
              </div>
          </div>
      </div>
      <div class="container header_main hidden-sm hidden-xs">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12 col-sm-4 ">
                <div class="logo">
                    <a href="" class="Lyly FashionShop"><img src="assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12  search hidden-xs">
                <div class="search_form">
                    <form action="seach" class="search-form" role="search" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token() }}";/>
                        <input placeholder="{{ Lang::get('index.homepage.search') }} "  class="search_input"
                        type="text" name="timkiem" >
                        <input type="submit" value="{{ Lang::get('index.homepage.search') }} " class="btnsearch">
                    </form>
                </div>
            </div>
            <div class=" col-lg-4 col-md-4 col-sm-4 hidden-xs account-cart">
             <div class="account">
                <img  class="mg_bt_10" src="assets/img/account.png" alt="" height="31", width="31">
                @if(Auth::check())
                <span>
                    <a href="">Chào bạn <label class="int">{{ Auth::user()->name }}</label> /</a>
                    <a href="logout">Đăng xuất</a> 
                </span>
                @else
                <span>
                    <a  class="cl_old" href="register">{{ Lang::get('index.homepage.register') }} / </a>
                    <a  class="cl_old" href="login">{{ Lang::get('index.homepage.login') }}</a>
                </span>
                @endif
            </div>
            <div class="top-cart-contain cart-icon">
                @include('frontend.partials.cart-list')
            </div>
        </div>
    </div>
</div>
<nav class=" hidden-xs " role="navigation">
    <div class="border-ftw  ">
        <div class="container">
            <div class="row nav_menu collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav-inner">
                    <ul id="nav" class=" nav navbar-nav">
                        <li class="level0 parent active">
                            <a href="homepage"><span>{{ Lang::get('index.index.home') }}</span></a>
                        </li>
                        <li class="level0 parent ">
                            <a href="product"><span>{{ Lang::get('index.homepage.product') }}</span></a>
                        </li>
                        <li class="level0 level-top parent"> <a class="level-top" href="contact"> <span>{{ Lang::get('index.homepage.contact') }}</span> </a> </li>
                        <li class="level0 parent ">
                            <a href="introduct"><span>{{ Lang::get('index.homepage.introduce') }}</span></a>
                        </li>
                        <li class="custom">
                            <span id="cart-menu-li" class="cart-icon"> 
                                 @include('frontend.partials.cart-list')
                            </span>
                        </li>
                    </ul>
                    <div class="nav_hotline pull-right hidden-xs hidden-sm">
                        <img src="assets/img/call_white.png" alt="" width="30"> Hotline : 0971 885 136
                    </div>
                </div>
            <div class="container hidden-lg hidden-md  mobile_menu">
                <div class="row">
                    <div class="col-xs-12" id="mobile-menu">
                        <div class="logo">
                            <a title="Lyly FashionShop" href="index.html">
                                <a href=""><img src="assets/img/logo.png" alt=""></a>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>
</div>	<!-- Begin Wrapper -->
@yield('content')


<!-- Footer -->

@include('frontend.footer')
{!! Html::script('assets/js/jquery.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/owl.carousel.min.js') !!}
{!! Html::script('js/script.js') !!}
{!! Html::script('js/main.js') !!}
{!! Html::script('js/cart2.js') !!} 

</body>
</html>

