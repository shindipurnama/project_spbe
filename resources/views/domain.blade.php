@extends('layout.index')
@section('title', 'Domain')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data SPBE /</span> Domain</h4>

    <!-- Examples -->
    <div class="card">
        <h5 class="card-header">Data Domain</h5>
        <!-- <div class="table-responsive text-nowrap"> -->
        <table id="table-domain" class="table table-striped" style="width:90%">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Client</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                    <td>Albert Cook</td>
                </tr>
                <tr>
                    <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                    <td>Barry Hunter</td>
                </tr>
                <tr>
                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                    <td>Trevor Baker</td>
                </tr>
                <tr>
                    <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong></td>
                    <td>Jerry Milton</td>
                </tr>
            </tbody>
        </table>
        <!-- </div> -->
    </div>
    <!-- Examples -->

</div>
            
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $("#menuDataSPBE").addClass("active")
        $("#menuDataSPBE").addClass("open")
        $("#subMenudomain").addClass("active")
        getData()
    });
    
    function getData() {
        $('#table-domain').DataTable();

        $(".dataTables_length").css("padding-left", "20px")
        $(".dataTables_filter").css("padding-right", "20px")
        $(".dataTables_filter").css("float", "right")
        $(".dataTables_info").css("padding-left", "20px")
        $(".dataTables_info").css("padding-top", "15px")
        $(".dataTables_paginate").css("float", "right")
        $(".dataTables_paginate").css("padding-right", "20px")
        $(".dataTables_paginate").css("padding-top", "15px")
    }
</script>
@endsection