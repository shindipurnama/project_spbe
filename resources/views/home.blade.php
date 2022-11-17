@extends('layout.index')
@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h1 class="card-title text-primary">Hallo! 👋</h1>
                            <p class="mb-4">Selamat datang di website Pemantauan Penyelenggaraan Sistem Pemerintahan Berbasis Elektronik (SPBE) Kabupaten Kaloka</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div><br>

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
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRole">
                                    Lihat Soal
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endcan
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#menuDashboard").addClass("active")
        getData()
    });

    function getData() {
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
