{{-- diagnosis.blade --}}
@include('layouts.head')

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <div class="layout-wrapper landing">
        <section class="section pb-0 hero-section" id="hero">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-28 col-sm-22">
                        <div class="text-center mt-lg-2 pt-2">
                            <h1 class="display-6 fw-semibold mb-1 lh-base">Cek Kesehatan
                                <span class="text-success">Kucing Persia</span> Anda
                            </h1>
                            <p class="lead text-muted lh-base">Dengan Cara Memasukan Tingkat Keyakinan Setiap Gejala
                                Yang dialami kucing anda.</p>
                        </div>
                        <div class="mt-4 mt-sm-3 pt-sm-2 mb-sm-n5 demo-carousel">
                            <div class="demo-img-patten-top d-none d-sm-block">
                                <img src="{{ asset('velzon/assets/images/landing/img-pattern.png') }}"
                                    class="d-block img-fluid" alt="...">
                            </div>
                            <div class="demo-img-patten-bottom d-none d-sm-block">
                                <img src="{{ asset('velzon/assets/images/landing/img-pattern.png') }}"
                                    class="d-block img-fluid" alt="...">
                            </div>
                            <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <form action="{{ route('diagnosis.calculate') }}" method="POST">
                                    <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                        <div class="table-responsive table-card">
                                            @csrf
                                            <table class="table table-nowrap table-striped-columns mb-6"
                                                style="width: 100%;">
                                                <thead class="table-light text-center">
                                                    <tr>
                                                        <th scope="col" style="width: 5%;">No</th>
                                                        <th scope="col" style="width: 20%;">Kode Gejala</th>
                                                        <th scope="col" style="width: 50%;">Nama Gejala</th>
                                                        <th scope="col" style="width: 25%;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gejalas as $index => $gejala)
                                                        <tr>
                                                            <td class="text-center">{{ $index + 1 }}</td>
                                                            <td class="text-center">{{ $gejala->kode_gejala }}</td>
                                                            <td>{{ $gejala->nama_gejala }}</td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="gejala[{{ $gejala->id_gejala }}]">
                                                                    <option value="0">Pilih Keyakinan</option>
                                                                    <option value="0">Tidak Tahu</option>
                                                                    <option value="0.2">Tidak Yakin</option>
                                                                    <option value="0.4">Mungkin</option>
                                                                    <option value="0.6">Kemungkinan Besar</option>
                                                                    <option value="0.8">Hampir Pasti</option>
                                                                    <option value="1">Pasti</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-success btn-label right ms-auto">
                                                <i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Diagnosis
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
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
