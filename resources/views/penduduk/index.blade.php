@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('sidebar-content')
    <li class="nav-item">
        <a href="" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
@endsection

@section('content')
    <!-- TABLE: LATEST ORDERS -->
    <div class="card card-outline card-info">
        <div class="card-header border-transparent">
            <div class="card-tools">
                <a href="/penduduk/create" type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive table-hover" id="tablePenduduk">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th colspan="3" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduk as $warga)
                            <tr>
                                <td>{{ $warga->nik }}</td>
                                <td>{{ $warga->name }}</td>
                                @switch($warga->gender)
                                    @case(0)
                                        <td>Laki-laki</td>
                                        @break
                                    @case(1)
                                        <td>Perempuan</td>
                                        @break
                                    @default
                                        <td>-</td>
                                        @break
                                @endswitch
                                @switch($warga->bloodtype)
                                    @case(0)
                                        <td>A</td>
                                        @break
                                    @case(1)
                                        <td>B</td>
                                        @break
                                    @case(2)
                                        <td>AB</td>
                                        @break
                                    @case(3)
                                        <td>O</td>
                                        @break
                                    @default
                                        <td>-</td>
                                        @break
                                @endswitch
                                @switch($warga->marital_status)
                                    @case(0)
                                        <td>Kawin</td>
                                        @break
                                    @case(1)
                                        <td>Belum Kawin</td>
                                        @break
                                    @case(2)
                                        <td>Cerai</td>
                                        @break
                                    @default
                                        <td>-</td>
                                        @break
                                @endswitch
                                <td>{{ $warga->profession }}</td>
                                <td>{{ $warga->birthplace }}</td>
                                <td>{{ date('j F Y', strtotime($warga->birthdate)) }}</td>
                                <td>
                                    <a href="/penduduk/{{$warga->id}}" class="btn btn-link"><i class="fa fa-list text-light"></i></a>
                                </td>
                                <td>
                                    <a href="/penduduk/{{$warga->id}}/edit" class="btn btn-link"><i class="fa fa-edit text-teal"></i></a>
                                </td>
                                <td>
                                    <form class="d-inline-block" method="POST" action="/penduduk/{{$warga->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger" type="submit" onClick="javascript: return confirm('Anda yakin untuk menghapus data ini?');"><i class="fa fa-trash text-orange"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
@endsection
