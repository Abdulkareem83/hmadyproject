@extends('layouts.homeLayout')

@section('content')
    <div class="register-section pt-50">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-push-3">
              <form name="reg-form" class="register-form" method="post" action="{{ route('register') }}">
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="pe-7s-users"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{ trans('lang.dontHaveAccountRegisterNow') }}</h4>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('lang.name') }}</label>
                    {{ csrf_field() }}
                    <input name="name" class="form-control" type="text" value="{{ old('name') }}" required>
                    @if( $errors->has('name') )
                        <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('educational_level') ? 'has-error' : '' }}">
                    <label>{{ trans('lang.educational_level') }}</label>
                    <input name="educational_level" class="form-control" value="{{ old('educational_level') }}" type="text" required>
                    @if ($errors->has('educational_level'))
                        <span class='help-block'>
                            {{ $errors->first('educational_level') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address">{{ trans('lang.address') }}</label>
                    <input name="address" class="form-control" value="{{ old('address') }}" type="text" required>
                    @if( $errors->has('address') )
                        <span class="help-block">
                            {{ $errors->first('address') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('telephone') ? 'has-error' : '' }}">
                    <label>{{ trans('lang.telephone') }}</label>
                    <input name="telephone" value="{{ old('address') }}" class="form-control" required type="text">
                    @if ($errors->has('telephone'))
                        <span class='help-block'>
                            {{ $errors->first('telephone') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ trans('lang.usernameOrEmail') }} </label>
                    <input id="email" name="email" class="form-control" type="text" required>
                    @if ($errors->has('email'))
                        <span class='help-block'>
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">{{ trans('lang.password') }}</label>
                    <input id="password" name="password" class="form-control" type="password" required>
                    @if ($errors->has('password'))
                        <span class='help-block'>
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label>{{ trans('lang.renterPassword') }}</label>
                    <input id="password_confirmation" name="password_confirmation"  class="form-control" type="password" required>
                    @if ($errors->has('password'))
                        <span class='help-block'>
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">{{ trans('lang.registerNow') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection
