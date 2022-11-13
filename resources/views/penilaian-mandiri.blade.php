@extends('layout.index')
@section('title', 'Penilaian Mandiri')

@section('content')
<style>
    .card-body {
        padding: 1rem 1rem;
    }
</style>

<div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-0 hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">Data tidak bole kosong</div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#insertJadwal">
                Atur Jadwal
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertPenilaianMandiri">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Examples -->
    <div class="card mb-4">
        <h5 class="card-header">Data Penilaian Mandiri</h5>
        <table id="table-penilaian-mandiri" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penilaian</th>
                    <th>Waktu Tes</th>
                    <th>Jumlah Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Penilaian 1</td>
                    <td>1 November 2022 - 15 Novemebr 2022</td>
                    <td>20 Soal</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updatePenilaianMandiri">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deletePenilaianMandiri">
                            <i class='bx bxs-trash'></i>
                        </button>
                        <a href="{{ route('penilaian-mandiri-detail.index') }}">
                            <button type="button" class="btn btn-icon btn-success">
                                <i class='bx bx-info-circle'></i>
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Data Jadwal</h5>
        <table id="table-jadwal" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jadwal</th>
                    <th>Jadwal Tes</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $key => $j)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$j->nama}}</td>
                    <td>{{$j->start_date->format('d F y')}}  -  {{$j->end_date->format('d F y')}}</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateJadwal{{$j->id}}">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteJadwal{{$j->id}}">
                            <i class='bx bxs-trash'></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card">
        <h5 class="card-header">Jadwal Tes</h5>
        <table id="table-soal" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Penilaian</th>
                    <th>Nama Tes</th>
                    <th>Waktu Tes</th>
                    <th>Soal</th>
                    <th>Jumlah Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2022</td>
                    <td>Penilaian Evaluasi Mandiri 2022</td>
                    <td>15 Agustus 2022 - 30 Agustus 2022</td>
                    <td>Penilaian Mandiri</td>
                    <td>47</td>
                    <td>
                        <a href="{{ route('penilaian-mandiri.create') }}">
                            <button type="button" class="btn btn-danger">
                                Lihat Soal
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal Indikator -->
<div class="modal fade" id="insertPenilaianMandiri" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Penilaian</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Jadwal</label>
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="Jadwal 1">Jadwal 1</option>
                            <option value="Jadwal 2">Jadwal 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updatePenilaianMandiri" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Penilaian</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama" value="Indikator 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Jadwal</label>
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="Jadwal 1">Jadwal 1</option>
                            <option value="Jadwal 2">Jadwal 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletePenilaianMandiri" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini ?</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Atur Jadwal -->
<div class="modal fade" id="insertJadwal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Atur Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penjadwalan.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeStart" class="form-label">Nama Jadwal</label>
                            <input type="text" name="nama" id="nameSchedule" class="form-control" placeholder="Masukkan nama jadwal">
                            <input type="hidden" name="penjadwalan_id" id="nameSchedule" value="J001" class="form-control" placeholder="Masukkan nama jadwal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                            <input type="date" name="start_date" id="timeStart" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                            <input type="date" name="end_date" id="timeEnd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($jadwal as $key => $j )
<div class="modal fade" id="updateJadwal{{$j->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penjadwalan.update', $j->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Nama Jadwal</label>
                        <input type="text" id="nameSchedule" name="nama" value="{{$j->nama}}" class="form-control" placeholder="Masukkan nama jadwal">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                        <input type="text" id="timeStart" name="start_date" value="{{$j->start_date}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                        <input type="text" id="timeEnd"  name="end_date" value="{{$j->end_date}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteJadwal{{$j->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penjadwalan.destroy",$j->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="row">
                    <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini ?</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>

    $(document).ready(function() {
        $("#menuPenilaianMandiri").addClass("active")
        getData()
        getYear()
    });

    function getData() {
        $('#table-penilaian-mandiri').DataTable();
        $('#table-jadwal').DataTable();
        $('#table-soal').DataTable();

        $(".dataTables_wrapper").css("padding-left", "20px")
        $(".dataTables_wrapper").css("padding-right", "20px")
        $(".dataTables_empty").css("text-align", "center")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-top", "15px")
    }

</script>
@endsection
