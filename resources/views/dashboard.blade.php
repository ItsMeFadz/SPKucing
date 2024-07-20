@extends('layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 id="greeting" class="fs-16 mb-1">Selamat Pagi, {{ $currentUser->nama }}</h4>
                                        <p class="text-muted mb-0">Semoga Harimu Menyenangkan Selalu.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">
                                            <div class="row g-3 mb-0 align-items-center">
                                                <div class="col-sm-auto">
                                                    <div class="input-group">
                                                        <input type="text" id="datePicker"
                                                            class="form-control border-0 dash-filter-picker shadow"
                                                            data-provider="flatpickr" data-range-date="true"
                                                            data-date-format="d M, Y">
                                                        <div class="input-group-text bg-primary border-primary text-white">
                                                            <i class="ri-calendar-2-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class=" fw-medium text-success text-truncate mb-0">
                                                    Jumlah Gejala</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                    <span class="counter-value"
                                                        data-target="{{ $totalGejala }}">{{ $totalGejala }}</span>
                                                    <span>Gejala</span>
                                                </h4>
                                                <a href="/gejala" class="text-decoration-underline">Kunjungi Halaman</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title rounded fs-3">
                                                    <i class="ri ri-stack-line"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class=" fw-medium text-success text-truncate mb-0">
                                                    Jumlah Penyakit</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                        data-target="{{ $totalPenyakit }}">{{ $totalPenyakit }}</span>
                                                    <span>Penyakit</span>
                                                </h4>
                                                <a href="/penyakit" class="text-decoration-underline">Kunjungi Halaman</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info rounded fs-3">
                                                    <i class="ri-folder-open-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class=" text-success fw-medium text-truncate mb-0">
                                                    Jumlah Artikel</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                        data-target="{{ $totalArtikel }}">{{ $totalArtikel }}</span>
                                                    <span>Artikel</span>
                                                </h4>
                                                <a href="/artikel" class="text-decoration-underline">Kunjungi Halaman</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-primary rounded fs-3">
                                                    <i class="ri-git-repository-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class=" fw-medium text-success text-truncate mb-0">
                                                    Jumlah User</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                        data-target="{{ $totalUser }}">{{ $totalUser }}</span>
                                                    <span>User</span>
                                                </h4>
                                                <a href="/user" class="text-decoration-underline">Kunjungi Halaman</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info rounded fs-3">
                                                    <i class="ri-user-add-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var datePicker = document.getElementById('datePicker');
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            var todayStr = dd + ' ' + today.toLocaleString('en-GB', {
                month: 'short'
            }) + ', ' + yyyy;

            flatpickr(datePicker, {
                dateFormat: "d M, Y",
                defaultDate: [todayStr, todayStr],
                mode: "range"
            });

            // Set greeting based on current time
            var greetingElement = document.getElementById('greeting');
            var currentHour = today.getHours();
            var greetingText = "Selamat Pagi";

            if (currentHour >= 0 && currentHour < 12) {
                greetingText = "Selamat Pagi";
            } else if (currentHour >= 12 && currentHour < 15) {
                greetingText = "Selamat Siang";
            } else if (currentHour >= 15 && currentHour < 18) {
                greetingText = "Selamat Sore";
            } else {
                greetingText = "Selamat Malam";
            }

            greetingElement.textContent = greetingText + ", {{ $currentUser->nama }}";
        });
    </script>
@endsection
