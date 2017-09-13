@extends('layouts.homeLayout')

@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-push-3">
            <h4 class="text-gray mt-0 pt-5"> {{ trans('lang.login') }}</h4>
            <hr>
            <form name="login-form" method="post" class="clearfix" action="{{ route('login') }}">
              <div class="row">
                <div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                  <label for="form_username_email">{{ trans('lang.usernameOrEmail') }}</label>
                    {{ csrf_field() }}
                  <input id="form_username_email" name="email" value="{{ old('email') }}" class="form-control" type="text" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block">
                        {{ $errors->first('email') }}
                      </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12 {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label for="form_password">{{ trans('lang.password') }}</label>
                  <input id="form_password" name="password" class="form-control" type="password">
                  @if ($errors->has('password'))
                      <span class="help-block">
                        {{ $errors->first('password') }}
                      </span>
                  @endif
                </div>
              </div>
              <div class="checkbox pull-left mt-15">
                <label for="form_checkbox">
                  <input id="form_checkbox" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                  {{ trans('lang.remmberMe') }} </label>
              </div>
              <div class="form-group pull-right mt-10">
                <button type="submit" class="btn btn-dark btn-sm">{{ trans('lang.login') }}</button>
              </div>
              <div class="clear text-center pt-10">
                <a class="text-theme-colored font-weight-600 font-12" href="{{ route('register') }}">{{ trans('lang.registerNewAccount') }}</a>
              </div>
              <div class="clear text-center pt-10">
                <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">{{ trans('lang.loginWithFb') }}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection