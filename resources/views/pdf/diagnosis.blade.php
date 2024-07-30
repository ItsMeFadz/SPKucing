<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hasil Diagnosis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table,
        .th,
        .td {
            border: 1px solid black;
        }

        .th,
        .td {
            padding: 8px;
            text-align: left;
        }

        .th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Hasil Diagnosis</h1>
    <p>Jumlah Penyakit: {{ $jumlahPenyakit }}</p>

    @if (isset($cfCombinePerBasis[0]))
        <h2>Penyakit Tertinggi</h2>
        <p>Nama Penyakit: {{ $cfCombinePerBasis[0]['nama_penyakit'] }}</p>
        <p>Kode Penyakit: {{ $cfCombinePerBasis[0]['kode_penyakit'] }}</p>
        <p>Persentase CF: {{ number_format($cfCombinePerBasis[0]['cf_combine'] * 100, 2) }}%</p>
        <p>Deskripsi Penyakit: {{ $cfCombinePerBasis[0]['deskripsi'] }}</p>
        <p>Cara Penanganan: {{ $cfCombinePerBasis[0]['penanganan'] }}</p>
    @else
        <p>Data penyakit tidak tersedia.</p>
    @endif

    <h2>Gejala yang Dimasukan</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="th">Kode Gejala</th>
                <th class="th">Nama Gejala</th>
                <th class="th">Nilai Keyakinan</th>
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
                            <td class="td">{{ $gejala['kode_gejala'] }}</td>
                            <td class="td">{{ $gejala['nama_gejala'] }}</td>
                            <td class="td">{{ $gejala['nilai_keyakinan'] }}</td>
                        </tr>
                        @php
                            $displayedGejala[] = $gejala['kode_gejala']; // Tambahkan gejala ke array yang sudah ditampilkan
                        @endphp
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h2>Kemungkinan Penyakit</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="th">Kode Penyakit</th>
                <th class="th">Nama Penyakit</th>
                <th class="th">Certainty Factor (CF)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cfCombinePerBasis as $data)
                <tr>
                    <td class="td">{{ $data['kode_penyakit'] }}</td>
                    <td class="td">{{ $data['nama_penyakit'] }}</td>
                    <td class="td">{{ number_format($data['cf_combine'] * 100, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
