@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Tambah Rule</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="/basis/store" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Penyakit</label>
                                <select class="form-select mt-1" name="id_penyakit">
                                    <option selected disabled>--- Pilih Penyakit ---</option>
                                    @foreach ($penyakit as $penyakit)
                                        <option value="{{ $penyakit->id_penyakit }}">{{ $penyakit->nama_penyakit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="no">No</th>
                                        <th class="sort" data-sort="kode_gejala">Kode Gejala</th>
                                        <th class="sort" data-sort="nama_gejala">Nama Gejala</th>
                                        {{-- <th class="sort" data-sort="bobot_prioritas">Bobot Prioritas</th> --}}
                                        <th class="sort" data-sort="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i = 1; ?>
                                    @foreach ($gejala as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->kode_gejala }}</td>
                                            <td>{{ $item->nama_gejala }}</td>
                                            {{-- <td>0,00</td> --}}
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="id_gejala[]"
                                                        value="{{ $item->id_gejala }}"
                                                        id="flexSwitchCheckChecked{{ $item->id_gejala }}">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked{{ $item->id_gejala }}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <a href="/basis" class="btn btn-success add-btn"><i
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
