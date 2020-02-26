@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Peminjaman Lab di Dalam Jam Kuliah')
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
            <a href="{{ route('DiDalam.index') }}" class="nav-link active">
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
                    <h1 class="m-0 text-dark">Peminjaman Lab di Dalam Jam Kuliah</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('PeminjamanLab') }}">Peminjaman Lab</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('DiDalam.index') }}">di Dalam Jam Kuliah</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/PeminjamanLab/DiDalam/{{ $PeminjamanLab->id }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
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
                                <input type="text" name="nama_mahasiswa" id="Nama" class="form-control" placeholder="Masukkan nama" maxlength="100" required="" value="{{ $PeminjamanLab->nama_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="NIM">NIM :</label>
                                <input type="text" name="nim_mahasiswa" id="NIM" class="form-control" placeholder="Masukkan NIM" maxlength="10" required="" value="{{ $PeminjamanLab->nim_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin_mahasiswa" id="jenis_kelamin" class="custom-select" required disabled>
                                    <option selected>{{ $PeminjamanLab->jenis_kelamin_mahasiswa }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ProgramStudi">Program Studi :</label>
                                <select name="program_studi" id="ProgramStudi" class="custom-select" disabled>
                                    <option selected>{{ $PeminjamanLab->nama_prodi }}</option>on>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Angkatan">Angkatan :</label>
                                <select name="tahun_angkatan" id="Angkatan" class="custom-select" disabled>
                                    <option selected>{{ $PeminjamanLab->tahun_angkatan }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" class="form-control" disabled placeholder="Masukkan hari" maxlength="10" required value="{{ $PeminjamanLab->hari }}">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" disabled placeholder="Masukkan tanggal" maxlength="25" required value="{{ $PeminjamanLab->tanggal }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Ruang</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Lab">Lab :</label>
                                <select name="id_lab" id="Lab" class="custom-select" disabled>
                                    <option selected>{{ $PeminjamanLab->nama_lab }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="JamPinjam">Jam Pinjam :</label>
                                <input type="text" name="jam_pinjam" id="JamPinjam" disabled class="form-control" maxlength="50" required="" placeholder="Masukkan jam pinjam" value="{{ $PeminjamanLab->jam_pinjam }}">
                            </div>
                            <div class="form-group">
                                <label for="JamKembali">Jam Kembali :</label>
                                <input type="text" name="jam_kembali" id="JamKembali" disabled class="form-control" maxlength="50" required="" placeholder="Masukkan jam kembali" value="{{ $PeminjamanLab->jam_kembali }}">
                            </div>
                            <div class="form-group">
                                <label for="Dosen">Dosen :</label>
                                <input type="text" name="nama_dosen" id="Dosen" disabled class="form-control" maxlength="100" required="" placeholder="Masukkan nama dosen pengampu" value="{{ $PeminjamanLab->nama_dosen }}">
                            </div>
                            <div class="form-group">
                                <label for="MataKuliah">Mata Kuliah :</label>
                                <input type="text" name="nama_mata_kuliah" id="MataKuliah" disabled class="form-control" maxlength="50" required placeholder="Masukkan mata kuliah" value="{{ $PeminjamanLab->nama_mata_kuliah }}">
                            </div>
                            <div class="form-group">
                                <label for="Keperluan">Keperluan :</label>
                                <textarea name="keperluan" cols="40" rows="4" id="Keperluan" disabled class="form-control" placeholder="Masukkan keperluan" required="">{{ $PeminjamanLab->keperluan }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card-tools" >
                            <a href="{{ route('DiDalam.index')  }}" class="btn btn-secondary btn-lg">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
