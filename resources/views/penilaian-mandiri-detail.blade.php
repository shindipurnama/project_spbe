@extends('layout.index')
@section('title', 'Detail Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertIndikator">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Examples -->
    <div class="card mb-4">
        <h5 class="card-header">Detail Penilaian Mandiri</h5>
        <div class="card-body">
            <table id="table-detail-penilaian-mandiri" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Indikator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Indikator 1</a></td>
                        <td>
                            <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updatIndikator">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIndikator">
                                <i class='bx bxs-trash'></i>
                            </button>
                            <a href="{{ route('penilaian-mandiri-detail-indikator.index') }}">
                                <button type="button" class="btn btn-icon btn-success">
                                    <i class='bx bx-info-circle'></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
<div class="modal fade" id="insertIndikator" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
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
                        <select id="domain" class="form-select">
                            <option value="">-- Pilih Domain --</option>
                            @foreach ($domain as $key => $d)
                            <option value="{{$d->domain_id}}">{{$d->nama_domain}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Aspek</label>
                        <select id="aspek" class="form-select">
                            <option value="">-- Pilih Aspek --</option>
                            @foreach ($aspek as $key => $a)
                            <option value="{{$a->aspek_id}}">{{$a->aspek_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Indikator</label>
                        <select id="indikator" class="form-select">
                            <option value="">-- Pilih Indikator --</option>
                            @foreach ($indikator as $key => $i)
                            <option value="{{$i->indikator_id}}">{{$i->indikator_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Kriteria</label>
                        <div class="input-group">
                            <input type="text" id="valKriteria" class="form-control" placeholder="Masukkan kriteria" aria-label="Masukkan kriteria" aria-describedby="btnAddKriteria">
                            <button class="btn btn-secondary" type="button" id="btnAddKriteria">Tambah</button>
                        </div>
                        <div class="input-group" style="margin: 10px 10px 10px 0px;" id="listKriteria">
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
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Penilaian</label>
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
    var index = 1
    var arrayKriteria = []

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