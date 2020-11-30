@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">File Upload</h6>
    </div>
    <div class="card-body">
        <form id="uploadForm" action="{{ route('uploadLead') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="file">Select excel file to upload</label>
                        <input type="file" name="file" id="file" class="form-control-file" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" id="submit-btn" class="btn btn-sms btn-success">Upload</button>
        </form>
    </div>
</div>
@endsection

@section('after-js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#uploadForm").submit(function(e) {
            $("#submit-btn").prop('disabled', true).text('uploading... Please wait');
        })
    })
</script>
@endsection