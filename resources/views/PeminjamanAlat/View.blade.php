@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Peminjaman Alat')
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
                    <h1 class="m-0 text-dark">Peminjaman Alat</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('PeminjamanAlat.index') }}">Peminjaman Alat</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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

@section('MainContent')
    <section class="content">
        <form action="/PeminjamanAlat/{{ $PeminjamanAlat->id }}" method="post">
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
                                <input type="text" name="nama" id="Nama" class="form-control" placeholder="Masukkan nama" maxlength="100" required="" value="{{ $PeminjamanAlat->nama_mahasiswa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" disabled class="form-control" placeholder="Masukkan hari" maxlength="10" required value="{{ $PeminjamanAlat->hari }}">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" disabled class="form-control" placeholder="Masukkan Tanggal" maxlength="25" required="" value="{{ $PeminjamanAlat->tanggal }}">
                            </div>
                            <div class="form-group">
                                <label for="Waktu">Waktu :</label>
                                <input type="text" name="waktu" id="Waktu" disabled class="form-control" placeholder="Masukkan Waktu" maxlength="30" required="" value="{{ $PeminjamanAlat->waktu }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Barang</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Alat">Alat :</label>
                                <select name="alat" id="Alat" class="custom-select" disabled required="">
                                    <option selected>{{ $PeminjamanAlat->nama_alat }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Jumlah">Jumlah :</label>
                                <input type="text" name="jumlah" id="Jumlah" disabled class="form-control" min="0" required="" value="{{ $PeminjamanAlat->jumlah }}">
                            </div>
                            <div class="form-group">
                                <label for="LamaPeminjaman">Lama Peminjaman :</label>
                                <select name="lama_peminjaman" id="LamaPeminjaman" disabled class="custom-select" required="">
                                    <option selected>{{ $PeminjamanAlat->lama_peminjaman }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Harga">Harga :</label>
                                <input type="text" name="harga" id="Harga" disabled class="form-control" min="0" required="" value="Rp.{{ $PeminjamanAlat->harga_sewa }}">
                            </div>
                            <div class="form-group">
                                <label for="Keperluan">Keperluan :</label>
                                <textarea name="keperluan" cols="40" rows="4" disabled id="Keperluan" class="form-control" placeholder="Masukkan keperluan" required="">{{ $PeminjamanAlat->keperluan }}</textarea>
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
                            <a href="{{ route('PeminjamanAlat.index') }}" class="btn btn-secondary btn-lg">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </section>
@endsection
