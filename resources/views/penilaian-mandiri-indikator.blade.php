@extends('layout.index')
@section('title', 'Detail Penilaian Mandiri')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
            <h4 class="fw-bold py-3">Indikator 1</h4>
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertPenilaianMandiri">
                Tambah Kriteria
            </button>
        </div>
    </div>

    <!-- Examples -->
<form action="{{ route('penilaian-mandiri-detail.update',[$spbe->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <div class="card mb-4">
        <h5 class="card-header">Detail Indikator</h5>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">SPBE</label>
                <div class="col-sm-5">
                    <input type="text" id="name" name="spbe" class="form-control" value="{{$spbe->spbe}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Domain</label>
                <div class="col-sm-5">
                    <select id="domain" name="domain" class="form-select">
                        <option hidden></option>
                        @foreach ($domain as $key => $d)
                            @if ($d->domain_id == $spbe->domain_id)
                                <option value="{{$d->domain_id}}" selected>{{$d->nama_domain}}</option>
                            @else
                                <option value="{{$d->domain_id}}">{{$d->nama_domain}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Aspek</label>
                <div class="col-sm-5">
                    <select id="aspek"  name="aspek" class="form-select">
                        <option hidden></option>
                        @foreach ($aspek as $key => $a)
                            @if ($a->aspek_id == $spbe->aspek_id)
                                <option value="{{$a->aspek_id}}" selected>{{$a->aspek_name}}</option>
                            @else
                                <option value="{{$a->aspek_id}}">{{$a->aspek_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Indikator</label>
                <div class="col-sm-5">
                    <select id="indikator"  name="indikator" class="form-select">
                        <option hidden></option>
                        @foreach ($indikator as $key => $i)
                            @if ($spbe->indikator_id == $i->indikator_id)
                                <option value="{{$i->indikator_id}}" selected>{{$i->indikator_name}}</option>
                            @else
                                <option value="{{$i->indikator_id}}">{{$i->indikator_name}}</option>
                            @endif
                        @endforeach
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
                    @foreach ($kirteria as $key => $k)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$k->kirteria}}</a></td>
                        <td>
                            <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updatKriteria{{$k->id}}">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKriteria{{$k->id}}">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-outline-secondary" style="width: 100%;">Kembali</button>
                </div>
                <div class="col-9">
                    <button type="submit" name='action' value="save" class="btn btn-primary" style="width: 100%;">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- Examples -->

</div>

<!-- Modal -->
<div class="modal fade" id="insertPenilaianMandiri" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penilaian-mandiri-indikator.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Kriteria</label>
                            <input type="text" id="name" name="kirteria" class="form-control" placeholder="Masukkan nama">
                            <input type="hidden" id="name" name="spbe_id" class="form-control" value="{{$spbe->spbe_id}}">
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

@foreach ($kirteria as $key => $k)
<div class="modal fade" id="updatKriteria{{$k->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penilaian-mandiri-detail.update',[$k->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="kriteria" class="form-label">Nama Kriteria</label>
                            <input type="text" id="kriteria" name="kirteria" class="form-control" value="{{$k->kirteria}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit"  name='action' value="kirteria" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteKriteria{{$k->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penilaian-mandiri-indikator.destroy",$k->id) }}" method="POST" enctype="multipart/form-data">
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
