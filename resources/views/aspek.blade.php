@extends('layout.index')
@section('title', 'Aspek')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data SPBE /</span> Aspek</h4>
        </div>
        <div class="col-6 py-2" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertAspek">
                Tambah Data
            </button>
        </div>
    </div>
    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Aspek</h5>    
        <table id="table-aspek" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Aspek</th>
                    <th>Nama Aspek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>A001</td>
                    <td>Kebijakan Internal Terkait Tata Kelola SPBE</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateAspek">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAspek">
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
<div class="modal fade" id="insertAspek" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Aspek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeAspek" class="form-label">Kode Aspek</label>
                        <input type="text" id="codeAspek" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameAspek" class="form-label">Nama Aspek</label>
                        <input type="text" id="nameAspek" class="form-control" placeholder="Masukkan nama indikator">
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
<div class="modal fade" id="updateAspek" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Aspek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeAspek" class="form-label">Kode Aspek</label>
                        <input type="text" id="codeAspek" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameAspek" class="form-label">Nama Aspek</label>
                        <input type="text" id="nameAspek" class="form-control" placeholder="Masukkan nama indikator">
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
<div class="modal fade" id="deleteAspek" tabindex="-1" aria-modal="true" role="dialog">
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
        $("#subMenuAspek").addClass("active")
        getData()
    });
    
    function getData() {
        $('#table-aspek').DataTable();

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