@extends('layouts.pages')


@section('title')
    新加入的用户@parent
@stop

@section('content')

    <div class="user-list mt-20 mb-20">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header">
                            <h2>最近加入的用户</h2>
                        </div>

                        <div class="box-content">

                            @foreach($users as $user)

                                <div class="col-md-1 col-sm-2 col-xs-3">
                                    <div class="avatar">
                                        <a href="{{ route('user.show', $user->id) }}">
                                            <img src="{{ $user->present()->getAvatar() }}" alt="{{ $user->name }}" />
                                        </a>
                                    </div>
                                </div>

                            @endforeach

                            <div class="clearfix"></div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop
