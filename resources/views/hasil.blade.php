@include('layouts.head')

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <div class="layout-wrapper landing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-28 col-sm-22">
                    <div class="text-center mt-lg-2 pt-2">
                        <div class="mt-4 mt-sm-3 pt-sm-2 mb-sm-n5 demo-carousel">
                            <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                    <div class="d-flex flex-wrap justify-content-between mx-4 mb-3 mt-4">
                                        <div class="col-lg-4 col-md-12 mb-4 mt-5">
                                            <img src="{{ asset('velzon/assets/images/catsick.jpeg') }}"
                                                alt="Hasil Diagnosis" class="fixed-img">
                                        </div>
                                        <div class="col-lg-8 col-md-12 mb-4">
                                            <div class="keterangan" style="text-align: left">
                                                <p class="lead text-muted lh-base">
                                                    <span class="fw-bold">Kesimpulan : </span>
                                                    <br>
                                                    @if (isset($cfCombinePerBasis[0]))
                                                        Hasil diagnosis menunjukkan bahwa kucing Anda mengalami
                                                        <span class="fw-bold">{{ $jumlahPenyakit }}</span> jenis
                                                        penyakit,
                                                        penyakit yang memiliki intensitas paling tinggi adalah
                                                        <span
                                                            class="fw-bold">{{ $cfCombinePerBasis[0]['nama_penyakit'] }}</span>,
                                                        dengan persentase :
                                                        <span
                                                            class="fw-bold">{{ number_format($cfCombinePerBasis[0]['cf_combine'] * 100, 2) }}%</span>
                                                        <br>
                                                        <br>
                                                        <span class="fw-bold">Deskripsi Penyakit :</span>
                                                        <br>
                                                        <span>{{ $cfCombinePerBasis[0]['deskripsi'] }}</span>
                                                        <br>
                                                        <br>
                                                        <span class="fw-bold">Cara Penanganan :</span>
                                                        <br>
                                                        <span>{{ $cfCombinePerBasis[0]['penanganan'] }}</span>
                                                    @else
                                                        Data penyakit tidak tersedia.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-card">
                                        <div class="d-flex bd-highlight mb-1">
                                            <div class="p-2 bd-highlight">
                                                {{-- <h4 class="card-title mx-3 mt-2">Penyakit Terkait</h4> --}}
                                            </div>
                                            <div class="ms-auto p-2 mx-3 bd-highlight">
                                                <button type="button"
                                                    onclick="window.location='{{ route('unduh.pdf') }}'"
                                                    class="btn btn-success btn-label waves-effect right waves-light">
                                                    <i
                                                        class="ri-file-download-line label-icon align-middle fs-16 ms-2"></i>
                                                    Unduh Hasil
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Accordions Fill Colored -->
                                        <div class="accordion custom-accordionwithicon accordion-fill-success"
                                            id="accordionFill">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionFillExample1">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#accor_fill1"
                                                        aria-expanded="true" aria-controls="accor_fill1">
                                                        Gejala Yang Dipilih
                                                    </button>
                                                </h2>
                                                <div id="accor_fill1" class="accordion-collapse collapse show"
                                                    aria-labelledby="accordionFillExample1"
                                                    data-bs-parent="#accordionFill">
                                                    <div class="accordion-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap mb-4">
                                                                <thead class="table-light text-center">
                                                                    <tr>
                                                                        <th scope="col">Kode Gejala</th>
                                                                        <th scope="col">Nama Gejala</th>
                                                                        <th scope="col">Nilai Keyakinan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $displayedGejala = []; // Array untuk memeriksa gejala yang sudah ditampilkan
                                                                    @endphp
                                                                    @foreach ($cfCombinePerBasis as $data)
                                                                        @foreach ($data['gejala'] as $gejala)
                                                                            @if (!in_array($gejala['kode_gejala'], $displayedGejala))
                                                                                <tr>
                                                                                    <td>{{ $gejala['kode_gejala'] }}
                                                                                    </td>
                                                                                    <td>{{ $gejala['nama_gejala'] }}
                                                                                    </td>
                                                                                    <td>{{ $gejala['nilai_keyakinan'] }}
                                                                                    </td>
                                                                                </tr>
                                                                                @php
                                                                                    $displayedGejala[] =
                                                                                        $gejala['kode_gejala']; // Tambahkan gejala ke array yang sudah ditampilkan
                                                                                @endphp
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionFillExample2">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#accor_fill2"
                                                        aria-expanded="false" aria-controls="accor_fill2">
                                                        Kemungkinan Penyakit Lain
                                                    </button>
                                                </h2>
                                                <div id="accor_fill2" class="accordion-collapse collapse"
                                                    aria-labelledby="accordionFillExample2"
                                                    data-bs-parent="#accordionFill">
                                                    <div class="accordion-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap mb-4">
                                                                <thead class="table-light text-center">
                                                                    <tr>
                                                                        <th scope="col">Kode Penyakit</th>
                                                                        <th scope="col">Nama Penyakit</th>
                                                                        <th scope="col">Certainty Factor (CF)
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($cfCombinePerBasis as $idBasis => $data)
                                                                        <tr>
                                                                            <td>{{ $data['kode_penyakit'] }}</td>
                                                                            <td>{{ $data['nama_penyakit'] }}</td>
                                                                            <td>{{ number_format($data['cf_combine'] * 100, 2) }}%
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-2 mt-5">
                                        <a href="/diagnosis" class="btn btn-light btn-label">
                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                            Kembali
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

    <!-- CSS Inline -->
    <style>
        .fixed-img {
            width: 300px;
            /* Lebar tetap yang diinginkan */
            height: 300px;
            /* Tinggi tetap yang diinginkan */
            object-fit: cover;
            /* Menjaga gambar tetap proporsional */
            margin-right: 20px;
            /* Memberikan jarak antara gambar dan keterangan */
            border: 2px solid #000;
            /* Menambahkan outline pada gambar */
            border-radius: 8px;
        }
    </style>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/form-wizard.init.js') }}"></script>
</body>

</html>
