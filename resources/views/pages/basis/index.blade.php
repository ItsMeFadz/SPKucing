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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Aturan</a></li>
                                <li class="breadcrumb-item active">Basis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title mb-0">Data Basis Rule</h4>
                            <div>
                                <a href="basis/create"><button class="btn btn-success add-btn btn-sm"><i
                                            class="ri-add-line align-bottom me-1"></i>Tambah</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="customerList">
                                {{-- <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div> --}}
                            </div>
                            <div class="table-responsive table-card mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="no">No</th>
                                            <th class="sort" data-sort="penyakit">Nama Penyakit</th>
                                            <th class="sort" data-sort="aksi">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php $i = 1; ?>
                                        @foreach ($basis as $item)
                                            <tr>
                                                {{-- <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                        class="fw-medium link-primary">{{ $item->id_artikel }}</a></td> --}}
                                                <td><?= $i++ ?></td>
                                                <td>{{ $item->penyakit->nama_penyakit }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="set">
                                                            <a href="basis/set_bobot/{{ $item->id_basis }}"><button
                                                                    class="btn btn-sm btn-info edit-item-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#showModal">Set
                                                                    Bobot</button></a>
                                                        </div>
                                                        <div class="edit">
                                                            <a href="basis/edit/{{ $item->id_basis }}"><button
                                                                    class="btn btn-sm btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#showModal">Edit</button></a>
                                                        </div>
                                                        <form id="deleteForm{{ $item->id_basis }}"
                                                            action="{{ route('basis.destroy', $item->id_basis) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary remove-item-btn"
                                                                onclick="confirmDelete({{ $item->id_basis }})">Hapus</button>
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
@endsection
