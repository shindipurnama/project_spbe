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
            margin-top: 4cm;
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
        }

        table {
            width: 100%;
            padding-left: 0;
            padding: 10px;
            border-collapse: collapse;
        }

        tr,
        th {
            /* padding-right:3px; */
            padding: 10px;
            width: auto;
        }

        th {
            /* background-color: #E5E4E2; */
            font-size: 11px;
            /* width: 98%; */
            margin: 10px;
            text-align: center;
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
        }

        h4,
        p {
            margin: 0px;
            font-size: 12px;
        }

        td {
            padding: 2px;
            font-size: 11px;
            /* vertical-align: text-top; */
            width: auto;
        }

        .table-footer {
            margin-top: 5% !important;
            text-align: center;
            font-size: 12px;
            object-position: center bottom !important;
        }

        /* .bg {
            background-color: #E5E4E2;
        } */

        tfoot {
            margin-top: 5% !important;
            border-top: 1px solid #cacaca;
            border-bottom: 1px dashed #cacaca;
        }

        .page_break {
            page-break-before: always;
        }

        hr {
            color: green;
        }

        .table-content {
            padding: 15px !important;
        }

        .npwp {
            /* margin-top: 90%; */
            position: fixed;
            bottom: 0;
            width: 100%;
            padding-left: 10px;
            padding-bottom: 30px;
        }

        .text-header {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>

<body>

    <header>
        <table>
            <tr style="height:90px">
                <td style="width: 100%;">
                    <img style="width: 12%; float:left" src="../assets/img/logo.png">
                    <!-- <p style="font-size:16px; margin-top:5px"><b style="color: green;">&nbsp;&nbsp;PT. BUANA MEGAH</b></p>
                    <p style="font-size:12px;">
                        <b> &nbsp;&nbsp;Head Office : </b>Jl. Argopuro 42, Surabaya 60251, East Java, Indonesia<br>&nbsp;
                        <b>Pasuruan Office : </b>Jalan Raya Cangkringmalang km. 40, Beji Pasuruan 67154 East Java, Indonesia<br>&nbsp;
                        <b>Tel. </b>&nbsp;082231723136, 08510062998<br>
                    </p> -->
                </td>
            </tr>
        </table>
    </header>

    {{-- Body --}}
    <div class="container ">
        <label class="text-header">NIP : 111</label><br>
        <label class="mb-3 text-header">Nama SKPD : Teguh</label>
        <table>
            <tbody>
                <tr>
                    <th>Indikator</th>
                    <th>Nama Domain</th>
                    <th>Nama Aspek</th>
                    <th>Nama Indikator</th>
                    <th>Kriteria</th>
                    <th>Capaian</th>
                    <th>Hasil</th>
                </tr>

                {{-- Looping data --}}

                <tr>
                    <td rowspan="3" style="vertical-align: top;">{{$id}}</td>
                    <td rowspan="3" style="vertical-align: top;">Domain 1</td>
                    <td rowspan="3" style="vertical-align: top;">Aspek 1</td>
                    <td rowspan="3" style="vertical-align: top;">Indikator 1</td>
                    <td>
                        adadada adadaf fsdfwefw eg,m, sfww bjbds ndjnajndjad 22jnkasfas hbhfbak3ra bbdjabdja bjbajk
                    </td>
                    <td>
                        1
                    </td>
                    <td rowspan="3" style="vertical-align: top;">100</td>
                </tr>
                <tr>
                    <td>wrwrfaf</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>wrwrfaf</td>
                    <td>2</td>
                </tr>
                
                <tr>
                    <td rowspan="3" style="vertical-align: top;">{{$id}}</td>
                    <td rowspan="3" style="vertical-align: top;">Domain 1</td>
                    <td rowspan="3" style="vertical-align: top;">Aspek 1</td>
                    <td rowspan="3" style="vertical-align: top;">Indikator 1</td>
                    <td>
                        adadada adadaf fsdfwefw eg,m, sfww bjbds ndjnajndjad 22jnkasfas hbhfbak3ra bbdjabdja bjbajk
                    </td>
                    <td>
                        1
                    </td>
                    <td rowspan="3" style="vertical-align: top;">100</td>
                </tr>
                <tr>
                    <td>wrwrfaf</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>wrwrfaf</td>
                    <td>2</td>
                </tr>
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