@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加新的MineCraft ID
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    @include('common.success')

                    <form action="/myid" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="mcid" class="col-sm-3 control-label">MineCraft ID</label>

                            <div class="col-sm-6">
                                <input type="text" name="mcid" id="mcid" class="form-control"
                                       value="{{ old('mc_id') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="genuine" class="col-md-3 control-label">
                                是否正版
                            </label>
                            <div class="col-md-7">
                                <label class="radio-inline">
                                    <input type="radio" name="genuine" id="genuine"
                                           @if (! old('genuine'))
                                           checked="checked"
                                           @endif
                                           value="0">
                                    盗版
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="genuine"
                                           @if (old('genuine'))
                                           checked="checked"
                                           @endif
                                           value="1">
                                    正版
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>添加ID
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($mcids) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        所有 MineCraft ID
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped mcid-table">
                            <thead>
                            <th>MineCraft ID</th>
                            <th>皮肤</th>
                            <th>披风</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($mcids as $mcid)
                                <tr>
                                    <td class="table-text">
                                        <div>
                                            <img src="/skin/{{ $mcid->mcid }}/head"/>&nbsp;{{ $mcid->mcid."(".($mcid->genuine ? "正版" : "盗版").")"  }}
                                        </div>
                                    </td>

                                    <td class="table-text">
                                        <div>
                                            @if ($mcid->skin != null)
                                                已上传
                                            @else
                                                未上传
                                            @endif

                                            @if($mcid->skin != null || $mcid->genuine)
                                                <button type="button" class="btn btn-xs btn-success"
                                                        onclick="preview_image('/skin/{{ $mcid->mcid }}/preview')">
                                                    <i class="fa fa-eye fa-lg"></i>
                                                    预览
                                                </button>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="table-text">
                                        <div>
                                            @if ($mcid->cape != null)
                                                已上传
                                            @else
                                                未上传
                                            @endif
                                            {{--@if($mcid->skin != null || $mcid->genuine)--}}
                                                {{--<button type="button" class="btn btn-xs btn-success"--}}
                                                {{--onclick="preview_image('/skin/{{ $mcid->mcid }}/preview')">--}}
                                                {{--<i class="fa fa-eye fa-lg"></i>--}}
                                                {{--预览--}}
                                                {{--</button>--}}
                                                {{--@endif--}}
                                        </div>
                                    </td>

                                    <td>
                                        <a href="/myid/{{ $mcid->id }}/edit" class="btn btn-xs btn-info">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('myid.preview')
    <script>

        // 预览图片
        function preview_image(path) {
            $("#preview-image").attr("src", path);
            $("#modal-image-view").modal("show");
        }

    </script>
@endsection