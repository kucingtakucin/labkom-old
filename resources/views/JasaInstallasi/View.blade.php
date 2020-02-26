@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Jasa Installasi')
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
                    <h1 class="m-0 text-dark">Jasa Installasi</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('JasaInstallasi.index') }}">Jasa Installasi</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/JasaInstallasi/{{ $JasaInstallasi->id }}" method="post">
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
                                <input type="text" name="nama" id="Nama" class="form-control" placeholder="Masukkan nama" maxlength="50" required="" value="{{ $JasaInstallasi->nama_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="NIM">NIM :</label>
                                <input type="text" name="nim" id="NIM" class="form-control" placeholder="Masukkan NIM" maxlength="12" required="" value="{{ $JasaInstallasi->nim_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="JenisKelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" id="JenisKelamin" class="custom-select" required="" disabled>
                                    <option selected>{{ $JasaInstallasi->jenis_kelamin_mahasiswa }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ProgramStudi">Program Studi :</label>
                                <select name="id_program_studi" id="ProgramStudi" class="custom-select" required="" disabled>
                                    <option selected value="{{ $JasaInstallasi->id_prodi }}">{{ $JasaInstallasi->nama_prodi }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Angkatan">Angkatan :</label>
                                <select name="id_angkatan" id="Angkatan" class="custom-select" required="" disabled>
                                    <option selected value="{{ $JasaInstallasi->id_angkatan }}">{{ $JasaInstallasi->tahun_angkatan }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="NoHP">No HP :</label>
                                <input type="tel" name="no_hp" id="NoHP" class="form-control" disabled required placeholder="Masukkan no HP" value="{{ $JasaInstallasi->no_hp }}">
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" class="form-control" disabled placeholder="Masukkan hari" maxlength="7" required="" value="{{ $JasaInstallasi->hari }}">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" disabled placeholder="Masukkan tanggal" maxlength="25" required="" value="{{ $JasaInstallasi->tanggal }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Service</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Laptop">Laptop :</label>
                                <input type="text" id="Laptop" name="laptop" class="form-control" disabled required placeholder="Masukkan merk laptop" value="{{ $JasaInstallasi->laptop }}">
                            </div>
                            <div class="form-group">
                                <label for="Spesifikasi">Spesifikasi :</label>
                                <textarea name="spesifikasi" id="Spesifikasi" cols="10" rows="4" disabled placeholder="Masukkan spesifikasi laptop" class="form-control">{{ $JasaInstallasi->spesifikasi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Kelengkapan">Kelengkapan :</label>
                                <input type="text" id="Kelengkapan" name="kelengkapan" disabled class="form-control" required placeholder="Masukkan kelengkapan" value="{{ $JasaInstallasi->kelengkapan }}">
                            </div>
                            <div class="form-group">
                                <label for="Software">Software :</label>
                                <select name="id_software" id="Software" class="custom-select" disabled required="">
                                    <option value="{{ $JasaInstallasi->id_software }}">{{ $JasaInstallasi->nama_software }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InstallUlang">Install Ulang :</label>
                                <select name="install_ulang" id="InstallUlang" class="custom-select" disabled required="">
                                    <option>{{ $JasaInstallasi->install_ulang }}</option>
                                    <option>-</option>
                                    <option>Windows</option>
                                    <option>Linux</option>
                                    <option>Mac</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Harga">Harga :</label>
                                <input type="text" name="harga" id="Harga" class="form-control" min="0" disabled required="" value="Rp.{{ $JasaInstallasi->harga_software }}">
                            </div>
                            <div class="form-group">
                                <label for="LainLain">Lain-lain :</label>
                                <textarea name="lainlain" cols="40" rows="4" id="LainLain" class="form-control" disabled required>{{ $JasaInstallasi->lainlain }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card-tools">
                            <a href="{{ route('JasaInstallasi.index') }}" class="btn btn-secondary btn-lg">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </section>
@endsection
