@extends('layout.index')
@section('title', 'Detail Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <h4 class="fw-bold py-3">Indikator 1</h4>
        </div>
    </div>
    <!-- Examples -->
    <div class="card mb-4">
        <h5 class="card-header">Detail Penilaian Mandiri</h5>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Domain</label>
                <div class="col-sm-5">
                    <select id="domain" class="form-select">
                        <option value="0">Domain 1</option>
                        <option value="1">Domain 2</option>
                        <option value="2">Domain 3</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Aspek</label>
                <div class="col-sm-5">
                    <select id="aspek" class="form-select">
                        <option value="0">Aspek 1</option>
                        <option value="1">Aspek 2</option>
                        <option value="2">Aspek 3</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Indikator</label>
                <div class="col-sm-5">
                    <select id="indikator" class="form-select">
                        <option value="0">Indikator 1</option>
                        <option value="1">Indikator 2</option>
                        <option value="2">Indikator 3</option>
                    </select>
                </div>
            </div>
            <table id="table-penilaian-mandiri" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kriteria 1</a></td>
                        <td>
                            <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updatKriteria">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKriteria">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-outline-secondary" style="width: 100%;">Kembali</button>
                </div>
                <div class="col-9">
                    <button type="button" class="btn btn-primary" style="width: 100%;">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Detail Penilaian Mandiri</h5>
        <div class="card-body">
            <div class="mb-3" style="display: flex;">
                <label class="col-sm-2" for="basic-default-name">Nomor Form</label>
                <label class="col-sm-5" for="basic-default-name">: PM012022</label>
            </div>
            <div class="mb-3" style="display: flex;">
                <label class="col-sm-2" for="basic-default-name">Nama Form</label>
                <label class="col-sm-5" for="basic-default-name">: Penilaian Evaluasi Mandiri 2022</label>
            </div>
            <div class="mb-3" style="display: flex;">
                <label class="col-sm-2" for="basic-default-name">Tahun</label>
                <label class="col-sm-5" for="basic-default-name">: 2022</label>
            </div>
            <div class="mb-3" style="display: flex;">
                <label class="col-sm-2" for="basic-default-name">Deskripsi</label>
                <label class="col-sm-5" for="basic-default-name">: Evaluasi SPBE 2022</label>
            </div>
            <table id="table-penilaian-mandiri-skpd" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Indikator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{ route('penilaian-mandiri.create') }}">Indikator 1</a></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalSoal">
                                Kerjakan
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-outline-secondary" style="width: 100%;">Kembali</button>
                </div>
                <div class="col-9">
                    <button type="button" class="btn btn-primary" style="width: 100%;">Simpan Semua Jawaban</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Examples -->

</div>

<!-- Modal -->
<div class="modal fade" id="updatKriteria" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="no" class="form-label">No</label>
                        <input type="text" id="no" class="form-control" readonly value="1">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" id="kriteria" class="form-control" value="Kriteria 1">
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

<div class="modal fade" id="deleteKriteria" tabindex="-1" aria-modal="true" role="dialog">
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

<div class="modal fade" id="modalSoal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3" style="display: flex;">
                        <label class="col-sm-2" for="basic-default-name">Domain</label>
                        <label class="col-sm-10" for="basic-default-name">: D001 - Kebijakan SPBE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3" style="display: flex;">
                        <label class="col-sm-2" for="basic-default-name">Aspek</label>
                        <label class="col-sm-10" for="basic-default-name">: A001 - Kebijakan Internal Terkait Tata Kelola SPBE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3" style="display: flex;">
                        <label class="col-sm-2" for="basic-default-name">Indikator</label>
                        <label class="col-sm-10" for="basic-default-name">: I001 - Tingkat Kematangan Kebijakan Internal</label>
                    </div>
                </div>
                <table id="table-form-kriteria" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Capaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Konsep kebijakan internal terkait Arsitektur SPBE</td>
                            <td style="text-align: center;">
                                <input class="form-check-input" type="checkbox" value="" id="checkKriteria1">
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kriteria tingkat 4 telah terpenuhi</td>
                            <td style="text-align: center;">
                                <input class="form-check-input" type="checkbox" value="" id="checkKriteria2">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mb-3">
                    <label for="txtCatatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="txtCatatan" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="txtImage" class="form-label">Gambar Pendukung</label>
                    <input class="form-control" type="file" id="txtImage" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    $(document).ready(function() {
        $("#menuPenilaianMandiri").addClass("active")
        getData()
    });

    function getData() {
        $('.table').DataTable();

        // $(".dataTables_wrapper").css("padding-left", "20px")
        // $(".dataTables_wrapper").css("padding-right", "20px")
        $(".dataTables_empty").css("text-align", "center")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-top", "15px")
    }
</script>
@endsection