<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Hasil Penilaian Mandiri</title>
    <style>
        @page {
            margin: 0 !important;
            margin-top: 0 !important;
            /* padding: 5px !important; */
            size: auto;
            /*  auto is the current printer page size */

        }

        *

        /* Define the header rules */
        header {
            position: fixed;
            top: 1cm;
            left: 20px;
            right: 20px;
            height: 3cm;
        }

        /* Define the footer rules */
        footer {
            position: absolute;
            bottom: 0cm;
            right: 1cm;
            padding-bottom: 30px;
            text-align: right;
        }


        #footer .page::before {
            /* counter-increment: page; */
            content: counter(page);
        }

        /* p{
                        counter-reset: page;
                    } */

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 11;
            margin-top: 2.5cm;
            margin-left: 20px;
            margin-right: 20px;
            font-size: 11px;
        }

        .margin {
            margin-top: 2.8cm;
        }

        .container {
            /* to centre page on screen*/
            /* border:1px solid #333; */
          padding: 1%;

        }

        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid;
          text-align: left;
          padding: 8px;
          font-size: 12px !important;
        }

        th {
            text-align: center !important;
          background-color: #dddddd;
        }

        h4,
        p {
            margin: 0px;
            font-size: 12px;
        }


    </style>
</head>

<body>

    <header>
        <!-- <img style="width: 12%; float:left" src="public/assets/img/logo.png"> -->
        <h2 style="text-align: center">Laporan Penilaian Mandiri {{$head->spbe->spbe}} </h2>
    </header>

    {{-- Body --}}
    <div class="container ">
        <label class="text-header">NIP : {{$head->user->username}}</label><br>
        <label class="mb-3 text-header">Nama SKPD : {{$head->user->name}}</label><br><br>
        <table>
            <thead>
                <tr>
                    <th>Indikator</th>
                    <th> Domain</th>
                    <th> Aspek</th>
                    <th> Indikator</th>
                    <th>Hasil</th>
                    <th>Kriteria</th>
                    <th>Capaian</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 0; @endphp
                @php $rowspan=0;  @endphp
                @foreach ($penilaian as $key => $p)
                    @foreach ($nilai as $key =>$n)
                        @if ($n->spbe_id == $p->spbe_id)
                        @php $no++; $rowspan=$n->jumlah; @endphp
                            <tr>
                                @if ($no == 1)
                                    <td rowspan="{{$rowspan}}" style="vertical-align: top; width: 15%">{{$p->spbe->spbe}} </td>
                                    <td rowspan="{{$rowspan}}" style="vertical-align: top; width: 15%">{{$p->spbe->domain->nama_domain}}</td>
                                    <td rowspan="{{$rowspan}}" style="vertical-align: top; width: 15%">{{$p->spbe->aspek->aspek_name}}</td>
                                    <td rowspan="{{$rowspan}}" style="vertical-align: top; width: 15%">{{$p->spbe->indikator->indikator_name}}</td>
                                    <td rowspan="{{$rowspan}}" style="vertical-align: top; width: 10%">{{Round(($n->nilai / $n->jumlah) * 100)}}</td>
                                @endif
                                    <td style="width: 30% !important;">{{$p->kirteria->kirteria}}</td>
                                    <td style="width: 10%;">{{$p->nilai}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                {{-- Count total --}}


            </tbody>
            {{-- Table Footer, Total Counter --}}

        </table>

        <!-- <div class="npwp">
            <p style="font-size:10px;"><b>NPWP :</b> 02.208.933.8-614.000 <b> - PT. BUANA MEGAH : </b>Jl. Argopuro 42, Surabaya 60251, East Java, Indonesia </p>
            <p style="font-size:10px;"><b>Instructions :</b> </p><br>

        </div> -->
    </div>



</body>

</html>
