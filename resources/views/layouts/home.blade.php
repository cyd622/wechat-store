@extends('layouts.pages')


@section('content')

    <div class="home user-page mt-20 mb-20">
        <div class="container">
            <div class="row">

                @include('home.partials.user_header')

                <div class="col-md-3">

                    @include('home.partials.sidebar')

                </div>

                <div class="col-md-9">
                    @yield('main-content')
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@stop