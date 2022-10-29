@extends('layouts.app')

@section('title', 'Tambah Data Penduduk')

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
                    <h3 class="card-title">Form Tambah Data</h3>
                </div>
                <div class="card-body">
                    <form action="/penduduk" method="post" id="inputForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK" value="{{old('nik')}}" required>
                                    @error('nik')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama" value="{{old('name')}}" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthplace">Tempat Lahir</label>
                                    <input type="text" id="birthplace" name="birthplace" class="form-control" placeholder="Tempat Lahir" value="{{old('birthplace')}}" required>
                                    @error('birthplace')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control bg-light" placeholder="Tanggal Lahir" required>
                                    @error('birthdate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-control custom-select" required>
                                        <option selected disabled>Pilih Satu</option>
                                        <option value="0">Laki-laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bloodtype">Golongan Darah</label>
                                    <select id="bloodtype" name="bloodtype" class="form-control custom-select" required>
                                        <option selected disabled>Pilih Satu</option>
                                        <option value="0">A</option>
                                        <option value="1">B</option>
                                        <option value="2">AB</option>
                                        <option value="3">O</option>
                                    </select>
                                    @error('bloodtype')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marital_status">Status Perkawinan</label>
                                    <select id="marital_status" name="marital_status" class="form-control custom-select" required>
                                        <option selected disabled>Pilih Satu</option>
                                        <option value="0">Kawin</option>
                                        <option value="1">Belum Kawin</option>
                                        <option value="2">Cerai</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="citizenship">Kewarganegaraan</label>
                                    <select id="citizenship" name="citizenship" class="form-control custom-select" required>
                                        <option selected disabled>Pilih Satu</option>
                                        <option value="0">WNI</option>
                                        <option value="1">WNA</option>
                                    </select>
                                    @error('citizenship')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="profession">Pekerjaan</label>
                                    <input type="text" id="profession" name="profession" class="form-control" placeholder="Pekerjaan" required>
                                    @error('profession')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea id="address" name="address" class="form-control" rows="4" placeholder="Alamat" required></textarea>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="upload_image">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="upload_image" name="upload_image" required>
                                            <label class="custom-file-label" for="upload_image">Pilih foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="/" class="btn btn-secondary">Batal</a>
                                <input type="submit" name="submit" value="Tambahkan" class="btn btn-success float-right">
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
    <script type="text/javascript">
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Data berhasil ditambahkan!");
            //     }
            // });
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z ]+$/i.test(value);
            }, "Masukan hanya berupa huruf dan spasi");
            $('#inputForm').validate({
                rules: {
                    nik: {
                        required: true,
                        digits: true,
                        rangelength: [16, 16]
                    },
                    name: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    birthplace: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    birthdate: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    bloodtype: {
                        required: true
                    },
                    marital_status: {
                        required: true
                    },
                    citizenship: {
                        required: true
                    },
                    profession: {
                        required: true,
                        minlength: 5
                    },
                    address: {
                        required: true,
                        minlength: 5
                    },
                    upload_image: {
                        required: true
                    }
                },
                messages: {
                    nik: {
                        required: "NIK tidak boleh kosong",
                        digits: "NIK hanya berupa digit angka",
                        rangelength: "NIK harus berjumlah 16 digit"
                    },
                    name: {
                        required: "Nama tidak boleh kosong",
                        minlength: "Panjang nama minimal 3 huruf"
                    },
                    birthplace: {
                        required: "Tempat lahir tidak boleh kosong",
                        minlength: "Panjang tempat lahir minimal 3 huruf",
                    },
                    birthdate: {
                        required: "Tanggal lahir wajib dipilih"
                    },
                    gender: {
                        required: "Jenis kelamin wajib dipilih"
                    },
                    bloodtype: {
                        required: "Golongan darah wajib dipilih"
                    },
                    marital_status: {
                        required: "Status perkawinan wajib dipilih"
                    },
                    citizenship: {
                        required: "Kewarganegaraan wajib dipilih"
                    },
                    profession: {
                        required: "Pekerjaan wajib diisi",
                        minlength: "Panjang nama pekerjaan minimal 5 huruf"
                    },
                    address: {
                        required: "Alamat wajib diisi",
                        minlength: "Panjang alamat minimal 5 huruf"
                    },
                    upload_image: {
                        required: "File wajib dipilih"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection