@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Penyakit</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="/penyakit/update/{{ $penyakit->id_penyakit }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode Penyakit</label>
                                <input type="text" class="form-control" name="kode_penyakit"
                                    value="{{ $penyakit->kode_penyakit }}" />
                                @error('kode_penyakit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nama Penyakit</label>
                                <input type="text" class="form-control" name="nama_penyakit"
                                    value="{{ $penyakit->nama_penyakit }}" />
                                @error('nama_penyakit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Deskripsi Penyakit</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required>{{ $penyakit->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Penanganan</label>
                                <textarea name="penanganan" class="form-control" id="penanganan" rows="3" required>{{ $penyakit->penanganan }}</textarea>
                                @error('penanganan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="/penyakit" class="btn btn-success add-btn"><i
                                    class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            <button type="submit" class="btn btn-success"><i
                                    class="ri-file-4-line align-bottom me-1"></i>Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
