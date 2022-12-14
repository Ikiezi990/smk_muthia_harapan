@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
            <a href="{{ route('prestasis.index') }}" class="btn btn-danger">
                <i class="fa fa-arrow-left"></i>&nbsp;Kembali
            </a>
        </div>

    </div>
    <div class="card-body">
        <form action="{{ route('prestasis.update',$data->id) }}" method="post" enctype="multipart/form-data">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="card-title">Form {{ $title }}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="judul_prestasi">Judul prestasi</label>
                                        <input type="text" id="judul_prestasi" name="judul_prestasi" class="form-control" value="{{ $data->judul_prestasi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul_prestasi">Isi prestasi</label>
                                        <textarea id="summernote" height="500" name="isi_prestasi">
                                        {{ $data->isi_prestasi }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="file">File Image</label>
                                        <input type="file" id="file" name="image" id="image" class="form-control" onchange="previewFile(this);">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">

                            <button type="submit" value="" class="btn btn-success float-right">Update
                                prestasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
