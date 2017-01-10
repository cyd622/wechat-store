@extends('layouts.pages')

@section('content')

    <div class="user-apps mt-20 mb-20">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="box create-box bg-white p-20">

                        <div class="box-header">
                            <h2>提交小程序</h2>
                        </div>

                        <div class="box-content">

                            <form class="form" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">名称</label>
                                    <input type="text" class="form-control" placeholder="请输入产品名称">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">小程序二维码</label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('qrcode-upload', 'false') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="control-label">小程序二ICON</label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('icon-upload', 'false') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label">小程序 URL（选填）</label>
                                    <input type="text" class="form-control" placeholder="请输入产品名称">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">介绍</label>

                                    <input type="text" class="form-control" placeholder="请输入产品名称">

                                </div>

                                <div class="form-group">
                                    <label class="control-label">标签</label>
                                    <input type="text" class="form-control" placeholder="请输入产品名称">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">截图</label>

                                    <div class="upload-box">
                                        {!! gen_uploadfiy('screenshots-upload') !!}
                                    </div>

                                </div>


                                <div class="form-group mt-20">
                                    <button type="submit" class="btn btn-success">保存并提交</button>
                                    <button type="submit" class="btn btn-default">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop


@section('scripts')

    <script src="{{ cdn('/js/jquery.uploadifive.min.js') }}"></script>
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            var ids = [
                'qrcode',
                'icon',
                'screenshots'
            ];

            $.each(ids, function (index, el) {
                var upBase = {
                    'auto'              : true,
                    'buttonText'        : '<i class="fa fa-plus" aria-hidden="true"></i>',
                    'checkScript'       : '{{ route('upload.check') }}',
                    'formData'          : {
                        'timestamp'     : '<?php echo $timestamp;?>',
                        '_token'         : '{{ csrf_token() }}',
                        'type'          : el
                    },
                    'queueID'           : 'queue',
                    'uploadScript'      : '{{ route('upload') }}',
                    'onUploadComplete'  : function(file, data) { console.log(data); }
                }

                $('#' + el + '-upload').uploadifive(upBase);
            })
        });
    </script>

@stop
