@include('layouts.head')

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing navbar-light fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('velzon/assets/images/pakar-logo-dark.png') }}" class="card-logo card-logo-dark"
                        alt="logo dark" height="20">
                    <img src="{{ asset('velzon/assets/images/sipakar-landing.png') }}" class="card-logo card-logo-light"
                        alt="logo light" height="20">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#metode">Metode</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentangkita">Tentang Kita</a>
                        </li>
                    </ul>
                    <div class="">
                        <a href="/login" class="btn btn-success">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-overlay bg-overlay-pattern"></div>
        <section class="section nft-hero" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-sm-10">
                        <div class="text-center">
                            <h1 class="display-4 fw-medium mb-4 lh-base text-white">Sistem Pakar Diagnosis Penyakit
                                <span class="text-success"> Kulit Kucing Persia</span>
                            </h1>
                            <p class="lead text-white-50 lh-base mb-4 pb-2">Sistem Ini Berfungsi
                                Untuk Mendiagnosis Penyakit Kulit Pada Kucing Persia <br> Berdasarkan Gejala Yang
                                dialaminya.
                            </p>
                            <div class="hstack gap-4 justify-content-center">
                                <a href="/diagnosis" class="btn btn-danger">Mulai Diagnosis <i
                                        class="ri-arrow-right-line align-middle ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start wallet -->
        <section class="section" id="metode">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base">Metode</h2>
                            <p class="text-muted">Metode yang digunakan penulis untuk mendiagnosis
                                penyakit kulit pada kucing persia adalah metode Analytical Hierarchy Process (AHP) dan
                                Certainty Factor (CF).</p>
                        </div>
                    </div>
                </div>
                <div class="row g-4 d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none h-100">
                            <div class="card-body py-5 px-4 d-flex flex-column">
                                <img src="{{ asset('velzon/assets/images/ahp.svg') }}" alt="" height="55"
                                    class="mb-3 pb-2">
                                <h5>Metode Ananiltichal Hierarchy Process (AHP)</h5>
                                <p class="text-muted pb-1">AHP merupakan suatu model pendukung keputusan yang
                                    dikembangkan oleh Thomas L. Saaty. Model pendukung keputusan ini akan menguraikan
                                    masalah multi faktor atau multi kriteria yang kompleks menjadi suatu hirarki,
                                    menurut Saaty (1993), hirarki didefinisikan sebagai suatu representasi dari sebuah
                                    permasalahan yang kompleks dalam suatu struktur multi-level dimana level pertama
                                    adalah tujuan, yang diikuti level faktor, kriteria, sub kriteria, dan seterusnya ke
                                    bawah hingga level terakhir dari alternatif. Dengan hirarki, suatu masalah yang
                                    kompleks dapat diuraikan ke dalam kelompok-kelompoknya yang kemudian diatur menjadi
                                    suatu bentuk hirarki sehingga permasalahan akan tampak lebih terstruktur dan
                                    sistematis.</p>
                                {{-- <a href="#!" class="btn btn-info">Change Wallet</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none h-100">
                            <div class="card-body py-5 px-4 d-flex flex-column">
                                <img src="{{ asset('velzon/assets/images/cf.svg') }}" alt="" height="55"
                                    class="mb-3 pb-2">
                                <h5>Certainty Factor (CF)</h5>
                                <p class="text-muted pb-1">Metode Certainty Factor (CF) adalah salah satu teknik dalam
                                    sistem pakar yang digunakan untuk menangani ketidakpastian dalam penalaran.
                                    Certainty Factor digunakan untuk merepresentasikan tingkat keyakinan seorang pakar
                                    terhadap suatu hipotesis atau kesimpulan berdasarkan bukti yang tersedia. Teknik ini
                                    diperkenalkan oleh Shortliffe dan Buchanan dalam sistem MYCIN untuk diagnosis
                                    penyakit infeksi bakteri dan rekomendasi pengobatan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .card-body {
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    }

                    .card-body p {
                        flex-grow: 1;
                    }
                </style>
            </div>
        </section>
        <!-- start marketplace -->
        <section class="section bg-light" id="artikel">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base">Artikel</h2>
                            <p class="text-muted mb-4">Collection widgets specialize in displaying many elements of the
                                same type, such as a collection of pictures from a collection of articles.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="news" role="tabpanel">
                    <div class="row">
                        @foreach ($artikels as $artikel)
                            <div class="col-lg-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-sm-flex">
                                            <div class="flex-shrink-0">
                                                @if ($artikel->gambar)
                                                    <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                                        alt="Gambar Artikel" width="80">
                                                @else
                                                    <p>Gambar tidak tersedia</p>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                <ul class="list-inline mb-2">
                                                    <li class="list-inline-item"><span
                                                            class="badge badge-soft-success fs-11">Artikel</span></li>
                                                </ul>
                                                <h5><a href="javascript:void(0);">{{ $artikel->nama_artikel }}</a></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><i
                                                            class="ri-user-3-fill text-info align-middle me-1"></i>
                                                        {{ $artikel->penulis }}</li>
                                                    <li class="list-inline-item"><i
                                                            class="ri-calendar-2-fill text-info align-middle me-1"></i>
                                                        {{ $artikel->updated_at->format('d M, Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                        @endforeach
                    </div>
                    <!--end row-->

                    <div class="mt-4">
                        <ul class="pagination pagination-separated justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a href="javascript:void(0);" class="page-link"><i
                                        class="mdi mdi-chevron-left"></i></a>
                            </li>
                            <li class="page-item active">
                                <a href="javascript:void(0);" class="page-link">1</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link"><i
                                        class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section" id="tentangkita">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base">Tentang Kita</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card explore-box card-animate border">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('velzon/assets/images/users/avatar-2.jpg') }}" alt=""
                                        class="avatar-xs rounded-circle">
                                    <div class="ms-2 flex-grow-1">
                                        <a href="#!">
                                            <h6 class="mb-0 fs-15">Fadhilah Ruhiyah</h6>
                                        </a>
                                        <p class="mb-0 text-muted fs-13">Penulis</p>
                                    </div>
                                    <div class="bookmark-icon">
                                        <button type="button" class="btn btn-icon active" data-bs-toggle="button"
                                            aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                    </div>
                                </div>
                                <div class="explore-place-bid-img overflow-hidden rounded">
                                    <img src="{{ asset('velzon/assets/images/nft/img-05.jpg') }}" alt=""
                                        class="explore-img w-100">
                                    <div class="bg-overlay"></div>
                                    <div class="place-bid-btn">
                                        <a href="#!" class="btn btn-success"><i
                                                class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fw-medium mb-0 float-end"><i
                                            class="mdi mdi-heart text-danger align-middle"></i> 19.29k </p>
                                    <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 97.8 ETH </h5>
                                    <h6 class="fs-16 mb-0"><a href="apps-nft-item-details.html"
                                            class="link-dark">Patterns arts &amp; culture</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card explore-box card-animate border">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('velzon/assets/images/users/avatar-9.jpg') }}" alt=""
                                        class="avatar-xs rounded-circle">
                                    <div class="ms-2 flex-grow-1">
                                        <a href="#!">
                                            <h6 class="mb-0 fs-15">Henry Baird</h6>
                                        </a>
                                        <p class="mb-0 text-muted fs-13">Creators</p>
                                    </div>
                                    <div class="bookmark-icon">
                                        <button type="button" class="btn btn-icon" data-bs-toggle="button"
                                            aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                    </div>
                                </div>
                                <div class="explore-place-bid-img overflow-hidden rounded">
                                    <img src="{{ asset('velzon/assets/images/nft/img-03.jpg') }}" alt=""
                                        class="explore-img w-100">
                                    <div class="bg-overlay"></div>
                                    <div class="place-bid-btn">
                                        <a href="#!" class="btn btn-success"><i
                                                class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fw-medium mb-0 float-end"><i
                                            class="mdi mdi-heart text-danger align-middle"></i> 31.64k </p>
                                    <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 475.23 ETH </h5>
                                    <h6 class="fs-16 mb-0"><a href="apps-nft-item-details.html"
                                            class="link-dark">Evolved Reality</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <img src="{{ asset('velzon/assets/images/sipakar-landing.png') }}" alt="logo light"
                                    height="17">
                            </div>
                            <div class="mt-4">
                                <p>Premium Multipurpose Admin & Dashboard Template</p>
                                <p>You can build any type of web application like eCommerce, CRM, CMS, Project
                                    management apps, Admin Panels, etc using Velzon.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Company</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list fs-14">
                                        <li><a href="pages-profile.html">About Us</a></li>
                                        <li><a href="pages-gallery.html">Gallery</a></li>
                                        <li><a href="apps-projects-overview.html">Projects</a></li>
                                        <li><a href="pages-timeline.html">Timeline</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Apps Pages</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list fs-14">
                                        <li><a href="pages-pricing.html">Calendar</a></li>
                                        <li><a href="apps-mailbox.html">Mailbox</a></li>
                                        <li><a href="apps-chat.html">Chat</a></li>
                                        <li><a href="apps-crm-deals.html">Deals</a></li>
                                        <li><a href="apps-tasks-kanban.html">Kanban Board</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Support</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list fs-14">
                                        <li><a href="pages-faqs.html">FAQ</a></li>
                                        <li><a href="pages-faqs.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">

                        <div>
                            <p class="copy-rights mb-0">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Fadz - Sispa Kucing Persia
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <ul class="list-inline mb-0 footer-social-link">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-facebook-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-github-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-linkedin-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-google-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-dribbble-line"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/plugins.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('velzon/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('velzon/assets/js/pages/nft-landing.init.js') }}"></script>
</body>

</html>
