<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('') }}">
    <title>LyLy FashionShop</title>
    <meta charset="utf-8">
    <meta name="description" content="Thời trang nữ, Thời trang nam, Đồ đôi, Gia đình, Thời trang cho bé, Giày dép, Túi xách, Phụ kiện, Thời trang, Mỹ phẩm">
    <meta name="keywords" content="Thời trang nữ, Thời trang nam, Đồ đôi, Thời trang cho bé, Giày dép, Túi xách">
    <meta name="viewport" content="width=devive-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- Begin Header -->
    <header>
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
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12  search hidden-xs">
                        <div class="search_vector ">
                            <ul>
                                <h5>Xu hướng tìm kiếm</h5>
                            </ul>
                        </div>
                        <div class="search_form">
                            <form action="seach" class="search-form" role="search" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token() }}";/>
                                <input placeholder="{{ Lang::get('index.homepage.search') }} "  class="search_input"
                                type="text" name="timkiem" >
                                <input type="submit" value="{{ Lang::get('index.homepage.search') }} " class="btnsearch">
                            </form>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-3 col-sm-4 hidden-xs account-cart">
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-6 account">
                            <div>
                                <img  class="mg_bt_10" src="assets/img/account.png" alt="" height="31", width="31">
                            </div>
                            <div>
                                <span>
                                    <a  class="cl_old" href="dangky">{{ Lang::get('index.homepage.register') }} / </a>
                                    <a  class="cl_old" href="dangnhap">{{ Lang::get('index.homepage.login') }}</a>
                                </span>
                            </div>
                        </div>
                        <div class="top-cart-contain">
                            <a href="giohang.html">
                                <div>
                                    <img  class="mg_bt_10" src="assets/img/cart.png" alt="" height="31", width="31" alt="cart">
                                </div>
                                <div class="cart-box">
                                    <span class="title cl_old">{{ Lang::get('index.homepage.mycart') }}</span>
                                    <span id="cart-total" class="count_item_pr cartCount">0</span>
                                </div>
                            </a>
                        </div>
                    </div>
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
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-10">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="level0 level-top parent"> <a class="level-top" href="/"> <span class="home">{{ Lang::get('index.homepage.home') }}</span> </a> </li>
                                        <li class="level0 level-top parent"> <a class="level-top" href="/gioi-thieu"> <span>{{ Lang::get('index.homepage.product') }}</span> </a> </li>
                                        <li class="level0 level-top parent"><a class="level-top" href="/collections/all"> <span>{{ Lang::get('index.homepage.contact') }}</span> </a>
                                        </li>
                                        <li class="level0 level-top parent vien"> <a class="level-top" href="/lien-he"> <span>{{ Lang::get('index.homepage.introduct') }}</span> </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-2 hidden-lg hidden-md ">
                                <div class="top-cart-contain"> 
                                    <a href="/cart">
                                        <div>
                                            <img src="assets/img/cart.png" width="32" alt="cart">
                                        </div>
                                        <div class="cart-box">
                                            <span id="cart-total">11</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <nav class=" hidden-xs " role="navigation">
        <div class="border-ftw  ">
            <div class="container">
                <div class="row nav_menu collapse navbar-collapse navbar-ex1-collapse">
                    <div class="nav-inner">
                        <ul id="nav" class=" nav navbar-nav">
                            <li class="level0 parent active">
                                <a href="trangchu"><span>{{ Lang::get('index.index.home') }}</span></a>
                            </li>
                            <li class="level0 parent ">
                                <a href="sanpham"><span>{{ Lang::get('index.homepage.product') }}</span></a>
                            </li>
                            <li class="level0 level-top parent"> <a class="level-top" href="lienhe"> <span>{{ Lang::get('index.homepage.contact') }}</span> </a> </li>
                            <li class="level0 parent ">
                                <a href="chinhsach"><span>{{ Lang::get('index.homepage.introduct') }}</span></a>
                            </li>
                        </ul>
                        <div class="nav_hotline pull-right hidden-xs hidden-sm">
                            <img src="assets/img/call_white.png" alt="" width="30"> Hotline : 0971 885 136
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav> 
    