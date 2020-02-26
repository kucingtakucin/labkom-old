@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Peminjaman Studio')
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
                    <h1 class="m-0 text-dark">Peminjaman Studio</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('PeminjamanStudio.index') }}">Peminjaman Studio</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="{{ route('PeminjamanStudio.store') }}" method="post">
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
                                <select name="id_mahasiswa" id="Nama" class="custom-select" required>
                                    <option></option>
                                    @foreach($Peminjam as $elemen)
                                        <option value="{{ $elemen->id_mahasiswa }}">{{ $elemen->nama_mahasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" class="form-control" placeholder="Masukkan hari" maxlength="7" required="">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" placeholder="Masukkan tanggal" maxlength="25" required="">
                            </div>
                            <div class="form-group">
                                <label for="Waktu">Waktu :</label>
                                <input type="text" name="waktu" id="Waktu" class="form-control" placeholder="Masukkan waktu" maxlength="30" required="">
                            </div>
                            <div class="form-group">
                                <label for="Dosen">Dosen :</label>
                                <select name="id_dosen" id="Dosen" class="custom-select" required="" >
                                    <option></option>
                                    @foreach($Dosen as $elemen)
                                        <option value="{{ $elemen->id_dosen }}">{{ $elemen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Keperluan">Keperluan :</label>
                                <textarea class="form-control" name="keperluan" id="Keperluan" cols="30" rows="4" placeholder="Masukkan keperluan" required></textarea>
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
                            <a href="{{ route('PeminjamanStudio.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            <button type="submit" class="btn btn-warning btn-lg float-right">
                                <a>
                                    <i class="fas fa-plus"></i>
                                    Add
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </section>
@endsection
