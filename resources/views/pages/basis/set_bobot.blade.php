@extends('layouts.main')
@section('content')
    @include('layouts.head')
    <div class="page-content">
        @include('component.SweetAlert')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Set Bobot AHP</h4>
                        </div>
                        <div class="card-body">
                            <form action="/basis/store" enctype="multipart/form-data" class="form-steps" autocomplete="off"
                                method="post">
                                @csrf
                                @method('POST')

                                <div class="step-arrow-nav mb-4">
                                    <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="perbandingan-tab" data-bs-toggle="pill"
                                                data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                                aria-controls="steparrow-gen-info" aria-selected="true">Matriks
                                                Perbandingan</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="normalisasi-tab" data-bs-toggle="pill"
                                                data-bs-target="#normalisasi" type="button" role="tab"
                                                aria-controls="normalisasi" aria-selected="false">Normalisasi</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-experience" type="button" role="tab"
                                                aria-controls="pills-experience" aria-selected="false">Selesai</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="steparrow-gen-info" role="tabpanel"
                                        aria-labelledby="perbandingan-tab">
                                        <div>
                                            <table class="table table-bordered" id="customerTable">
                                                <thead>
                                                    <tr>
                                                        <th>Kode</th>
                                                        @foreach ($basisDetails as $headerDetail)
                                                            <th style="text-align: center">
                                                                {{ $headerDetail->gejala->kode_gejala }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($basisDetails as $rowDetail)
                                                        <tr>
                                                            <td>{{ $rowDetail->gejala->kode_gejala }}</td>
                                                            @foreach ($basisDetails as $colDetail)
                                                                <td>
                                                                    <input type="text" class="form-control basis-input"
                                                                        data-row="{{ $rowDetail->id_gejala }}"
                                                                        data-col="{{ $colDetail->id_gejala }}"
                                                                        @if ($rowDetail->id_gejala == $colDetail->id_gejala) value="1" disabled
                                                                        @elseif ($rowDetail->id_gejala < $colDetail->id_gejala) onchange="updateMatrix(this)"
                                                                        @elseif ($rowDetail->id_gejala > $colDetail->id_gejala && (float) $colDetail->input != 0) value="{{ 1 / (float) $colDetail->input }}" disabled
                                                                        @else value="" disabled @endif>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Jumlah</th>
                                                        @foreach ($basisDetails as $headerDetail)
                                                            <th style="text-align: center"
                                                                id="sum-{{ $headerDetail->id_gejala }}"></th>
                                                        @endforeach
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button" id="nextButton"
                                                class="btn btn-success btn-label right ms-auto nexttab"
                                                data-nexttab="normalisasi-tab">
                                                <i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Selanjutnya
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="normalisasi" role="tabpanel"
                                        aria-labelledby="normalisasi-tab">
                                        <table class="table table-bordered" id="normalisasiTable">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    @foreach ($basisDetails as $headerDetail)
                                                        <th style="text-align: center">
                                                            {{ $headerDetail->gejala->kode_gejala }}</th>
                                                    @endforeach
                                                    <th style="text-align: center">Jumlah</th>
                                                    <th style="text-align: center">Bobot Prioritas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($basisDetails as $rowDetail)
                                                    <tr>
                                                        <td>{{ $rowDetail->gejala->kode_gejala }}</td>
                                                        @foreach ($basisDetails as $colDetail)
                                                            <td style="text-align: center" class="normalisasi-value"
                                                                data-row="{{ $rowDetail->id_gejala }}"
                                                                data-col="{{ $colDetail->id_gejala }}">
                                                            </td>
                                                        @endforeach
                                                        <td style="text-align: center" class="row-sum"
                                                            id="row-sum-{{ $rowDetail->id_gejala }}"></td>
                                                        <td style="text-align: center" class="row-priority"
                                                            id="row-priority-{{ $rowDetail->id_gejala }}"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button" class="btn btn-light btn-label previestab"
                                                data-previous="steparrow-gen-info-tab">
                                                <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back
                                                to General
                                            </button>
                                            <button type="button" id="calculateButton"
                                                class="btn btn-success btn-label right ms-auto nexttab"
                                                data-nexttab="pills-experience-tab">
                                                <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Hitung
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-experience" role="tabpanel">
                                        <table class="table table-bordered" id="rasioTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Kode Gejala</th>
                                                    <th style="text-align: center">Jumlah Perbaris</th>
                                                    <th style="text-align: center">Bobot Prioritas</th>
                                                    <th style="text-align: center">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($basisDetails as $rowDetail)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            {{ $rowDetail->gejala->kode_gejala }}</td>
                                                        <td id="sum-row-{{ $rowDetail->id_gejala }}"></td>
                                                        <td id="priority-row-{{ $rowDetail->id_gejala }}">0.3</td>
                                                        <td id="result-row-{{ $rowDetail->id_gejala }}"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Jumlah Ratio</th>
                                                    <th class="total-result" id="total-result"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <table class="table table-bordered" id="rasioTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="text-align: center">Keterangan</th>
                                                    <th style="text-align: center">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Jumlah Ratio</th>
                                                    <td id="rasio"></td>
                                                </tr>
                                                <tr>
                                                    <th>n kriteria</th>
                                                    <td>
                                                        @php
                                                            $totalIds = $basisDetails->count();
                                                            echo $totalIds;
                                                        @endphp
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Lamda Max</th>
                                                    <td id="lamda-max"></td>
                                                </tr>
                                                <tr>
                                                    <th>Consistency Index</th>
                                                    <td id="consistency-index"></td>
                                                </tr>
                                                <tr>
                                                    <th>Consistency Ratio</th>
                                                    <td id="consistency-ratio">0.05</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <div class="avatar-md mt-5 mb-4 mx-auto">
                                                <div class="avatar-title bg-light text-success display-4 rounded-circle">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                </div>
                                            </div>
                                            <h5>Bobot Konsisten !</h5>
                                            <p class="text-muted">Bobot Prioritas dapat digunakan apabila Consistency Ratio
                                                (CR) bernilai Kurang dari 0,1 </p>
                                            <button type="button" id="your-button-id"
                                                class="btn btn-success btn-label right ms-auto Simpantab"
                                                data-savetab="normalisasi-tab">
                                                <i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Simpan
                                                Bobot
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#your-button-id').on('click', function() {
            var consistencyRatio = parseFloat($('#consistency-ratio').text());
            if (consistencyRatio < 0.1) {
                var idBasis =
                    '{{ $basisDetails->first()->id_basis }}' // Sesuaikan dengan cara Anda mendapatkan id_basis

                var jumlahRatio = $('#rasio').text();
                var nKriteria = {{ $basisDetails->count() }};
                var lamdaMax = $('#lamda-max').text();
                var consistencyIndex = $('#consistency-index').text();
                var bobotPrioritas = $('#priority-row-' + idBasis).text();
                var idPenyakit = $('#id_penyakit').val(); // Sesuaikan dengan cara Anda mendapatkan id_penyakit

                var basisDetails = [];

                @foreach ($basisDetails as $rowDetail)
                    var idGejala = '{{ $rowDetail->id_gejala }}';
                    var bobotPrioritas = parseFloat($('#priority-row-' + idGejala).text());

                    basisDetails.push({
                        id_gejala: idGejala,
                        bobot_prioritas: bobotPrioritas
                    });
                @endforeach

                $.ajax({
                    url: '{{ route('store-basis-detail') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_basis: idBasis,
                        id_penyakit: idPenyakit,
                        basisDetails: basisDetails
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Data Basis Detail berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan data Basis. Pesan kesalahan: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Terjadi kesalahan saat mengirim data Basis. ' + errorMessage);
                    }
                });

                $.ajax({
                    url: '{{ route('save-ahp-data') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_basis: idBasis,
                        jumlah_ratio: jumlahRatio,
                        n_kriteria: nKriteria,
                        lamda_max: lamdaMax,
                        consistency_index: consistencyIndex,
                        consistency_ratio: consistencyRatio
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Data AHP berhasil disimpan!');
                        } else {
                            alert('Gagal menyimpan data AHP.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengirim data AHP.');
                    }
                });
            } else {
                alert('Consistency Ratio harus kurang dari 0.1');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            updateAllSums();
            document.getElementById('nextButton').addEventListener('click', updateNormalizationTable);
            document.getElementById('calculateButton').addEventListener('click', calculateResults);

        });

        function updateMatrix(input) {
            const rowId = input.dataset.row;
            const colId = input.dataset.col;
            const reciprocalInput = document.querySelector(`[data-row="${colId}"][data-col="${rowId}"]`);
            reciprocalInput.value = 1 / parseFloat(input.value);
            updateAllSums();
        }

        function updateAllSums() {
            const basisDetails = @json($basisDetails);
            basisDetails.forEach(detail => {
                const colId = detail.id_gejala;
                let sum = 0;
                document.querySelectorAll(`[data-col="${colId}"]`).forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        sum += value;
                    }
                });
                document.getElementById(`sum-${colId}`).innerText = sum.toFixed(2); // Format to 2 decimal places
            });
        }

        function updateNormalizationTable() {
            const basisDetails = @json($basisDetails);
            const sums = {};
            basisDetails.forEach(detail => {
                const colId = detail.id_gejala;
                sums[colId] = parseFloat(document.getElementById(`sum-${colId}`).innerText);
            });

            basisDetails.forEach(rowDetail => {
                let rowSum = 0;
                basisDetails.forEach(colDetail => {
                    const rowId = rowDetail.id_gejala;
                    const colId = colDetail.id_gejala;
                    const cellValue = parseFloat(document.querySelector(
                        `[data-row="${rowId}"][data-col="${colId}"]`).value);
                    const normalizedValue = cellValue / sums[colId];
                    document.querySelector(
                        `#normalisasiTable .normalisasi-value[data-row="${rowId}"][data-col="${colId}"]`
                    ).innerText = normalizedValue.toFixed(2); // Format to 2 decimal places
                    rowSum += normalizedValue;
                });
                document.getElementById(`row-sum-${rowDetail.id_gejala}`).innerText = rowSum.toFixed(
                    2); // Format to 2 decimal places
                document.getElementById(`row-priority-${rowDetail.id_gejala}`).innerText = (rowSum / basisDetails
                    .length).toFixed(2); // Format to 2 decimal places
            });

            document.querySelector(`[data-bs-target="#normalisasi"]`).click();
        }

        function calculateResults() {
            const basisDetails = @json($basisDetails);
            const totalIds = basisDetails.length;
            const priorities = {};

            basisDetails.forEach(detail => {
                const rowId = detail.id_gejala;
                priorities[rowId] = parseFloat(document.getElementById(`row-priority-${rowId}`).innerText);
            });

            basisDetails.forEach(rowDetail => {
                const rowId = rowDetail.id_gejala;
                const rowSum = parseFloat(document.getElementById(`sum-${rowId}`).innerText);
                const priority = priorities[rowId];
                const result = rowSum * priority;

                document.getElementById(`sum-row-${rowId}`).innerText = rowSum.toFixed(2);
                document.getElementById(`priority-row-${rowId}`).innerText = priority.toFixed(2);
                document.getElementById(`result-row-${rowId}`).innerText = result.toFixed(2);
            });

            const totalResult = basisDetails.reduce((acc, detail) => {
                const rowId = detail.id_gejala;
                const result = parseFloat(document.getElementById(`result-row-${rowId}`).innerText);
                return acc + result;
            }, 0);

            document.getElementById('total-result').innerText = totalResult.toPrecision(
                3);
            document.getElementById('rasio').innerText = totalResult.toPrecision(
                3);

            const lamdaMax = totalResult / totalIds;
            document.getElementById('lamda-max').innerText = lamdaMax.toPrecision(
                3);

            const consistencyIndex = (lamdaMax - totalIds) / (totalIds - 1);
            document.getElementById('consistency-index').innerText = consistencyIndex.toPrecision(
                3);

            const randomIndex = getRandomIndex(totalIds);
            const consistencyRatio = consistencyIndex / randomIndex;
            document.getElementById('consistency-ratio').innerText = consistencyRatio.toPrecision(
                3);

            document.querySelector(`[data-bs-target="#pills-experience"]`).click();
        }

        function getRandomIndex(n) {
            const randomIndexTable = {
                1: 0.00,
                2: 0.00,
                3: 0.58,
                4: 0.90,
                5: 1.12,
                6: 1.24,
                7: 1.32,
                8: 1.41,
                9: 1.45,
                10: 1.49
            };
            return randomIndexTable[n] || 1.49;
        }
    </script>
@endsection
