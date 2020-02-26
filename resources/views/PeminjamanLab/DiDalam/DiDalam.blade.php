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
                        <li class="breadcrumb-item"><a href="{{ route('PeminjamanLab')}}">Peminjaman Lab</a></li>
                        <li class="breadcrumb-item active">di Dalam Jam Kuliah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('MainContent')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Peminjaman Lab di Dalam Jam Kuliah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <a href="{{ route('DiDalam.create') }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-user-plus"></i>
                            Add
                        </a>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects table-bordered dataTable">
                    <thead>
                    <tr>
                        <th style="width: 1%" class="text-center">
                            No
                        </th>
                        <th style="width: 15%" class="text-center">
                            Hari, Tanggal
                        </th>
                        <th style="width: 15%" class="text-center">
                            Nama
                        </th>
                        <th style="width: 10%" class="text-center">
                            Jurusan
                        </th>
                        <th style="width: 15%" class="text-center">
                            Mata Kuliah
                        </th>
                        <th style="width: 10%" class="text-center">
                            Dosen
                        </th>
                        <th style="width: 10%" class="text-center">
                            Lab
                        </th>
                        <th style="width: 10%" class="text-center">
                            Waktu
                        </th>
                        <th style="width: 10%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($PeminjamanLab as $elemen)
                        <tr>
                            <td class="text-center">
                                {{ $i++ }}
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->hari }}, {{ $elemen->tanggal }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->nama_mahasiswa }}
                                </a>
                                <br>
                                <small>
                                    {{ $elemen->kelas_mahasiswa }} - {{ $elemen->nim_mahasiswa }}
                                </small>
                                <br>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->nama_prodi }}
                                </a>
                                <br>
                                <small>
                                    {{ $elemen->tahun_angkatan }}
                                </small>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->nama_mata_kuliah }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->nama_dosen }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->nama_lab }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $elemen->jam_pinjam }} - {{ $elemen->jam_kembali }}
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/PeminjamanLab/DiDalam/{{ $elemen->id }}">
                                    <i class="fas fa-folder"></i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="/PeminjamanLab/DiDalam/{{ $elemen->id }}/edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="/PeminjamanLab/DiDalam/{{ $elemen->id }}" style="margin: 0; padding: 0;" method="post">
                                    @method('delete')
                                    @csrf
                                    <a style="margin: 0; padding: 4px;" class="btn btn-danger btn-sm" href="/PeminjamanLab/DiDalam/{{ $elemen->id }}">
                                        <i class="fas fa-trash"></i>
                                        <input style="margin: 0; padding: 0;" class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
