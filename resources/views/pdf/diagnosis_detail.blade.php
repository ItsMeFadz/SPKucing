<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diagnosis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Diagnosis</h1>
    @foreach ($diagnoses as $diagnosis)
        <h2>Diagnosis ID: {{ $diagnosis->id_diagnosis }}</h2>
        <p>Nama Pemilik: {{ $diagnosis->nama_pemilik }}</p>
        <p>Nama Kucing: {{ $diagnosis->nama_kucing }}</p>
        <p>No HP: {{ $diagnosis->no_hp }}</p>
        <p>Email: {{ $diagnosis->email }}</p>
        <p>Alamat: {{ $diagnosis->alamat }}</p>
        <h3>Detail Diagnosis:</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penyakit</th>
                    <th>Nama Penyakit</th>
                    <th>Kode Gejala</th>
                    <th>Nilai CF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosis->details as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->penyakit ? $detail->penyakit->kode_penyakit : 'N/A' }}</td>
                        <td>{{ $detail->penyakit ? $detail->penyakit->nama_penyakit : 'N/A' }}</td>
                        <td>{{ $detail->id_gejala }}</td>
                        <td>{{ $detail->nilai_cf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>
