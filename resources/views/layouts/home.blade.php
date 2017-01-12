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


@section('styles')
    <link href="{{ cdn('vendor/messenger/css/messenger.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ cdn('vendor/messenger/css/messenger-theme-flat.css') }}" type="text/css" rel="stylesheet" />
@stop


@section('scripts')
    @parent
    <script src="{{ cdn('vendor/messenger/js/messenger.js') }}"></script>
    <script src="{{ cdn('vendor/messenger/js/messenger-theme-flat.js') }}"></script>
    @include('flash::message')
@stop
