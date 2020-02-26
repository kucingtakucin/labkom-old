@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Surat Bebas Labkom')
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

@section('DataMahasiswa')
    <a href="{{ route('Mahasiswa.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Mahasiswa</p>
    </a>
@endsection

@section('DataDosen')
    <a href="{{ route('Dosen.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Dosen</p>
    </a>
@endsection

@section('DataMataKuliah')
    <a href="{{ route('MataKuliah.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Mata Kuliah</p>
    </a>
@endsection

@section('ContentHeader')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Surat Bebas Labkom</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('SuratBebasLabkom.index') }}">Surat Bebas Labkom</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/SuratBebasLabkom/{{ $Surat->id }}" method="post">
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
                                <input type="text" name="nama" id="Nama" class="form-control" placeholder="Masukkan nama" maxlength="50" required="" value="{{ $Surat->nama_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="NIM">NIM :</label>
                                <input type="text" name="nim" id="NIM" class="form-control" placeholder="Masukkan NIM" maxlength="12" required="" value="{{ $Surat->nim_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="JenisKelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" id="JenisKelamin" class="custom-select" required="" disabled>
                                    <option selected>{{ $Surat->jenis_kelamin_mahasiswa }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ProgramStudi">Program Studi :</label>
                                <select name="program_studi" id="ProgramStudi" class="custom-select" required="" disabled>
                                    <option selected>{{ $Surat->nama_prodi }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Angkatan">Angkatan :</label>
                                <select name="angkatan" id="Angkatan" class="custom-select" required="" disabled>
                                    <option selected>{{ $Surat->tahun_angkatan }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" class="form-control" disabled placeholder="Masukkan hari" maxlength="7" required="" value="{{ $Surat->hari }}">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" disabled placeholder="Masukkan tanggal" maxlength="25" required="" value="{{ $Surat->tanggal }}">
                            </div>
                            <div class="form-group">
                                <label for="Keperluan">Keperluan :</label>
                                <textarea class="form-control" name="keperluan" disabled id="Keperluan" cols="30" rows="4" placeholder="Masukkan keperluan" required>{{ $Surat->keperluan }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card-tools">
                            <a href="{{ route('SuratBebasLabkom.index') }}" class="btn btn-secondary btn-lg">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </section>
@endsection
