{{-- 上传文件 --}}
<div class="modal fade" id="modal-skin-upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/skin/{{ $mcid->id }}" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">上传新皮肤</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">
                            皮肤文件
                        </label>
                        <div class="col-sm-8">
                            <input type="file" id="skin_file" name="file">
                        </div>
                    </div>
                    <div>
                        图片大小: ≤ 100kb, 尺寸: ≤ 64x64
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        上传皮肤
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>