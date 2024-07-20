@extends('layouts.auth.mainAuth')
@section('contentAuth')
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        @include('component.SweetAlert')
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100 auth-one-bg-position">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            {{-- <div class="mb-4">
                                                <a href="index.html" class="d-block">
                                                    <img src="{{ asset('velzon/assets/images/pakar-logo-light.png') }}"
                                                        alt="" height="25">
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Selamat Datang!</h5>
                                        </div>
                                        <div class="mt-4">
                                            <form action="{{ route('login_proses') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Masukan Username"
                                                        value="{{ old('username') }}">
                                                    @error('username')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            placeholder="Masukan Password" id="password-input"
                                                            name="password" value="{{ old('password') }}">
                                                        @error('password')
                                                            <small>{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Remember
                                                        me</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-info w-100" type="submit">Masuk</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> SPA Kucing Persia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
