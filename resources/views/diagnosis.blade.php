@include('layouts.head')

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
                                <div class="accordion custom-accordionwithicon accordion-flush accordion-fill-secondary"
                                    id="accordionFill2">
                                    <form action="{{ route('diagnosis.calculate') }}" method="POST">
                                        @csrf
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionFill2Example1">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#accor_fill21"
                                                    aria-expanded="true" aria-controls="accor_fill21">
                                                    Biodata
                                                </button>
                                            </h2>
                                            <div id="accor_fill21" class="accordion-collapse collapse show"
                                                aria-labelledby="accordionFill2Example1"
                                                data-bs-parent="#accordionFill2">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="firstNameinput" class="form-label">Nama
                                                                    Pemilik</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_pemilik">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="lastNameinput" class="form-label">Nama
                                                                    Kucing</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_kucing">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="phonenumberInput" class="form-label">Phone
                                                                    Number</label>
                                                                <input type="text" class="form-control"
                                                                    name="no_hp">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="emailidInput"
                                                                    class="form-label">Email</label>
                                                                <input type="email" class="form-control"
                                                                    name="email">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="address1ControlTextarea"
                                                                    class="form-label">Alamat</label>
                                                                <input type="text" class="form-control"
                                                                    name="alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionFill2Example2">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#accor_fill22"
                                                    aria-expanded="false" aria-controls="accor_fill22">
                                                    Diagnosis
                                                </button>
                                            </h2>
                                            <div id="accor_fill22" class="accordion-collapse collapse"
                                                aria-labelledby="accordionFill2Example2"
                                                data-bs-parent="#accordionFill2">
                                                <div class="accordion-body">
                                                    <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                                        <div class="table-responsive table-card">
                                                            <table class="table table-nowrap table-striped-columns mb-6"
                                                                style="width: 100%;">
                                                                <thead class="table-light text-center">
                                                                    <tr>
                                                                        <th scope="col" style="width: 20%;">Kode
                                                                            Gejala</th>
                                                                        <th scope="col" style="width: 50%;">Nama
                                                                            Gejala</th>
                                                                        <th scope="col" style="width: 25%;">Aksi
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="gejala-table-body">
                                                                    @foreach ($gejalas as $index => $gejala)
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                {{ $gejala->kode_gejala }}</td>
                                                                            <td>{{ $gejala->nama_gejala }}</td>
                                                                            <td>
                                                                                <select class="form-control"
                                                                                    name="gejala[{{ $gejala->id_gejala }}]">
                                                                                    <option value="0">Pilih
                                                                                        Keyakinan</option>
                                                                                    <option value="0">Tidak Tahu
                                                                                    </option>
                                                                                    <option value="0.2">Tidak Yakin
                                                                                    </option>
                                                                                    <option value="0.4">Mungkin
                                                                                    </option>
                                                                                    <option value="0.6">Kemungkinan
                                                                                        Besar</option>
                                                                                    <option value="0.8">Hampir Pasti
                                                                                    </option>
                                                                                    <option value="1">Pasti
                                                                                    </option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-1 mt-2 mx-2">
                                                            <div class="d-flex align-items-center">
                                                                <a href="/" class="btn btn-light btn-label"
                                                                    id="back-button" style="display: none;">
                                                                    <i
                                                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                                    Kembali
                                                                </a>
                                                                <button type="button" class="btn btn-secondary ms-1"
                                                                    id="previous-page"
                                                                    style="display: none;">Previous</button>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-secondary ms-2"
                                                                    id="next-page">Next</button>
                                                                <button type="submit"
                                                                    class="btn btn-success btn-label right ms-2"
                                                                    id="diagnosis-button" style="display: none;">
                                                                    <i
                                                                        class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Diagnosis
                                                                </button>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="d-flex bd-highlight mb-1 mt-2">
                                                            <div class="me-auto p-2 bd-highlight">
                                                                <a href="/" class="btn btn-light btn-label">
                                                                    <i
                                                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                                    Kembali
                                                                </a>
                                                            </div>
                                                            <div class="p-2 bd-highlight">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-label right ms-auto">
                                                                    <i
                                                                        class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Diagnosis
                                                                </button>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const gejalaRows = document.querySelectorAll('#gejala-table-body tr');
            const rowsPerPage = 5;
            let currentPage = 1;
            const totalPages = Math.ceil(gejalaRows.length / rowsPerPage);

            const previousPageButton = document.getElementById('previous-page');
            const nextPageButton = document.getElementById('next-page');
            const diagnosisButton = document.getElementById('diagnosis-button');
            const backButton = document.getElementById('back-button');

            function displayPage(page) {
                gejalaRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) {
                        row.style.display = 'table-row';
                    }
                });
                previousPageButton.style.display = page === 1 ? 'none' : 'inline-block';
                nextPageButton.style.display = page === totalPages ? 'none' : 'inline-block';
                diagnosisButton.style.display = page === totalPages ? 'inline-block' : 'none';
                backButton.style.display = page === 1 ? 'inline-block' : 'none';
            }

            previousPageButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayPage(currentPage);
                }
            });

            nextPageButton.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    displayPage(currentPage);
                }
            });

            displayPage(currentPage);

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin dengan pilihan gejala Anda?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/plugins.js') }}"></script>
</body>
