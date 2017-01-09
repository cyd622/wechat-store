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
                                <div class="form-group">
                                    <label class="control-label">名称</label>

                                    <input type="text" class="form-control" placeholder="请输入产品名称">

                                </div>

                                <div class="form-group">
                                    <label class="control-label">小程序二维码</label>

                                    <input type="password" class="form-control" id="inputPassword3"
                                           placeholder="Password">

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="control-label">ICON</label>

                                    <input type="password" class="form-control" id="inputPassword3"
                                           placeholder="Password">

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

                                    <input type="text" class="form-control" placeholder="请输入产品名称">

                                </div>


                                <div class="form-group">

                                    <button type="submit" class="btn btn-danger">保存并提交</button>
                                    <button type="submit" class="btn btn-default">取消</button>

                                </div>
                            </form>

                            {!! gen_uploadfiy(1) !!}
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
            $('#file_upload').uploadifive({
                'auto'             : false,
                'checkScript'      : 'check-exists.php',
                'formData'         : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'queueID'          : 'queue',
                'uploadScript'     : 'uploadifive.php',
                'onUploadComplete' : function(file, data) { console.log(data); }
            });
        });
    </script>

@stop
