@extends('layout.index')
@section('title', 'Data SKPD')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertSKPD">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data SKPD</h5>
        <table id="table-skpd" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP (Username)</th>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skpd as $key => $skpd )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$skpd->username}}</td>
                        <td>{{$skpd->name}}</td>
                        <td>{{$skpd->tipe}} </td>
                        <td>
                            <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateSKPD{{$skpd->id}}">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSKPD{{$skpd->id}}">
                                <i class='bx bxs-trash'></i>
                            </button>
                            <!-- <button type="button" title="Edit Password" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#updatePasswordSKPD">
                                <i class='bx bxs-key'></i>
                            </button> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal  SKPD -->
<div class="modal fade" id="insertSKPD" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data SKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("skpd.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" name="username" class="form-control" placeholder="Masukkan nip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name_skpd" class="form-label">Nama</label>
                            <input type="text" id="name_skpd" name="name" class="form-control" placeholder="Masukkan nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Tipe</label>
                            <input type="text" id="tipe" name="tipe" class="form-control" placeholder="Masukkan tipe">
                            <!-- <select id="year" name="tipe" class="form-select">
                                <option>-- Pilih Tipe --</option>
                                <option value="Evaluasi Internal Seupervisor">Evaluasi Internal Seupervisor</option>
                                <option value="Evaluasi">Evaluasi</option>
                                <option value="Evaluasi">Evaluasi</option>
                            </select> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" name= class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image" name="image">
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

@foreach ($user as $key => $skpd )
<div class="modal fade" id="updateSKPD{{$skpd->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data SKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("skpd.update",$skpd->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" class="form-control" name="username" value="{{$skpd->username}}" placeholder="Masukkan nip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name_skpd2" class="form-label">Nama</label>
                            <input type="text" id="name_skpd2" class="form-control" name="name" value="{{$skpd->name}}" placeholder="Masukkan nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Tipe</label>
                            <input type="text" id="tipe" class="form-control" name="tipe" value="{{$skpd->tipe}}" placeholder="Masukkan tipe">

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

<div class="modal fade" id="deleteSKPD{{$skpd->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route("skpd.destroy",$skpd->id) }}" method="POST" enctype="multipart/form-data">
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
    $(document).ready(function () {
        $("#menuDataSKPD").addClass("active")
        getData()
    });

    function getData() {
        $('#table-skpd').DataTable();

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
