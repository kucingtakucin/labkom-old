@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Data Mahasiswa')
@section('PeminjamanLab')
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Peminjaman Lab
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('DiDalam.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Di Dalam Jam Kuliah</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('DiLuar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Di Luar Jam Kuliah</p>
            </a>
        </li>
    </ul>
@endsection

@section('ContentHeader')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Mahasiswa</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Mahasiswa.index') }}">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/Mahasiswa/{{ $Mahasiswa->id_mahasiswa }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Personal</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Nama">Nama :</label>
                                <input type="text" name="nama_mahasiswa" id="Nama" class="form-control" placeholder="Masukkan nama" maxlength="100" required="" value="{{ $Mahasiswa->nama_mahasiswa }}">
                            </div>
                            <div class="form-group">
                                <label for="NIM">NIM :</label>
                                <input type="text" name="nim_mahasiswa" id="NIM" class="form-control" placeholder="Masukkan NIM" maxlength="10" required="" value="{{ $Mahasiswa->nim_mahasiswa }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin_mahasiswa" id="jenis_kelamin" class="custom-select" required="">
                                    <option selected >{{ $Mahasiswa->jenis_kelamin_mahasiswa }}</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Kelas">Kelas :</label>
                                <input type="text" name="kelas_mahasiswa" id="Kelas" class="form-control" placeholder="Masukkan kelas" maxlength="10" required value="{{ $Mahasiswa->kelas_mahasiswa }}">
                            </div>
                            <div class="form-group">
                                <label for="ProgramStudi">Program Studi :</label>
                                <select name="id_prodi" id="ProgramStudi" class="custom-select" required="">
                                    <option selected value="{{ $Mahasiswa->id_prodi }}">{{ $Mahasiswa->nama_prodi }}</option>
                                    @foreach($Jurusan as $elemen)
                                        <option value="{{ $elemen->id_prodi }}">{{ $elemen->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Angkatan">Angkatan :</label>
                                <select name="id_angkatan_mahasiswa" id="Angkatan" class="custom-select" required="">
                                    <option selected value="{{ $Mahasiswa->id_angkatan }}">{{ $Mahasiswa->tahun_angkatan }}</option>
                                    @foreach($Angkatan as $elemen)
                                        <option value="{{ $elemen->id_angkatan }}">{{ $elemen->tahun_angkatan }}</option>
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
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card-tools" >
                            <a href="{{ route('Mahasiswa.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            <button type="submit" class="btn btn-warning btn-lg float-right">
                                <a>
                                    <i class="fas fa-pen"></i>
                                    Update
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </section>
@endsection
