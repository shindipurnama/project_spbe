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
    <div class="toast-body">Data tidak boleh kosong</div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">

    @can('admin')
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
                @foreach ($penilaian as $key =>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->penilaian_name}}</td>
                        <td>{{$p->jadwal->start_date->format('d F y')}} - {{$p->jadwal->end_date->format('d F y')}}</td>
                        <td>{{$p->jumlah_indikator ?? '-'}}</td>
                        <td>
                            <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updatePenilaianMandiri{{$p->id}}">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deletePenilaianMandiri{{$p->id}}">
                                <i class='bx bxs-trash'></i>
                            </button>
                            <a href="{{ route('penilaian-mandiri-detail.show', $p->id) }}">
                                <button type="button" class="btn btn-icon btn-success">
                                    <i class='bx bx-info-circle'></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
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

    @include('modal-penilaian')
    @endcan

    @can('skpd')
    <div class="card">
        <h5 class="card-header">Jadwal Tes</h5>
        <table id="table-soal" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Penilaian</th>
                    <th>Nama Tes</th>
                    <th>Waktu Tes</th>
                    <th>Jumlah Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian as $key =>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->jadwal->start_date->format('Y')}}</td>
                        <td>{{$p->penilaian_name}}</td>
                        <td>{{$p->jadwal->start_date->format('d F y')}} - {{$p->jadwal->end_date->format('d F y')}}</td>
                        <td>{{$p->jumlah_indikator ?? ''}}</td>
                        <td>
                            <a href="{{ route('penilaian-mandiri-detail.show',$p->id) }}">
                                <button type="button" class="btn btn-danger">
                                    Lihat Soal
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan
    <!-- Examples -->

</div>


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
