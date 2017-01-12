@extends('layouts.pages')

@section('content')

    <div class="user-apps mt-20 mb-20">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="box create-box bg-white p-20">

                        <div class="box-header">
                            <h2>发布小程序</h2>
                        </div>

                        <div class="box-content">

                            <form class="form" role="form" method="post" action="{{ route('apps.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">名称</label>
                                    <input name="title" type="text" class="form-control" placeholder="请输入应用名称">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">小程序二维码
                                        <small>建议尺寸：不小于 400×400px，并且必须为正方形</small>
                                    </label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('qrcode', 'false') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="control-label">小程序二ICON
                                        <small>建议尺寸：不小于 400×400px，并且必须为正方形</small>
                                    </label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('icon', 'false') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label">小程序 UR L<small>（选填）</small></label>
                                    <input name="url" type="text" class="form-control" placeholder="请输入应用名称">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">介绍</label>
                                    <textarea name="description" class="form-control" rows="3">请输入应用介绍</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">标签<small>（最多可选择五个）</small></label>

                                    @include('widgets.tags_selector')

                                </div>

                                <div class="form-group">
                                    <label class="control-label">截图 <small>建议尺寸：720x1280px</small></label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('screenshots') !!}
                                    </div>

                                </div>


                                <div class="form-group mt-20">
                                    <button type="submit" class="btn btn-success">保存并提交</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
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

    <script src="{{ cdn('/js/jquery.uploadifive.min.js') }}"></script>
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            var ids = [
                'qrcode',
                'icon',
                'screenshots'
            ];

            $(document).on("click", ".image-item .delete-image-btn", function () {
                $(this).parents(".image-item").remove()
            })

            $.each(ids, function (index, el) {
                var upBase = {
                    'auto'              : true,
                    'removeCompleted'   : true,
                    'buttonText'        : '<i class="fa fa-plus" aria-hidden="true"></i>',
                    'checkScript'       : '{{ route('upload.check') }}',
                    'formData'          : {
                        'timestamp'     : '<?php echo $timestamp;?>',
                        '_token'        : '{{ csrf_token() }}',
                        'type'          : el
                    },
                    'queueID'           : el + '-queue',
                    'uploadScript'      : '{{ route('upload') }}',
                    'onUploadComplete'  : function(file, data) {
                        data = $.parseJSON(data)

                        var node = document.createElement('div')
                        node.setAttribute('class', 'image-item')


                        var html = ''
                        html += '<img src="' + data.fullpath + '" />'

                        switch (data.type) {
                            case 'icon':
                                // no break;
                            case 'qrcode':
                                html += '<input type="hidden" name="' + data.type + '" value="' + data.filename + '" />'
                                node.innerHTML = html
                                $("." + data.type + "-upload-wrapper").find(".upload-image").html('').append(node)
                                break;

                            case 'screenshots':
                                html += '<input type="hidden" name="' + data.type + '[]" value="' + data.filename + '" />'
                                html += '<i class="fa fa-times-circle delete-image-btn" aria-hidden="true"></i>'
                                node.innerHTML = html
                                $("." + data.type + "-upload-wrapper").find(".upload-image").append(node)
                                break;
                        }
                    }
                }

                $('#' + el + '-upload').uploadifive(upBase);
            })
        });
    </script>

@stop
