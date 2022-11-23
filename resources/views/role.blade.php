@extends('layout.index')
@section('title', 'Role')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertRole">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Role</h5>
        <table id="table-role" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID Role</th>
                    <th>Nama Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role as $key =>$r)
                <tr>
                    <td>{{$r->role_id}}</td>
                    <td>{{$r->role}}</td>
                    <td>
                        <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateRole{{$r->id}}">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRole{{$r->id}}">
                            <i class='bx bxs-trash'></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal -->
<div class="modal fade" id="insertRole" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("role.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="kode" class="form-label">Kode Role</label>
                            <input type="text" required id="kode" class="form-control" name="role_id" readonly placeholder="Masukkan kode role" value="{{$code_role}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" required id="name" class="form-control" name="role" placeholder="Masukkan nama role">
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

@foreach ($role as $key => $r )
<div class="modal fade" id="updateRole{{$r->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("role.update",$r->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="KODE2" class="form-label">Kode Role</label>
                            <input type="text" id="KODE2" class="form-control" name="role_id" readonly value="{{$r->role_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name2" class="form-label">Nama Role</label>
                            <input type="text" required id="name2" class="form-control" name="role" value="{{$r->role}}">
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
@endforeach

@foreach ($role as $key => $r )
<div class="modal fade" id="deleteRole{{$r->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("role.destroy",$r->id) }}" method="POST" enctype="multipart/form-data">
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
        $("#menuRole").addClass("active")
        getData()
    });

    function getData() {
        $('#table-role').DataTable();

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