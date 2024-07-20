@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Tambah Artikel</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="/artikel/store" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Artikel</label>
                                <input type="text" class="form-control" name="nama_artikel" value="" />
                                @error('nama_artikel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="" />
                                @error('penulis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <br>
                            <a href="/artikel" class="btn btn-success add-btn"><i
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
