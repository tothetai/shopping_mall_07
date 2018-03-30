@extends('frontend.index')
@section('content')
    <content>
        <div class="ctcs">
            <div class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="inner">
                            <ul>
                                <li class="home"><a itemprop="url" title="Quay lại trang chủ" href="/"><span itemprop="title">Trang chủ</span></a></li>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <li><span itemprop="title" class="brn">Giới thiệu</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <header>
                        <h2>Giới thiệu</h2>
                    </header>
                    <div class="rte">
                        <h2>Niềm đam mê của chúng tôi mang đến những điều tinh tế nhất vào trong từng sản phẩm của mình.</h2>
                    </div>
                </div>
            </div>
        </div>
    </content>
@endsection