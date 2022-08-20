@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
            <a href="{{ route('kelass.create') }}" class="btn btn-primary">
                <i class="fas fa-save"></i>&nbsp;Save
            </a>
            <button type="button" class="btn btn-success">
                <i class="fas fa-print"></i>&nbsp;Print
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <x:notify-messages />
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>no_telp</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->nis }}</td>
                        <td>{{$row->nisn}}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->no_telp }}</td>
                        <td><img src="{{ asset('siswa/'.$row->path) }}" width="120px" alt="" class="img-thumbnail"></td>
                        <td>
                            <div class="btn-group">

                                <form action="{{ route('siswass.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{ route('siswass.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>no_telp</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection