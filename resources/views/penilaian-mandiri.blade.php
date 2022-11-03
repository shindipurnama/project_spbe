@extends('layout.index')
@section('title', 'Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#insertJadwal">
                Atur Jadwal
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertIndikator">
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

    <div class="card">
        <h5 class="card-header">Data Jadwal</h5>
        <table id="table-jadwal" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
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
                    <td>Penilaian Evaluasi SPBE 2022</td>
                    <td>1 November 2022 - 15 Novemebr 2022</td>
                    <td>Penilaian Mandiri</td>
                    <td>47 Soal</td>
                    <td>
                        <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateJadwal">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteJadwal">
                            <i class='bx bxs-trash'></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal Indikator -->
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
                        <label class="form-label">Jadwal</label>
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="Jadwal 1">Jadwal 1</option>
                            <option value="Jadwal 2">Jadwal 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Domain</label>
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Domain --</option>
                            <option value="Domain 1">Domain 1</option>
                            <option value="Domain 2">Domain 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Aspek</label>
                        <select id="aspek" class="form-select">
                            <option value="">-- Pilih Aspek --</option>
                            <option value="Aspek 1">Aspek 1</option>
                            <option value="Aspek 2">Aspek 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Indikator</label>
                        <select id="indikator" class="form-select">
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
                        <label class="form-label">Jadwal</label>
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="Jadwal 1">Jadwal 1</option>
                            <option value="Jadwal 2">Jadwal 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Domain</label>
                        <select id="domain" class="form-select">
                            <option value="Domain 1">Domain 1</option>
                            <option value="Domain 2">Domain 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Aspek</label>
                        <select id="aspek" class="form-select">
                            <option value="Aspek 1">Aspek 1</option>
                            <option value="Aspek 2">Aspek 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Indikator</label>
                        <select id="indikator" class="form-select">
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

<!-- Modal Atur Jadwal -->
<div class="modal fade" id="insertJadwal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Atur Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Tes</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukkan nama">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                        <input type="date" id="timeStart" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                        <input type="date" id="timeEnd" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tahun</label>
                        <select id="year" class="form-select year">
                            <option value="">-- Pilih Tahun --</option>
                        </select>
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
                        <label for="jumlah" class="form-label">Jumlah Soal</label>
                        <input type="text" id="jumlah" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Masukkan jumlah soal">
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
<div class="modal fade" id="updateJadwal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Tes</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukkan nama">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                        <input type="date" id="timeStart" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                        <input type="date" id="timeEnd" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tahun</label>
                        <select id="year" class="form-select year">
                            <option value="">-- Pilih Tahun --</option>
                        </select>
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
                        <label for="jumlah" class="form-label">Jumlah Soal</label>
                        <input type="text" id="jumlah" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Masukkan jumlah soal">
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
<div class="modal fade" id="deleteJadwal" tabindex="-1" aria-modal="true" role="dialog">
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
    $(document).ready(function() {
        $("#menuPenilaianMandiri").addClass("active")
        getData()
        getYear()
    });

    function getData() {
        $('#table-penilaian-mandiri').DataTable();
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
</script>
@endsection