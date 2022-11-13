@extends('layout.index')
@section('title', 'User Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6 py-2 mb-4" style="text-align: end;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertUser">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data User</h5>
        <table id="table-skpd" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key =>$u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->role->role}}</td>
                        <td>
                            <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateUser{{$u->id}}">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{$u->id}}">
                                <i class='bx bxs-trash'></i>
                            </button>
                            <!-- <button type="button" title="Edit Password" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#updatePasswordUser">
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

<!-- Modal -->
<div class="modal fade" id="insertUser" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("user-management.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" required id="name" class="form-control" name="name" placeholder="Masukkan nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" required id="username" class="form-control" name="username" placeholder="Masukkan username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" required name="email" id="email" class="form-control" placeholder="Masukkan email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password32">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" required name="password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Role</label>
                            <select id="role" required name="role_id" class="form-select">
                                <option value="">-- Pilih Role --</option>
                                @foreach ($role as $key => $r )
                                    <option value="{{$r->role_id}}">{{$r->role}}</option>
                                @endforeach
                            </select>
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

@foreach ($user as $key => $u )
<div class="modal fade" id="updateUser{{$u->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("user-management.update",$u->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name2" class="form-label">Nama</label>
                            <input type="text" required id="name2" class="form-control" name="name" value="{{$u->name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" required id="username" name="username" class="form-control" value="{{$u->username}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email2" class="form-label">Email</label>
                            <input type="email" required id="email2" name="email" class="form-control" value="{{$u->email}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Role</label>
                            <select id="year" name="role_id" class="form-select">
                                @if($u->role_id == 0)
                                    <option value="0" selected>Admin</option>
                                    <option value="1">SKPD</option>
                                @else
                                    <option value="0" >Admin</option>
                                    <option value="1"selected>SKPD</option>
                                @endif
                            </select>
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

<!-- <div class="modal fade" id="updatePasswordUser" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Password User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password32">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password32">Konfirmasi Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
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
</div> -->


@foreach ($user as $key => $u )
<div class="modal fade" id="deleteUser{{$u->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("user-management.destroy",$u->id) }}" method="POST" enctype="multipart/form-data">
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
        $("#menuUserManagement").addClass("active")
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
