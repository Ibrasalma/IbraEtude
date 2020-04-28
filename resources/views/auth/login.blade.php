@extends('layouts.default',['title'=>'Login'])

<link rel="stylesheet" href="{{ asset('/css/login.css') }}">

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <legend class="text-center">
                    <img src="{{ asset('/images/logo.png') }}" alt="" style="width: auto;"> 
                </legend>
                    
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="{{route('login') }}" method="post" role="form" style="display: block;">
                                    @csrf
                                    <div class="form-group {{ $errors->has('login') ? 'has-error' : '' }}">
                                        <lable for="login" class="label-control">{{ __('E-Mail or Nom user') }}</label>
                                        <input name="login" id="login" type="text" tabindex="1" class="form-control" placeholder="tapez votre email ou nom d'utilisateur" value="{{ old('login') }}" required="required" autocomplete="email" autofocus>
                                        {!! $errors->first('login','<span class = "error">:message</span>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password" class="label-control">{{ __('Password') }}</label>
                                        <input id="password" type="password" name="password" tabindex="2" class="form-control" placeholder="Password" required="required" autocomplete="current-password">
                                        {!! $errors->first('password','<span class = "error">:message</span>') !!}
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" class="form-control btn btn-login">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center col-sm-6 col-md-6 col-xs-12">
                                                    @if (Route::has('password.request'))
                                                        <a tabindex="5" class="btn btn-link" href="{{ route('password.request') }}" class="forgot-password col-sm-6 col-md-6 col-xs-12">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="text-center">
                                                    @if (Route::has('register'))
                                                        <a tabindex="5" class="btn btn-link" href="{{ route('register') }}" class="forgot-password col-sm-6 col-md-6 col-xs-12">
                                                            {{ __('Register new account?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

