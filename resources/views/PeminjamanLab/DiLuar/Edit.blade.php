@extends('../base')
@section('Title', 'Labkom FMIPA UNS | Peminjaman Lab di Luar Jam Kuliah')
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
            <a href="{{ route('DiLuar.index') }}" class="nav-link active">
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
                    <h1 class="m-0 text-dark">Peminjaman Lab di Luar Jam Kuliah</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('PeminjamanLab') }}">Peminjaman Lab</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('DiLuar.index') }}">di Luar Jam Kuliah</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">
        <form action="/PeminjamanLab/DiLuar/{{ $PeminjamanLab->id }}" method="post">
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
                                    <option selected value="{{ $PeminjamanLab->id_mahasiswa }}">{{ $PeminjamanLab->nama_mahasiswa }}</option>
                                    @foreach($Peminjam as $elemen)
                                        <option value="{{ $elemen->id_mahasiswa }}">{{ $elemen->nama_mahasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Hari">Hari :</label>
                                <input type="text" name="hari" id="Hari" class="form-control" placeholder="Masukkan hari" maxlength="10" required value="{{ $PeminjamanLab->hari }}">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal :</label>
                                <input type="text" name="tanggal" id="Tanggal" class="form-control" placeholder="Masukkan tanggal" maxlength="25" required value="{{ $PeminjamanLab->tanggal }}">
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
                                <select name="id_lab" id="Lab" class="custom-select" required="">
                                    <option selected value="{{ $PeminjamanLab->id_lab }}">{{ $PeminjamanLab->nama_lab }}</option>
                                    @foreach($Lab as $elemen)
                                        <option value="{{ $elemen->id_lab }}">{{ $elemen->nama_lab }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="JamPinjam">Jam Pinjam :</label>
                                <input type="text" name="jam_pinjam" id="JamPinjam" class="form-control" maxlength="50" required="" placeholder="Masukkan jam pinjam" value="{{ $PeminjamanLab->jam_pinjam }}">
                            </div>
                            <div class="form-group">
                                <label for="JamKembali">Jam Kembali :</label>
                                <input type="text" name="jam_kembali" id="JamKembali" class="form-control" maxlength="50" required="" placeholder="Masukkan jam kembali" value="{{ $PeminjamanLab->jam_kembali }}">
                            </div>
                            <div class="form-group">
                                <label for="Dosen">Dosen :</label>
                                <select name="id_dosen" id="Dosen" class="custom-select" required="" >
                                    <option selected value="{{ $PeminjamanLab->id_dosen }}">{{ $PeminjamanLab->nama_dosen }}</option>
                                    @foreach($Dosen as $elemen)
                                        <option value="{{ $elemen->id_dosen }}">{{ $elemen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="MataKuliah">Mata Kuliah :</label>
                                <select name="id_mata_kuliah" id="MataKuliah" class="custom-select" required="" >
                                    <option selected value="{{ $PeminjamanLab->id_mata_kuliah }}">{{ $PeminjamanLab->nama_mata_kuliah }}</option>
                                    @foreach($MataKuliah as $elemen)
                                        <option value="{{ $elemen->id_mata_kuliah }}">{{ $elemen->nama_mata_kuliah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Keperluan">Keperluan :</label>
                                <textarea name="keperluan" cols="40" rows="4" id="Keperluan" class="form-control" placeholder="Masukkan keperluan" required="">{{ $PeminjamanLab->keperluan }}</textarea>
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
                            <a href="{{ route('DiLuar.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
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
