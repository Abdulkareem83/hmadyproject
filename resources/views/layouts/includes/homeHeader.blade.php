<!-- Header -->
<header id="header" class="header">
  <div class="header-top bg-theme-color-2 sm-text-center p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="widget no-border m-0">
            <ul class="list-inline font-13 sm-text-center mt-5">
              @if (Auth::user())
                @if (Gate::allows('use-dashboard'))
                  <li>
                    <a class="text-white" href="{{ route('dashboard') }}">{{ trans('lang.dashboard') }}</a>
                  </li>
                  <li class="text-white">|</li>
                  <li>
                @endif
                <a class="text-white" href="{{ route('profile') }}">{{ trans('lang.profilePage') }}</a>
              </li>
              <li class="text-white">|</li>
              <li>
                <a class="text-white" href="{{ route('logout') }}">{{ trans('lang.logout') }}</a>
              </li>
              @else
              <li>
                <a class="text-white" href="{{ route('register') }}">{{ trans('lang.register') }}</a>
              </li>
              <li class="text-white">|</li>
              <li>
                <a class="text-white" href="{{ route('login') }}">{{ trans('lang.login') }}</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
            <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
              <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-middle p-0 bg-lightest xs-text-center">
    <div class="container pt-0 pb-0">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5">
          <div class="widget no-border m-0">
            <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="javascript:void(0)"><img src="images/logo-wide.png" alt=""></a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
            <ul class="list-inline">
              <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>
              <li>
                <a href="#" class="font-12 text-gray text-uppercase">Call us today!</a>
                <h5 class="font-14 m-0"> +(012) 345 6789</h5>
              </li>
            </ul>
          </div>
        </div>  
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
            <ul class="list-inline">
              <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
              <li>
                <a href="#" class="font-12 text-gray text-uppercase">We are open!</a>
                <h5 class="font-13 text-black m-0"> Mon-Fri 8:00-16:00</h5>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
      <div class="container">
        <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
          <ul class="menuzord-menu">
            <li class="active"><a href="#home">{{ trans('lang.home') }}</a>
            </li>
            <li><a href="#">{{ trans('lang.courses') }} </a>
            </li>
            <li><a href="#">{{ trans('lang.blogs') }}</a>
            </li>
            <li><a href="#">{{ trans('lang.faq') }}</a>
            </li>
            <li><a href="#home">{{ trans('lang.termOfServices') }}</a>
            </li>
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">{{ trans('lang.login') }}</a>
            </li>
            @endif
          </ul>
          <ul class="pull-right flip hidden-sm hidden-xs">
            <li>
              <!-- Modal: Book Now Starts -->
              <a class="btn btn-colored btn-flat bg-theme-color-2 text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  href="{{ route('register') }}">
                {{ trans('lang.registerNow') }}
              </a>
              <!-- Modal: Book Now End -->
            </li>
          </ul>
          <div id="top-search-bar" class="collapse">
            <div class="container">
              <form role="search" action="#" class="search_form_top" method="get">
                <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                <span class="search-close"><i class="fa fa-search"></i></span>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>