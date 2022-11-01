@extends('layout.index')
@section('title', 'Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-secondary">
                Atur Jadwal
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertIndikator">
                Tambah Data
            </button>
        </div>
    </div>
    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Penilaian Mandiri</h5>    
        <table id="table-penilaian-mandiri" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Indikator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="/penilaian-mandiri/detail">Indikator 1</a></td>
                    <td>
                        <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateIndikator">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIndikator">
                            <i class='bx bxs-trash'></i>
                        </button>
                        <a href="/penilaian-mandiri/detail">
                            <button type="button" title="Detail Data" class="btn btn-icon btn-success">
                                <i class='bx bx-info-circle'></i>
                            </button>
                        </a>
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
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Domain</label>
                        <select id="year" class="form-select">
                          <option value="">-- Pilih Domain --</option>
                          <option value="Domain 1">Domain 1</option>
                          <option value="Domain 2">Domain 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Aspek</label>
                        <select id="year" class="form-select">
                          <option value="">-- Pilih Aspek --</option>
                          <option value="Aspek 1">Aspek 1</option>
                          <option value="Aspek 2">Aspek 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Indikator</label>
                        <select id="year" class="form-select">
                          <option value="">-- Pilih Indikator --</option>
                          <option value="Indikator 1">Indikator 1</option>
                          <option value="Indikator 2">Indikator 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Kriteria</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan kriteria" aria-label="Masukkan kriteria" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="button" id="button-addon2">Tambah</button>
                        </div>
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
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama" value="Indikator 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Domain</label>
                        <select id="year" class="form-select">
                          <option value="Domain 1">Domain 1</option>
                          <option value="Domain 2">Domain 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Aspek</label>
                        <select id="year" class="form-select">
                          <option value="Aspek 1">Aspek 1</option>
                          <option value="Aspek 2">Aspek 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Indikator</label>
                        <select id="year" class="form-select">
                          <option value="Indikator 1">Indikator 1</option>
                          <option value="Indikator 2">Indikator 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Kriteria</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan kriteria" aria-label="Masukkan kriteria" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="button" id="button-addon2">Tambah</button>
                        </div>
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
        $("#menuPenilaianMandiri").addClass("active")
        getData()
    });
    
    function getData() {
        $('#table-penilaian-mandiri').DataTable();

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