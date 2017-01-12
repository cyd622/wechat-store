@extends('layouts.pages')


@section('styles')
    <link href="{{ cdn('vendor/messenger/css/messenger.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ cdn('vendor/messenger/css/messenger-theme-flat.css') }}" type="text/css" rel="stylesheet" />
@stop


@section('scripts')

    <script src="{{ cdn('vendor/messenger/js/messenger.js') }}"></script>
    <script src="{{ cdn('vendor/messenger/js/messenger-theme-flat.js') }}"></script>
    @include('flash::message')
@stop