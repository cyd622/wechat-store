@extends('layouts.home')


@section('main-content')

    <div class="main-content">
        <div class="box bg-white">
            <div class="box-header">
                <h2>最新发布的小程序</h2>
            </div>

            <div class="box-content">
                {!! gen_nodata(false) !!}
            </div>
        </div>

        <div class="box bg-white mt-15">
            <div class="box-header">
                <h2>最新发布的文章</h2>
            </div>

            <div class="box-content">
                {!! gen_nodata(false) !!}
            </div>
        </div>
    </div>

@stop