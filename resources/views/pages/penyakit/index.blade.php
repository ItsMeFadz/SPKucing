@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sistem Pakar</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Penyakit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Data Penyakit</h4>
                        </div>
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="penyakit/create"><button class="btn btn-success add-btn"><i
                                                        class="ri-add-line align-bottom me-1"></i>Tambah</button></a>
                                            {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                    class="ri-delete-bin-2-line"></i></button> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                {{-- <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-top table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                {{-- <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </th> --}}
                                                <th class="sort" data-sort="no">No</th>
                                                <th class="sort" data-sort="kode_penyakit">Kode Penyakit</th>
                                                <th class="sort" data-sort="nama_penyakit">Nama Penyakit</th>
                                                <th class="sort" data-sort="deskripsi">Deskripsi Penyakit</th>
                                                <th class="sort" data-sort="penanganan">Cara Penanganan</th>
                                                <th class="sort" data-sort="aksi">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php $i = 1; ?>
                                            @foreach ($penyakit as $item)
                                                <tr>
                                                    {{-- <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                            class="fw-medium link-primary">{{ $item->id_penyakit }}</a></td> --}}
                                                    <td><?= $i++ ?></td>
                                                    <td>{{ $item->kode_penyakit }}</td>
                                                    <td>{{ $item->nama_penyakit }}</td>
                                                    <td class="text-wrap" style="max-width: 200px;">
                                                        {{ $item->deskripsi }}
                                                    </td>
                                                    <td class="text-wrap" style="max-width: 200px;">
                                                        {{ $item->penanganan }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <a href="penyakit/edit/{{ $item->id_penyakit }}"><button
                                                                        class="btn btn-sm btn-info edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showModal">Edit</button></a>
                                                            </div>
                                                            <i class="" style="font-size: 20px;"></i>
                                                            <form id="deleteForm{{ $item->id_penyakit }}"
                                                                action="/penyakit/delete/{{ $item->id_penyakit }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#"
                                                                    onclick="confirmDelete({{ $item->id_penyakit }})"
                                                                    class="btn btn-sm btn-primary remove-item-btn">Hapus</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Sebelumnya
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Selanjutnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
