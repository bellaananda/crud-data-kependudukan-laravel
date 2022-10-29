@extends('layouts.app')

@section('title', 'Detail Data Penduduk')

@section('library')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('sidebar-content')
    <li class="nav-item">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Data</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="/penduduk/{{$warga->id}}/edit" class="btn btn-link float-right"><i class="fa fa-edit text-teal"></i></a>
                            <a href="/" class="btn btn-link"><i class="fa fa-chevron-left text-white"></i></a>
                        </div>
                    </div>
                    <form action="/penduduk/{{$warga->id}}" method="post" id="inputForm">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK" disabled value="{{$warga->nik}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama" disabled value="{{$warga->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="birthplace">Tempat Lahir</label>
                                    <input type="text" id="birthplace" name="birthplace" class="form-control" placeholder="Tempat Lahir" disabled value="{{$warga->birthplace}}">
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control bg-light" placeholder="Tanggal Lahir" disabled value="{{$warga->birthdate}}">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-control custom-select" disabled>
                                        <option selected disabled>Pilih Satu</option>
                                        @switch($warga->gender)
                                            @case(0)
                                                <option value="0" selected>Laki-laki</option>
                                                <option value="1">Perempuan</option>
                                                @break
                                            @case(1)
                                                <option value="0">Laki-laki</option>
                                                <option value="1" selected>Perempuan</option>
                                            @default
                                                <option value="0">Laki-laki</option>
                                                <option value="1">Perempuan</option>
                                                @break
                                        @endswitch
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bloodtype">Golongan Darah</label>
                                    <select id="bloodtype" name="bloodtype" class="form-control custom-select" disabled>
                                        <option selected disabled>Pilih Satu</option>
                                        @switch($warga->bloodtype)
                                            @case(0)
                                                <option value="0" selected>A</option>
                                                <option value="1">B</option>
                                                <option value="2">AB</option>
                                                <option value="3">O</option>
                                                @break
                                            @case(1)
                                                <option value="0">A</option>
                                                <option value="1" selected>B</option>
                                                <option value="2">AB</option>
                                                <option value="3">O</option>
                                                @break
                                            @case(2)
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2" selected>AB</option>
                                                <option value="3">O</option>
                                                @break
                                            @case(3)
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">AB</option>
                                                <option value="3" selected>O</option>
                                                @break
                                            @default
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">AB</option>
                                                <option value="3">O</option>
                                                @break
                                        @endswitch
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marital_status">Status Perkawinan</label>
                                    <select id="marital_status" name="marital_status" class="form-control custom-select" disabled>
                                        <option selected disabled>Pilih Satu</option>
                                        @switch($warga->marital_status)
                                            @case(0)
                                                <option value="0" selected>Kawin</option>
                                                <option value="1">Belum Kawin</option>
                                                <option value="2">Cerai</option>
                                                @break
                                            @case(1)
                                                <option value="0">Kawin</option>
                                                <option value="1" selected>Belum Kawin</option>
                                                <option value="2">Cerai</option>
                                                @break
                                            @case(2)
                                                <option value="0">Kawin</option>
                                                <option value="1">Belum Kawin</option>
                                                <option value="2" selected>Cerai</option>
                                                @break
                                            @default
                                                <option value="0">Kawin</option>
                                                <option value="1">Belum Kawin</option>
                                                <option value="2">Cerai</option>
                                                @break
                                        @endswitch
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="citizenship">Kewarganegaraan</label>
                                    <select id="citizenship" name="citizenship" class="form-control custom-select" disabled>
                                        <option selected disabled>Pilih Satu</option>
                                        @switch($warga->citizenship)
                                            @case(0)
                                                <option value="0" selected>WNI</option>
                                                <option value="1">WNA</option>
                                                @break
                                            @case(1)
                                                <option value="0">WNI</option>
                                                <option value="1" selected>WNA</option>
                                                @break
                                            @default
                                                <option value="0">WNI</option>
                                                <option value="1">WNA</option>
                                                @break
                                        @endswitch
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="profession">Pekerjaan</label>
                                    <input type="text" id="profession" name="profession" class="form-control" placeholder="Pekerjaan" disabled value="{{$warga->profession}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea id="address" name="address" class="form-control" rows="4" placeholder="Alamat" disabled>{{$warga->address}}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('javascript')
    <!-- jquery-validation -->
    <script type="text/javascript" src="{{asset('./plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('./plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <!-- AdminLTE App -->
@endsection