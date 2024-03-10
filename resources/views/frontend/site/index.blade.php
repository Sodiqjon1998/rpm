@extends('frontend.layouts.main')

@section('content')
    <!-- Main Slider -->
    @include('frontend.site.partials._slider')
    <!-- Main Slider -->
    <div class="content-block">

        <!-- Our Services -->
        @include('frontend.site.partials._services')
        <!-- Our Services END -->

        <!-- Popular Courses -->
        @include('frontend.site.partials._courses')
        <!-- Popular Courses END -->

        <!-- Form -->
        @include('frontend.site.partials._form')
        <!-- Form END -->
        
        @include('frontend.site.partials._events')

        <!-- Testimonials -->
        @include('frontend.site.partials._testimonials')
        <!-- Testimonials END -->

        <!-- Recent News -->
        @include('frontend.site.partials._news')
        <!-- Recent News End -->

    </div>
    <!-- contact area END -->
@endsection
