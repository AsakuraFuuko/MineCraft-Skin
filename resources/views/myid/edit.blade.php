@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">编辑MineCraft ID</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')
                        @include('common.success')

                        <form class="form-horizontal" role="form" method="POST" action="/myid/{{ $mcid->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $mcid->id }}">

                            <div class="form-group">
                                <label for="tag" class="col-md-3 control-label">Tag</label>
                                <div class="col-md-3">
                                    <p class="form-control-static">{{ $mcid->mcid }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="genuine" class="col-md-3 control-label">
                                    是否正版
                                </label>
                                <div class="col-md-7">
                                    <label class="radio-inline">
                                        <input type="radio" name="genuine" id="genuine"
                                               @if (! $mcid->genuine))
                                               checked="checked"
                                               @endif
                                               value="0">
                                        盗版
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="genuine"
                                               @if ($mcid->genuine)
                                               checked="checked"
                                               @endif
                                               value="1">
                                        正版
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save"></i>
                                        保存修改
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                            data-target="#modal-delete">
                                        <i class="fa fa-times-circle"></i>
                                        删除ID
                                    </button>
                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                            data-target="#modal-skin-upload">
                                        <i class="fa fa-upload"></i> 上传皮肤
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 确认删除 --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">确认删除</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        是否删除此ID?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/myid/{{ $mcid->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> 是
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('myid.skinmodals')
@endsection