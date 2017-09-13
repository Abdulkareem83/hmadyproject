@extends('layouts.homeLayout')

@section('content')
	<!-- Section: Course list -->
	<section class="courses-page">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-9 blog-pull-right">
	        @if (count($courses))
         		@foreach ($courses as $course)
			        <div class="row mb-15">
			          <div class="col-sm-6 col-md-4">
			            <div class="thumb">
			            	<img alt="featured project" src="{{ $course->picture }}" class="img-fullwidth">
			            </div>
			          </div>
			          <div class="col-sm-6 col-md-8">
			            <h4 class="line-bottom mt-0 mt-sm-20">{{ $course->name }}</h4>
			            <ul class="review_text list-inline">
			              <li><h4 class="mt-0"><span class="text-theme-color-2">Price :</span> $125</h4></li>
			              <li>
			                <div class="star-rating" title="Rated 4.50 out of 5"><span style="width: 90%;">4.50</span></div>
			              </li>
			            </ul>
			            <p>
			            	{{ str_limit($course->description, 300) }}
			            </p>
			            <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="page-courses-accounting-technologies.html">view details</a>
			          </div>
			        </div>
			        <hr>
			    @endforeach
			@else
				{{ trans('lang.no_courses_yet') }}
			@endif
	      </div>
	      <div class="col-md-3">
	        <div class="sidebar sidebar-left mt-sm-30">
	          <div class="widget">
	            <h5 class="widget-title line-bottom"> بحث  <span class="text-theme-color-2">الدورات</span></h5>
	            <div class="search-form">
	              <form>
	                <div class="input-group">
	                  <input type="text" placeholder="Click to Search" class="form-control search-input">
	                  <span class="input-group-btn">
	                  <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
	                  </span>
	                </div>
	              </form>
	            </div>
	          </div>
	          <div class="widget">
	            <h5 class="widget-title line-bottom">تصنيفات <span class="text-theme-color-2">الدورات</span></h5>
	            <div class="categories">
	              <ul class="list list-border angle-double-right">
	                <li class="{{ Request::input('category') == null ? 'active' : '' }}"><a href="{{ url('courses') }}">الكل <span>({{ count(\App\Models\Course::all()) }})</span></a></li>
	              	@foreach (\App\Models\Category::all() as $category)
		                <li class="{{ Request::input('category') == $category->id ? 'active' : '' }}">
		                	<a href="{{ url('courses?category=' . $category->id ) }}">{{ $category->name }} <span>({{ $category->courses()->count() }})</span></a>
		                </li>
	              	@endforeach
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-sm-12">
	        <nav class="theme-colored">
	        	{{ $courses->render() }}
	        </nav>
	      </div>
	    </div>
	  </div>
	</section>
@stop