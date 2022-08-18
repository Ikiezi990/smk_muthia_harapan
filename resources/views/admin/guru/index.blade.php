{{-- {{ dd($data); }} --}}

@extends('layouts.appAdmin')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data {{ $title }}</h3>

            <div class="card-tools">
                <a href="{{ route('gurus.create') }}" class="btn btn-primary">
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
                        <th>ID Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Total Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $row) : ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->mapel->id }}</td>
                        <td>{{ $row->mapel->nama_mapel }}</td>
                        <td>{{ $row->total_guru }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('gurus.show', $row->mapel->id) }}" class="btn btn-info"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Total Guru</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
