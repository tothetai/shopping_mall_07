@extends('frontend.index')
@section('content')
<div class="all-register-page">
    <div class="link-to-path">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="login-page">
                        {{ Lang::get('index.index.home') }} >> <span> {{ Lang::get('index.homepage.register') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-info">
        <div class="container">
            <div class="row">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger">
                            <strong>{{ $err }}</strong><br/>
                        </div>
                    @endforeach
                @endif
                <form id="register-form" class="login-form register-form" action="" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4><strong>{{ Lang::get('index.homepage.info') }}</strong></h4>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <p>Họ và tên<span>*</span></p>
                        <input type="text" name="name" class="txt-login txt-name" required="required">
                        <p>{{ Lang::get('index.login.email') }} <span>*</span></p>
                        <input type="email" name="email" class="txt-login" required="required">
                        <p>{{ Lang::get('index.login.password') }} <span>*</span></p>
                        <input type="password" name="pass" class="txt-login txt-name" required="required">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="submit" name="register-submit" class="login-submit" value="ĐĂNG KÍ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection