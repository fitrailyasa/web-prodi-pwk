@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Statistics Boxes -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalBerita }}</h3>
                        <p>Total Berita</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <a href="{{ route('admin.berita.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalEvents }}</h3>
                        <p>Total Events</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <a href="{{ route('admin.event.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalJadwal }}</h3>
                        <p>Total Jadwal</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <a href="{{ route('admin.jadwal.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>


        <!-- Recent Activity -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Berita</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($recentBerita as $berita)
                                <li class="item">
                                    <div class="product-info">
                                        <a href="{{ route('admin.berita.index') }}" class="product-title">
                                            {{ $berita->judul }}
                                            <span
                                                class="badge badge-info float-right">{{ $berita->created_at->diffForHumans() }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Events</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($recentEvents as $event)
                                <li class="item">
                                    <div class="product-info">
                                        <a href="{{ route('admin.event.index') }}" class="product-title">
                                            {{ $event->judul }}
                                            <span
                                                class="badge badge-info float-right">{{ $event->created_at->diffForHumans() }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Jadwal</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($recentJadwal as $jadwal)
                                <li class="item">
                                    <div class="product-info">
                                        <a href="{{ route('admin.jadwal.index') }}" class="product-title">
                                            {{ $jadwal->judul }}
                                            <span
                                                class="badge badge-info float-right">{{ $jadwal->created_at->diffForHumans() }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Monthly Statistics Chart
                const monthlyCtx = document.getElementById('monthlyChart');
                if (monthlyCtx) {
                    new Chart(monthlyCtx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                'Nov', 'Dec'
                            ],
                            datasets: [{
                                label: 'Berita',
                                data: @json($monthlyBerita),
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1,
                                fill: false
                            }, {
                                label: 'Events',
                                data: @json($monthlyEvents),
                                borderColor: 'rgb(255, 159, 64)',
                                tension: 0.1,
                                fill: false
                            }, {
                                label: 'Jadwal',
                                data: @json($monthlyJadwal),
                                borderColor: 'rgb(255, 99, 132)',
                                tension: 0.1,
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                }

                // Content Distribution Chart
                const contentCtx = document.getElementById('contentChart');
                if (contentCtx) {
                    new Chart(contentCtx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Berita', 'Events', 'Jadwal', 'Mata Kuliah', 'Modul'],
                            datasets: [{
                                data: [
                                    {{ $totalBerita }},
                                    {{ $totalEvents }},
                                    {{ $totalJadwal }},
                                    {{ $totalMatkul }},
                                    {{ $totalModul }}
                                ],
                                backgroundColor: [
                                    'rgb(75, 192, 192)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)'
                                ]
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
