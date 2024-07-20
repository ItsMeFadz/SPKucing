@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Gejala</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="/gejala/update/{{ $gejala->id_gejala }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode Gejala</label>
                                <input type="text" class="form-control" name="kode_gejala"
                                    value="{{ $gejala->kode_gejala }}" />
                                @error('kode_gejala')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nama Gejala</label>
                                <input type="text" class="form-control" name="nama_gejala"
                                    value="{{ $gejala->nama_gejala }}" />
                                @error('nama_gejala')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <a href="/gejala" class="btn btn-success add-btn"><i
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
