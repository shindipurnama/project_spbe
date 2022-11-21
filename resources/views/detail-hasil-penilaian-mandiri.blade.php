@extends('layout.index')
@section('title', 'Detail Hasil Penilaian Mandiri')

@section('content')
<style>
    .card-body {
        padding: 1rem 1rem;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    @can('admin')
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <a href="{{ route('report.edit', $id) }}" target="_blank">
                <button type="button" class="btn btn-secondary">
                    Cetak Laporan
                </button>
            </a>
        </div>
    </div>

    <!-- Examples -->
    <div class="card mb-4">
        <h5 class="card-header">Data Hasil Penilaian Mandiri</h5>
        <div class="mb-3" style="display: flex; padding-left: 1.5rem;">
            <label class="col-sm-2" for="basic-default-name">Nomor Form</label>
            <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian_id ?? ''}}</label>
        </div>
        <div class="mb-3" style="display: flex; padding-left: 1.5rem;">
            <label class="col-sm-2" for="basic-default-name">Nama Form</label>
            <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian->penilaian_name ?? ''}}</label>
        </div>
        <div class="mb-3" style="display: flex; padding-left: 1.5rem;">
            <label class="col-sm-2" for="basic-default-name">Jadwal</label>
            <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian->jadwal->start_date->format('d F Y') ?? ''}}</label>
        </div>
        <table id="table-penilaian-mandiri" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Capaian</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian as $key =>$p)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$p->user->name ?? ''}}</td>
                    <td>{{$p->nilai}} / {{$p->jumlah}}</td>
                    <td>{{Round(($p->nilai / $p->jumlah) * 100)}}</td>
                    <td>
                        <a href="{{ route('report.show', $p->spbe_id) }}" target="_blank">
                            <button type="button" title="Hapus Data" class="btn btn-danger" data-code="{{$p->spbe_id}}">
                                Download
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan

    @can('skpd')
    <div class="card">
        <h5 class="card-header">Detail Hasil Penilaian Mandiri</h5>
        <div class="card-body">
            <div class="mb-3" style="display: flex; padding-left: 10px; padding-right: 10px;">
                <label class="col-sm-2" for="basic-default-name">Nomor Form</label>
                <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian_id ?? ''}}</label>
            </div>
            <div class="mb-3" style="display: flex; padding-left: 10px; padding-right: 10px;">
                <label class="col-sm-2" for="basic-default-name">Nama Form</label>
                <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian->penilaian_name ?? ''}}</label>
            </div>
            <div class="mb-3" style="display: flex; padding-left: 10px; padding-right: 10px;">
                <label class="col-sm-2" for="basic-default-name">Tahun</label>
                <label class="col-sm-5" for="basic-default-name">: {{$head->penilaian->jadwal->start_date->format('d F Y') ?? ''}}</label>
            </div>
            <table id="table-penilaian-mandiri-skpd" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Indikator</th>
                        <th>Capaian</th>
                        <th>Hasil</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penilaian as $key =>$p)
                    <tr>
                        <td>{{$p->spbe->spbe}}</td>
                        <td>{{$p->nilai}} / {{$p->jumlah}}</td>
                        <td>{{round(($p->nilai / $p->jumlah) * 100)}}</td>
                        <!-- <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalSoal">
                                    Kerjakan
                                </button>
                            </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endcan
    <!-- Examples -->

</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    var index = 1
    var arrayKriteria = []

    $(document).ready(function() {
        $("#menuHasilPenilaianMandiri").addClass("active")
        getData()
        getYear()

        $(document).on("click", "#btnDownload", function() {
            var code = $(this).data("code")

        });
    });

    function getData() {
        $('.table').DataTable();

        $(".dataTables_wrapper").css("padding-left", "10px")
        $(".dataTables_wrapper").css("padding-right", "10px")
        $(".dataTables_empty").css("text-align", "center")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-top", "15px")
    }

    function getYear() {
        for (i = new Date().getFullYear(); i > 2015; i--) {
            $('.year').append(`<option value="${i}">${i}</option>`);
        }
    }

    $("#btnAddKriteria").click(function() {
        var value = $("#valKriteria").val()
        if (value != "") {
            arrayKriteria.push({
                no: index++,
                kriteria: value
            })


            $("#valKriteria").val("")
        } else {
            alert("Masukkan kriteria dahulu")
        }

        $("#listKriteria").empty("")
        for (var i = 0; i < arrayKriteria.length; i++) {
            $("#listKriteria").append(`
                <div class="card mb-3" style="width: 100%;" id="card-kriteria-${arrayKriteria[i].no}">
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <p class="card-text">
                                    ${arrayKriteria[i].no}, ${arrayKriteria[i].kriteria}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card-body">
                                <button type="button" class="btn btn-sm btn-icon btn-primary" onclick="btnRemove(${arrayKriteria[i].no})">
                                    <span class="tf-icons bx bx-trash-alt"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `)
        }
    })

    function btnRemove(index) {
        for (var i = 0; i < arrayKriteria.length; i++) {
            if (arrayKriteria[i].no == index) {
                $("#card-kriteria-" + arrayKriteria[i].no).remove()
                arrayKriteria.splice(i, 1)
            }
        }
    }
</script>
@endsection