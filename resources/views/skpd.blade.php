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
                <tr>
                    <td>1</td>
                    <td>NIP001</td>
                    <td>Test 123</td>
                    <td>Evaluasi Internal Supervisor</td>
                    <td>
                        <button type="button" title="Edit Data" class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#updateSKPD">
                            <i class='bx bxs-edit'></i>
                        </button>
                        <button type="button" title="Hapus Data" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSKPD">
                            <i class='bx bxs-trash'></i>
                        </button>
                        <!-- <button type="button" title="Edit Password" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#updatePasswordSKPD">
                            <i class='bx bxs-key'></i>
                        </button> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Examples -->

</div>

<!-- Modal -->
@include('modal')

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