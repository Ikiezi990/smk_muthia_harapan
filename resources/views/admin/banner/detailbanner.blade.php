@extends('layouts.appAdmin')

@section('content')
    <!-- Default box -->
    <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>

                <div class="card-tools">
                    <a href="{{ route('banners.index') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                @csrf
                                @method('POST')
                                <h3 class="card-title">Detail {{ $title }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <h4>{{ $data->judul_banner }}</h4>
                                    </a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-primary">
                                        <h6>Path : Banner/{{ $data->path }}</h6>
                                    </a>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Preview Image</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <img id="previewImg" src="{{ asset('banner/' . $data->path) }}" alt="Placeholder"
                                    class="img-thumbnail">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">

                </div>
            </div>

        </div>
    </form>

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
