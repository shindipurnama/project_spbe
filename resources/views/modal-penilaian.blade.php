
<!-- Modal Indikator -->
<div class="modal fade" id="insertPenilaianMandiri" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penilaian-mandiri.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Penilaian</label>
                            <input type="text" id="name" name="penilaian_name" class="form-control" placeholder="Masukkan nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Jadwal</label>
                            <select id="domain" name="penjadwalan_id" class="form-select">
                                <option hidden selected>-- Pilih Jadwal --</option>
                                @foreach ($jadwal as $key => $j)
                                    <option value="{{$j->penjadwalan_id}}">{{$j->nama}}</option>
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

@foreach ($penilaian as $key => $p )
<div class="modal fade" id="updatePenilaianMandiri{{$p->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penilaian-mandiri.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Penilaian</label>
                            <input type="text" id="name" class="form-control" name="penilaian_name" value="{{$p->penilaian_name}}" placeholder="Masukkan nama" value="Indikator 1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Jadwal</label>
                            <select id="domain" name="penjadwalan_id" class="form-select">
                                @foreach ($jadwal as $key => $j)
                                    @if($j->ppenjadwalan_id == $p->penjadwalan_id)
                                        <option value="{{$j->penjadwalan_id}}" selected>{{$j->nama}}</option>
                                    @else
                                        <option value="{{$j->penjadwalan_id}}">{{$j->nama}}</option>
                                    @endif
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
<div class="modal fade" id="deletePenilaianMandiri{{$p->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penilaian-mandiri.destroy",$p->id) }}" method="POST" enctype="multipart/form-data">
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

<!-- Modal Atur Jadwal -->
<div class="modal fade" id="insertJadwal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Atur Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penjadwalan.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeStart" class="form-label">Nama Jadwal</label>
                            <input type="text" name="nama" id="nameSchedule" class="form-control" placeholder="Masukkan nama jadwal">
                            <input type="hidden" name="penjadwalan_id" id="nameSchedule" value="J001" class="form-control" placeholder="Masukkan nama jadwal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                            <input type="date" name="start_date" id="timeStart" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                            <input type="date" name="end_date" id="timeEnd" class="form-control">
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

@foreach ($jadwal as $key => $j )
<div class="modal fade" id="updateJadwal{{$j->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Penilaian Mandiri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penjadwalan.update', $j->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Nama Jadwal</label>
                        <input type="text" id="nameSchedule" name="nama" value="{{$j->nama}}" class="form-control" placeholder="Masukkan nama jadwal">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeStart" class="form-label">Waktu Mulai Tes</label>
                        <input type="date" id="timeStart" name="start_date" value="{{date('Y-m-d', strtotime($j->start_date))}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="timeEnd" class="form-label">Waktu Berakhir Tes</label>
                        <input type="date" id="timeEnd"  name="end_date" value="{{date('Y-m-d', strtotime($j->end_date))}}" class="form-control">
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

<div class="modal fade" id="deleteJadwal{{$j->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("penjadwalan.destroy",$j->id) }}" method="POST" enctype="multipart/form-data">
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
