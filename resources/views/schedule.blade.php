@extends('layout.index')
@section('title', 'Jadwal')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penilaian /</span> Jadwal</h4>
        </div>
        <div class="col-6 py-2" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertSchedule">
                Tambah Data
            </button>
        </div>
    </div>
    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Jadwal</h5>    
        <table id="table-schedule" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
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
                    <td>Penilaian Evaluasi SPBE 2022</td>
                    <td>15 Agustus 2022 - 15 September 2022</td>
                    <td>Penilaian Mandiri</td>
                    <td>45 Soal</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateSchedule">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSchedule">
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
<div class="modal fade" id="insertSchedule" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeSchedule" class="form-label">Kode Jadwal</label>
                        <input type="text" id="codeSchedule" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tahun Penilaian</label>
                        <select id="year" class="form-select">
                          <option>-- Pilih Tahun</option>
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Tes</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama tes">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="time" class="form-label">Waktu Tes</label>
                        <input type="text" id="time" class="form-control" placeholder="Masukkan waktu tes">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="soal" class="form-label">Soal</label>
                        <input type="text" id="soal" class="form-control" placeholder="Masukkan soal">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="qtySoal" class="form-label">Jumlah Soal</label>
                        <input type="text" id="qtySoal" class="form-control" placeholder="Masukkan jumlah soal">
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
<div class="modal fade" id="updateSchedule" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="codeSchedule" class="form-label">Kode Jadwal</label>
                        <input type="text" id="codeSchedule" class="form-control" readonly value="A001">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tahun Penilaian</label>
                        <select id="year" class="form-select">
                          <option>-- Pilih Tahun</option>
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Tes</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama tes">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="time" class="form-label">Waktu Tes</label>
                        <input type="text" id="time" class="form-control" placeholder="Masukkan waktu tes">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="soal" class="form-label">Soal</label>
                        <input type="text" id="soal" class="form-control" placeholder="Masukkan soal">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="qtySoal" class="form-label">Jumlah Soal</label>
                        <input type="text" id="qtySoal" class="form-control" placeholder="Masukkan jumlah soal">
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
<div class="modal fade" id="deleteSchedule" tabindex="-1" aria-modal="true" role="dialog">
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
        $("#menuEval").addClass("active")
        $("#menuEval").addClass("open")
        $("#subMenuSchedule").addClass("active")
        getData()
    });
    
    function getData() {
        $('#table-schedule').DataTable();

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