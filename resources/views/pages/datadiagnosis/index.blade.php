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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                                <li class="breadcrumb-item active">Data Diagnosis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title mb-0">Data Diagnosis</h4>
                            <div>
                                <button class="btn btn-success add-btn btn-sm"
                                    onclick="window.location.href='{{ route('diagnosis.download') }}'">Unduh pdf<i
                                        class="ri-download-line align-bottom mx-1"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card  mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="no">No</th>
                                            <th class="sort" data-sort="">Nama Pemilik</th>
                                            <th class="sort" data-sort="">Nama Kucing</th>
                                            <th class="sort" data-sort="">No HP</th>
                                            <th class="sort" data-sort="">Alamat</th>
                                            <th class="sort" data-sort="">Tanggal</th>
                                            <th class="sort" data-sort="">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php $i = 1; ?>
                                        @foreach ($diagnosis as $item)
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>{{ $item->nama_pemilik }}</td>
                                                <td>{{ $item->nama_kucing }}</td>
                                                <td>{{ $item->no_hp }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->created_at->format('d') }}
                                                    {{ $item->created_at->translatedFormat('F') }}
                                                    {{ $item->created_at->format('Y') }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-item-btn"
                                                        data-id="{{ $item->id_diagnosis }}" data-bs-toggle="modal"
                                                        data-bs-target="#showModal">Detail</button>
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

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Diagnosis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>ID Gejala</th>
                                <th>Nilai CF</th>
                            </tr>
                        </thead>
                        <tbody id="diagnosisDetailTable">
                            <!-- Detail diagnosis akan ditambahkan di sini oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.edit-item-btn');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    fetch(`/diagnosis/detail/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            let tableBody = '';
                            data.forEach((item, index) => {
                                tableBody += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.kode_penyakit}</td>
                                    <td>${item.nama_penyakit}</td>
                                    <td>${item.id_gejala}</td>
                                    <td>${item.nilai_cf}</td>
                                </tr>
                            `;
                            });
                            document.getElementById('diagnosisDetailTable').innerHTML =
                                tableBody;
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection
