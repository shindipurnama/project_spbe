@extends('layout.index')
@section('title', 'Detail Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @can('admin')
    {{-- admin --}}
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
                    @foreach ($spbe as $key => $s)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$s->spbe}}</a></td>
                        <td>
                            <a href="{{ route('penilaian-mandiri-detail.edit',$s->id) }}">
                                <button type="button" class="btn btn-icon btn-info">
                                    <i class='bx bx-info-circle'></i>
                                </button>
                            </a>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteIndikator{{$s->id}}">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="insertIndikator" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route("penilaian-mandiri-detail.store") }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="spbe" class="form-control" placeholder="Masukkan nama">
                                <input type="hidden" id="name" name="penilaian_id" value="{{$penilaian->penilaian_id}}" class="form-control" placeholder="Masukkan nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Domain</label>
                                <select id="domain" name="domain" class="form-select">
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
                                <select id="aspek" name="aspek" class="form-select">
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
                                <select id="indikator" name="indikator" class="form-select">
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($spbe as $key=> $s)
    <div class="modal fade" id="deleteIndikator{{$s->id}}" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route("penilaian-mandiri-detail.destroy",$s->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="row">
                            <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini ?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endcan

    @can('skpd')
    <form action="{{ route('hasil-penilaian-mandiri.update', $penilaian->penilaian_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <h5 class="card-header">Detail Penilaian Mandiri</h5>
            <div class="card-body">
                <div class="mb-3" style="display: flex;">
                    <label class="col-sm-2" for="basic-default-name">Nomor Form</label>
                    <label class="col-sm-5" for="basic-default-name">: {{$penilaian->penilaian_id}}</label>
                </div>
                <div class="mb-3" style="display: flex;">
                    <label class="col-sm-2" for="basic-default-name">Nama Form</label>
                    <label class="col-sm-5" for="basic-default-name">: {{$penilaian->penilaian_name}}</label>
                </div>
                <div class="mb-3" style="display: flex;">
                    <label class="col-sm-2" for="basic-default-name">Jadwal</label>
                    <label class="col-sm-5" for="basic-default-name">: {{$penilaian->jadwal->start_date->format('d F Y')}}</label>
                </div>
                <table id="table-penilaian-mandiri-skpd" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Indikator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spbe as $key=> $s)
                        <tr>
                            <td>{{$s->spbe}}</td>
                            <td>
                                @if($status == 0)
                                <button type="button" class="btn btn-success" id="indikator" data-bs-toggle="modal" data-bs-target="#modalSoal{{$s->id}}">
                                    Kerjakan
                                </button>
                                @else
                                    Selesai
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($spbe as $key=> $s)
                    <div class="modal fade" id="modalSoal{{$s->id}}" tabindex="-1" aria-modal="true" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-3" style="display: flex;">
                                                <label class="col-sm-2" for="basic-default-name">Domain</label>
                                                <label class="col-sm-10" for="basic-default-name">: {{$s->domain->domain_id}} - {{$s->domain->nama_domain}}</label>
                                                <input type="hidden" id="name" name="indikator_spbe[]" value="{{$s->id}}" class="form-control" ></td>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3" style="display: flex;">
                                                <label class="col-sm-2" for="basic-default-name">Aspek</label>
                                                <label class="col-sm-10" for="basic-default-name">: {{$s->aspek->aspek_id}} - {{$s->aspek->aspek_name}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3" style="display: flex;">
                                                <label class="col-sm-2" for="basic-default-name">Indikator</label>
                                                <label class="col-sm-10" for="basic-default-name">: {{$s->indikator->indikator_id ?? ''}} - {{$s->indikator->indikator_name?? ''}}</label>
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
                                                <?php $no = 1 ?>
                                                @foreach ($kirteria as $key=> $k)
                                                @if ($k->spbe_id == $s->spbe_id)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$k->kirteria}}</td>
                                                    <td style="text-align: center;">
                                                        <input class="form-check-input" name="capaian{{$k->id}}" type="checkbox" value="1" id="checkKriteria">
                                                        {{-- <input type="hidden"  name="capaian[]" value="0" id="checkKriteria"> --}}
                                                        <input type="hidden" id="name" name="kirteria_id[]" value="{{$k->id}}" class="form-control" >
                                                        <input type="hidden" id="name" name="spbe_id[]" value="{{$s->spbe_id}}" class="form-control" >
                                                        <input type="hidden" id="name" name="penilaian_id" value="{{$penilaian->penilaian_id}}" class="form-control" >
                                                        <input type="hidden" id="name" name="user_id" value="{{ auth()->user()->id }}" class="form-control" >
                                                    </td>
                                                </tr>
                                                <?php $no ++ ?>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- <div class="mb-3">
                                            <label for="txtCatatan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="txtCatatan" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtImage" class="form-label">Gambar Pendukung</label>
                                            <input class="form-control" type="file" id="txtImage" accept="image/png, image/gif, image/jpeg">
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('penilaian-mandiri.index') }}"><button type="button" class="btn btn-outline-secondary" style="width: 100%;">Kembali</button></a>
                    </div>
                    <div class="col-9">
                        @if($status == 0)
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Semua Jawaban</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Examples -->
    </form>
    @endcan
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
    $('#indikator').on('click', function(){
        console.log("masuk")
    });

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
                            <div class="card-body" style="padding: 1rem 1rem;">
                                <label class="card-text">
                                    ${arrayKriteria[i].no}, ${arrayKriteria[i].kriteria}
                                </label>
                                <input type="hidden" class="form-control" name="kirteria[]" value="${arrayKriteria[i].kriteria}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card-body" style="padding: 1rem 1rem;">
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
