@extends('layout.index')
@section('title', 'Indikator')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data SPBE /</span> Indikator</h4>
        </div>
        <div class="col-6 py-2" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertIndikator">
                Tambah Data
            </button>
        </div>
    </div>
    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Indikator</h5>    
        <table id="table-indikator" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Indikator</th>
                    <th>Nama Indikator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>A001</td>
                    <td>Tingkat Kematangan Kebijakan Internal Arsitektur SPBE intansi Pusat Atau Pemerinta Daerah</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateIndikator">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIndikator">
                            <i class='bx bxs-trash'></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal -->
<div class="modal fade" id="insertIndikator" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeIndikator" class="form-label">Kode Indikator</label>
                        <input type="text" id="codeIndikator" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameIndikator" class="form-label">Nama Indikator</label>
                        <textarea type="text" id="nameIndikator" class="form-control" placeholder="Masukkan nama indikator"></textarea>
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
<div class="modal fade" id="updateIndikator" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeIndikator" class="form-label">Kode Indikator</label>
                        <input type="text" id="codeIndikator" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameIndikator" class="form-label">Nama Indikator</label>
                        <textarea type="text" id="nameIndikator" class="form-control" placeholder="Masukkan nama indikator"></textarea>
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
<div class="modal fade" id="deleteIndikator" tabindex="-1" aria-modal="true" role="dialog">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    $(document).ready(function () {
        $("#menuDataSPBE").addClass("active")
        $("#menuDataSPBE").addClass("open")
        $("#subMenuIndikator").addClass("active")
        getData()
    });
    
    function getData() {
        $('#table-indikator').DataTable();

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