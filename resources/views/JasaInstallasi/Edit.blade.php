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
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/JasaInstallasi/{{ $JasaInstallasi->id }}" method="post">
            @method('put')
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
                                <select name="id_mahasiswa" id="Nama" class="custom-select" required>
                                    <option selected value="{{ $JasaInstallasi->id_mahasiswa }}">{{ $JasaInstallasi->nama_mahasiswa }}</option>
                                @foreach($Mahasiswa as $elemen)
                                    <option value="{{ $elemen->id_mahasiswa }}">{{ $elemen->nama_mahasiswa }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="NoHP">No HP :</label>
                                <input type="tel" name="no_hp" id="NoHP" class="form-control" required placeholder="Masukkan no HP" value="{{ $JasaInstallasi->no_hp }}">
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <select name="hari" id="Hari" class="custom-select" required="">
                                    <option>{{ $JasaInstallasi->hari }}</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jum'at</option>
                                    <option>Sabtu</option>
                                    <option>Minggu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" placeholder="Masukkan tanggal" maxlength="25" required="" value="{{ $JasaInstallasi->tanggal }}">
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
                                <input type="text" id="Laptop" name="laptop" class="form-control" required placeholder="Masukkan merk laptop" value="{{ $JasaInstallasi->laptop }}">
                            </div>
                            <div class="form-group">
                                <label for="Spesifikasi">Spesifikasi :</label>
                                <textarea name="spesifikasi" id="Spesifikasi" cols="10" rows="4" placeholder="Masukkan spesifikasi laptop" class="form-control">{{ $JasaInstallasi->spesifikasi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Kelengkapan">Kelengkapan :</label>
                                <input type="text" id="Kelengkapan" name="kelengkapan" class="form-control" required placeholder="Masukkan kelengkapan" value="{{ $JasaInstallasi->kelengkapan }}">
                            </div>
                            <div class="form-group">
                                <label for="Software">Software :</label>
                                <select name="id_software" id="Software" class="custom-select" required="">
                                    <option value="{{ $JasaInstallasi->id_software }}">{{ $JasaInstallasi->nama_software }}</option>
                                @foreach($Software as $elemen)
                                    <option value="{{ $elemen->id_software }}">{{ $elemen->nama_software }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InstallUlang">Install Ulang :</label>
                                <select name="install_ulang" id="InstallUlang" class="custom-select" required="">
                                    <option>{{ $JasaInstallasi->install_ulang }}</option>
                                    <option>-</option>
                                    <option>Windows</option>
                                    <option>Linux</option>
                                    <option>Mac</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="LainLain">Lain-lain :</label>
                                <textarea name="lainlain" cols="40" rows="4" id="LainLain" class="form-control" required>{{ $JasaInstallasi->lainlain }}</textarea>
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
                            <a href="{{ route('JasaInstallasi.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            <button type="submit" class="btn btn-info btn-lg float-right">
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
