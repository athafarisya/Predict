@extends('layouts.main.navbaradmin')
@section('title', 'Dashboard')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>

    <div class="row">
        {{-- Kartu Catatan Prediksi --}}
        <div class="col-md-6 d-flex">
            <div class="card text-white bg-primary mb-3 w-100">
                <div class="card-header">Jumlah Catatan Prediksi Terlambat</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahData }}</h5>
                </div>
            </div>
        </div>

        {{-- Kartu Jumlah Mahasiswa --}}
        <div class="col-md-6 d-flex">
            <div class="card text-white bg-success mb-3 w-100">
                <div class="card-header">Jumlah Mahasiswa</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahMahasiswa }}</h5>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-dark">Data Prediksi Kelulusan per Tahun</h3>

    <canvas id="chartPrediksi" height="100"></canvas>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const formattedData = @json($formattedData);

        const labels = formattedData.map(item => item.tahun);
        const dataTepatWaktu = formattedData.map(item => item.tepat_waktu);
        const dataTidakTepatWaktu = formattedData.map(item => item.tidak_tepat_waktu);

        const ctx = document.getElementById('chartPrediksi').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Lulus Tepat Waktu',
                        data: dataTepatWaktu,
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        stack: 'Stack 0'
                    },
                    {
                        label: 'Lulus Tidak Tepat Waktu',
                        data: dataTidakTepatWaktu,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        stack: 'Stack 0'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        // text: 'Prediksi Kelulusan Mahasiswa per Tahun'
                    },
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection
