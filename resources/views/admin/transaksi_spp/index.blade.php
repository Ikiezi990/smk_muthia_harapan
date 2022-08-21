@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header bg-secondary">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
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
                    <th>ID Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->id }}</td>
                        @if (( date('Y') - $row->angkatan->nama_angkatan) == 0)
                        <td>{{"X-".$row->nama_kelas }}-{{ $row->angkatan->nama_angkatan }}</td>
                        @elseif (($hasil = date('Y') - $row->angkatan->nama_angkatan) == 1)
                        <td>{{"XI-".$row->nama_kelas }}-{{ $row->angkatan->nama_angkatan }}</td>
                        @elseif ((date('Y') - $row->angkatan->nama_angkatan) == 2)
                        <td>{{"XII-".$row->nama_kelas }}-{{ $row->angkatan->nama_angkatan }}</td>
                        @else
                        <td>{{"Alumni-".$row->nama_kelas }}-{{ $row->angkatan->nama_angkatan }}</td>

                        @endif
                        <td>{{ $row->jurusan->judul_jurusan }}</td>
                        <td>{{ $row->angkatan->nama_angkatan }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('transakisspp.show', $row->id) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
