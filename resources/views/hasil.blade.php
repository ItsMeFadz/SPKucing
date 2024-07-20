@include('layouts.head')

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <div class="layout-wrapper landing">
        <section class="section pb-0 hero-section" id="hero">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-28 col-sm-22">
                        <div class="text-center mt-lg-2 pt-2">
                            <h1 class="display-6 fw-semibold mb-3 lh-base">Hasil Diagnosis</h1>
                            <p class="lead text-muted lh-base mb-8">
                                Berdasarkan hasil diagnosis, kucing Anda didiagnosis terkena penyakit:
                                <span class="fw-bold">{{ $cfCombinePerBasis[0]['nama_penyakit'] }}</span>.
                                dengan Persentase: <span
                                    class="fw-bold">{{ number_format($cfCombinePerBasis[0]['cf_combine'] * 100, 2) }}%</span>
                            </p>
                            <div class="mt-4 mt-sm-3 pt-sm-2 mb-sm-n5 demo-carousel">
                                <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                        <div class="table-responsive table-card">
                                            <!-- Tabel hasil diagnosis -->
                                            <table class="table table-nowrap mb-6">
                                                <thead class="table-light text-center">
                                                    <tr>
                                                        <th scope="col">Kode Penyakit</th>
                                                        <th scope="col">Nama Penyakit</th>
                                                        <th scope="col">Certainty Factor (CF)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cfCombinePerBasis as $idBasis => $data)
                                                        <tr>
                                                            <td>{{ $data['kode_penyakit'] }}</td>
                                                            <td>{{ $data['nama_penyakit'] }}</td>
                                                            <td>{{ $data['cf_combine'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-start gap-2 mt-2">
                                            <a href="/diagnosis" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/plugins.js') }}"></script>
</body>
