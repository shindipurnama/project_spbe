@extends('layout.index')
@section('title', 'Hasil Penilaian Mandiri')

@section('content')
<style>
    .card-body {
        padding: 1rem 1rem;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Examples -->
    <div class="card mb-4">
        <h5 class="card-header">Data Hasil Penilaian Mandiri</h5>
        <table id="table-penilaian-mandiri" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No Tes</th>
                    <th>Nama Tes</th>
                    <th>Waktu</th>
                    <th>Jumlah Indikator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian as $key => $p)
                <tr>
                    <td>{{$p->penilaian_id}}</td>
                    <td>{{$p->penilaian_name}}</td>
                    <td>{{$p->jadwal->start_date->format('d F Y')}} - {{$p->jadwal->end_date->format('d F Y')}}</td>
                    <td>{{$p->jumlah_indikator ?? '-'}}</td>
                    <td>
                        @can('admin')
                        <a href="{{ route('detail-hasil-penilaian-mandiri.show',$p->penilaian_id) }}">
                            <button type="button" title="Detail" class="btn btn-success">
                                Detail
                            </button>
                        </a>
                        @endcan
                        @can('skpd')
                            <a href="{{ route('hasil-penilaian-mandiri.show',$p->penilaian_id) }}">
                                <button type="button" title="Detail" class="btn btn-success">
                                    Detail
                                </button>
                            </a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="card mb-4">
        <h5 class="card-header">Data Hasil Penilaian Mandiri</h5>
        <table id="table-penilaian-mandiri-skpd" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No Tes</th>
                    <th>Nama Tes</th>
                    <th>Waktu</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PM012022</td>
                    <td>Evaluasi SPBE 2022</td>
                    <td>30 Oktober 2022 - 3 November 2022</td>
                    <td>Evaluasi SPBE 2022</td>
                    <td>
                        <a href="{{ route('detail-hasil-penilaian-mandiri.index') }}">
                            <button type="button" title="Detail" class="btn btn-success">
                                Detail
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}
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
    });

    function getData() {
        $('#table-penilaian-mandiri').DataTable();
        $('#table-penilaian-mandiri-skpd').DataTable();
        $('#table-jadwal').DataTable();

        $(".dataTables_wrapper").css("padding-left", "20px")
        $(".dataTables_wrapper").css("padding-right", "20px")
        $(".dataTables_empty").css("text-align", "center")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-top", "15px")
    }

    function getYear() {
        for (i = new Date().getFullYear(); i > 2015; i--) {
            console.log(i)
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
