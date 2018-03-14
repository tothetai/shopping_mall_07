<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('') }}">
    <title>LyLy FashionShop</title>
    <meta charset="utf-8">
    <meta name="description" content="Thời trang nữ, Thời trang nam, Đồ đôi, Gia đình, Thời trang cho bé, Giày dép, Túi xách, Phụ kiện, Thời trang, Mỹ phẩm">
    <meta name="keywords" content="Thời trang nữ, Thời trang nam, Đồ đôi, Thời trang cho bé, Giày dép, Túi xách">
    <meta name="viewport" content="width=devive-width, initial-scale=1">
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/style.css') !!}
</head>
<body>
    <div class="header_container">
        <div class="header-top hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-7">
                        <div class="welcome-msg">{{ Lang::get('index.header.welcome') }}</div>
                    </div>
                    <div class="social-sharing pull-right">
                        <a href="{!! route('user.change-language', ['en']) !!}">English / </a>
                        <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container header_main hidden-sm hidden-xs">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-4 ">
                    <div class="logo">
                        <a href="" class="Lyly FashionShop"><img src="assets/img/LogoBao.png" alt=""></a>
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
                    <div class="beta-comp  drop_cart" id="dropdown" >
                        <div class="cart">
                            <div class="beta-select ">
                                <i class="fa fa-shopping-cart">{{ Lang::get('index.homepage.mycart') }}</i>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="beta-dropdown cart-body dropdownl_item dropdown-menu" id="menu">
                                <div class="cart-item">
                                    <a  href="#" class="cart-item-delete">
                                        <i class="fa fa-times">x</i>
                                    </a>
                                    <a href="#" class="cart-item-plus">
                                        <i class="fa fa-plus">-</i>
                                    </a>
                                    <a href="#" class="cart-item-minimize">
                                        <i class="fa fa-window-minimize">+</i>
                                    </a>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img src="" />
                                        </a>
                                        <div class="media-body">
                                            <span class="cart-item-title">
                                                supperman
                                            </span>
                                            <span class="cart-item-options">
                                                Số lượng:2
                                            </span>
                                            <span class="cart-item-amount">
                                                Thành tiền:
                                                <span class="cart-value">
                                                 $66,99
                                             </span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền:
                                    <span class="cart-total-value">
                                        $66,99
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="#" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div> 
                        </div> <!-- .cart -->
                    </div>
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
                            <li class="level0 level-top parent"> <a class="level-top" href="lienhe"> <span>{{ Lang::get('index.homepage.contact') }}</span> </a> </li>
                            <li class="level0 parent ">
                                <a href="chinhsach"><span>{{ Lang::get('index.homepage.introduce') }}</span></a>
                            </li>
                            <span id="cart-menu-li"> 
                                <a href="#" id="cart-menu-a">
                                    <span class="cart-value cart-in-menu">
                                        <i class="fa fa-shopping-cart"></i>
                                        (1)
                                    </span>
                                </a>
                            </span>
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
</div>
