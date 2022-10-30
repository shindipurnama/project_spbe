<!-- Domain -->
<div class="modal fade" id="insertDomain" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Domain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("domain.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeDomain" class="form-label">Kode Domain</label>
                            <input type="text" id="codeDomain" name="domain_id" class="form-control" readonly value="{{$code_domain}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameDomain" class="form-label">Nama Domain</label>
                            <input type="text" id="nameDomain" name="nama_domain" class="form-control" placeholder="Masukkan nama domain">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button  type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($domain as $key => $d )
<div class="modal fade updateDomain{{$d->id}}" id="updateDomain" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Domain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('domain.update', $d->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeDomain" class="form-label">Kode Domain</label>
                            <input type="text" id="codeDomain" name="domain_id" class="form-control" readonly value="{{$d->domain_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameDomain" class="form-label">Nama Domain</label>
                            <input type="text" id="nameDomain" name="nama_domain" class="form-control" value="{{$d->nama_domain}}">
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

<!-- Aspek -->
<div class="modal fade" id="insertAspek" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Aspek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("aspek.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeAspek" class="form-label">Kode Aspek</label>
                            <input type="text" id="codeAspek" name="aspek_id" class="form-control" readonly value="{{$code_aspek}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameAspek" class="form-label">Nama Aspek</label>
                            <input type="text" id="nameAspek" name="aspek_name" class="form-control" placeholder="Masukkan nama aspek">
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

@foreach ($aspek as $key =>$a)
<div class="modal fade" id="updateAspek{{$a->id}}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Aspek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('aspek.update', $a->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeAspek" class="form-label">Kode Aspek</label>
                            <input type="text" id="codeAspek" name="aspek_id" class="form-control" readonly value="{{$a->aspek_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameAspek" class="form-label">Nama Aspek</label>
                            <input type="text" id="nameAspek" name="aspek_name" class="form-control" placeholder="Masukkan nama aspek" value="{{$a->aspek_name}}">
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

<!-- Indikator -->
<div class="modal fade" id="insertIndikator" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("indikator.store") }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeIndikator" class="form-label">Kode Indikator</label>
                            <input type="text" id="codeIndikator" name="indikator_id" class="form-control" readonly value="{{$code_indikator}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameIndikator" class="form-label">Nama Indikator</label>
                            <input type="text" id="nameIndikator" name="indikator_name" class="form-control" placeholder="Masukkan nama indikator">
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

@foreach ($indikator as $key => $i )
<div class="modal fade updateIndikator{{$i->id}}" id="updateIndikator" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('indikator.update', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="codeIndikator" class="form-label">Kode Indikator</label>
                            <input type="text" id="codeIndikator" name="indikator_id" class="form-control" readonly value="{{$i->indikator_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameIndikator" class="form-label">Nama Indikator</label>
                            <input type="text" id="nameIndikator" name="indikator_name" class="form-control" value="{{$i->indikator_name}}">
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
