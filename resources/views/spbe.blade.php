@extends('layout.index')
@section('title', 'Indikator SPBE')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Examples -->
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-domain" aria-controls="navs-domain" aria-selected="true">
                    <i class="tf-icons bx bx-home"></i> Domain
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-aspek" aria-controls="navs-aspek" aria-selected="false">
                    <i class="tf-icons bx bx-user"></i> Aspek
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-indikator" aria-controls="navs-indikator" aria-selected="false">
                    <i class="tf-icons bx bx-message-square"></i> Indikator
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Domain -->
            <div class="tab-pane fade active show" id="navs-domain" role="tabpanel">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-muted py-2">Data SPBE Domain</h4>
                    </div>
                    <div class="col-6 py-2" style="text-align: end;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertDomain">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table id="table-aspek" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Domain</th>
                            <th>Nama Domain</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A001</td>
                            <td>Kebijakan Internal Terkait Tata Kelola SPBE</td>
                            <td>
                                <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateDomain">
                                    <i class='bx bxs-edit'></i>
                                </button>
                                <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDomain">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Aspek -->
            <div class="tab-pane fade" id="navs-aspek" role="tabpanel">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-muted py-2">Data SPBE Aspek</h4>
                    </div>
                    <div class="col-6 py-2" style="text-align: end;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertAspek">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table id="table-aspek" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Aspek</th>
                            <th>Nama Aspek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A001</td>
                            <td>Kebijakan Internal Terkait Tata Kelola SPBE</td>
                            <td>
                                <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateAspek">
                                    <i class='bx bxs-edit'></i>
                                </button>
                                <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAspek">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Indikator -->
            <div class="tab-pane fade" id="navs-indikator" role="tabpanel">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-muted py-2">Data SPBE Indikator</h4>
                    </div>
                    <div class="col-6 py-2" style="text-align: end;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertIndikator">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table id="table-indikator" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Indikator</th>
                            <th>Nama Indikator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A001</td>
                            <td>Tingkat Kematangan Kebijakan Internal Arsitektur SPBE intansi Pusat Atau Pemerinta Daerah</td>
                            <td>
                                <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateIndikator">
                                    <i class='bx bxs-edit'></i>
                                </button>
                                <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIndikator">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Examples -->
</div>

<!-- Modal -->
@include('modal')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    $(document).ready(function() {
        $("#menuDataSPBE").addClass("active")
        getData()
    });

    function getData() {
        $('.table').DataTable();

        // $(".dataTables_wrapper").css("padding-left", "10px")
        // $(".dataTables_wrapper").css("padding-right", "10px")
        $(".dataTables_empty").css("text-align", "center")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-top", "15px")
    }
</script>
@endsection