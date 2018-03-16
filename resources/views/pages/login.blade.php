@extends('frontend.index')
@section('content') 
    <div class="all-login-page">
        <div class="link-to-path">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="login-page">
                            {{ Lang::get('index.index.home') }} >> <span> {{ Lang::get('index.homepage.login') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <form id="login" class="login-form" action="login" method="post">
                            {!! csrf_field() !!}
                            <h4><strong>{{ Lang::get('index.homepage.info') }}</strong></h4>
                            @if(session('message'))
                                <div class="alert alert-danger">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <p>{{ Lang::get('index.login.email') }}<span>*</span></p>
                            <input type="email" name="email" class="txt-login" required="required">
                            @if($errors->has('email'))
                            <p style="color:red">{{$errors->first('email')}}</p>
                            @endif
                            <p>{{ Lang::get('index.login.password') }}<span>*</span></p>
                            <input type="password" name="password" class="txt-login" required="required">
                            @if($errors->has('password'))
                            <p style="color:red">{{$errors->first('password')}}</p>
                            @endif
                            <button type="submit" class="btn-btn-default btn">{{ Lang::get('index.login.submit') }}</button> 
                        </form>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <form id="register" class="login-form">
                            <h4><strong>{{ Lang::get('index.homepage.noAcount') }}</strong></h4>
                            <p>{{ Lang::get('index.homepage.content') }}</p>
                            <a href="register" class="register">{{ Lang::get('index.homepage.register') }}</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
