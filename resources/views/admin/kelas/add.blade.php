@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
            <a href="{{ route('kelass.index') }}" class="btn btn-danger">
                <i class="fa fa-arrow-left"></i>&nbsp;Kembali
            </a>
        </div>

    </div>
    <div class="card-body">
        <form action="{{ route('kelass.store') }}" method="post" enctype="multipart/form-data">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    @csrf
                                    @method('POST')
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
                                        <label for="nama_kelas">Nama kelas</label>
                                        <input type="text" id="nama_kelas" name="nama_kelas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">jurusan</label>
                                        <select name="id_jurusan" id="" class="form-control">
                                            @foreach($jurusan as $jurusanRow)
                                            <option value="{{$jurusanRow->id}}">{{$jurusanRow->judul_jurusan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="guru">guru</label>
                                        <select name="id_guru" id="" class="form-control">
                                            @foreach($guru as $guruRow)
                                            <option value="{{$guruRow->id}}">{{$guruRow->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="angkatan">angkatan</label>
                                        <select name="id_angkatan" id="" class="form-control">
                                            @foreach($angkatan as $angkatanRow)
                                            <option value="{{$angkatanRow->id}}">{{$angkatanRow->nama_angkatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">

                            <button type="submit" value="" class="btn btn-success float-right">Tambah
                                Kelas</button>
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
