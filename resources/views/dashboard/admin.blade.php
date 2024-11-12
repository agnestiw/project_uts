@extends('layout.main')
@section('page-title', 'Dashboard')
@section('page-subTitle', 'Dashboard Admin')
@section('content')

    <div class="container-fluid">
        <h1 class="my-4">Dashboard Saham</h1>

        <div class="row">
            <!-- Top Stats -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-text">{{ $total_emitens }}</h2>
                        <p class="text-primary fw-bold">Jumlah Emiten</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-text">
                            @if ($total_volume >= 1000000000000)
                                {{ number_format($total_volume / 1000000000000, 1) }}T
                            @elseif($total_volume >= 1000000000)
                                {{ number_format($total_volume / 1000000000, 1) }}B
                            @elseif($total_volume >= 1000000)
                                {{ number_format($total_volume / 1000000, 1) }}M
                            @else
                                {{ number_format($total_volume) }}
                            @endif
                        </h2>
                        <p class="text-primary fw-bold">Volume Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-text">
                            @php
                                // Convert scientific notation to a normal number
                                $total_value = (float) $total_value;

                                // Format number
                                if ($total_value >= 1000000000000) {
                                    // Trillion case (for numbers larger than 1 trillion)
                                    echo number_format($total_value / 1000000000000, 1) . 'T';
                                } elseif ($total_value >= 1000000000) {
                                    // Billion case
                                    echo number_format($total_value / 1000000000, 1) . 'B';
                                } elseif ($total_value >= 1000000) {
                                    // Million case
                                    echo number_format($total_value / 1000000, 1) . 'M';
                                } else {
                                    // Less than a million
                                    echo number_format($total_value);
                                }
                            @endphp</h2>
                        <p class="text-primary fw-bold">Value Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-text">{{ $total_frequency }}</h2>
                        <p class="text-primary fw-bold">Jumlah Frekuensi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Table -->
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Tabel Transaksi</div>
                    <div class="card-body">
                        <table class="table table-striped" id="transaction_table">
                            <thead>
                                <tr>
                                    <th>Stock Code</th>
                                    <th>Date Transaction</th>
                                    <th>Sum of Volume</th>
                                    <th>Sum of Value</th>
                                    <th>Sum of Frequency</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->stock_code }}</td>
                                        <td>{{ $transaction->date_transaction }}</td>
                                        <td>{{ $transaction->sum_volume }}</td>
                                        <td>{{ $transaction->sum_value }}</td>
                                        <td>{{ $transaction->sum_frequency }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card h-100">
                    <div class="card-header">Frekuensi Bulanan</div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mt-4">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">Volume Transaksi per Hari</div>
                    <div class="card-body">
                        <canvas id="barChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">Grafik Harga Close</div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#transaction_table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    text: 'Download PDF',
                    filename: 'transaction_report', 
                    orientation: 'landscape',
                    pageSize: 'A4', 
                    customize: function(doc) {
                        
                        doc.styles.title = {
                            fontSize: 14,
                            bold: true,
                            alignment: 'center'
                        };
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 12,
                            color: 'black'
                        };
                        doc.content[1].table.widths = [
                            '20%', '20%', '20%', '20%', '20%' // Adjust column widths here
                        ];
                        doc.content.splice(0, 0, {
                            text: 'Laporan Transaksi Saham',
                            fontSize: 24,
                            color: 'blue',
                            bold: true,
                            margin: [0, 0, 0, 12],
                            alignment: 'center'
                        });
                        doc.footer = function(currentPage, pageCount) {
                            return {
                                text: currentPage.toString() + ' of ' + pageCount,
                                alignment: 'center',
                                margin: [0, 10, 0, 0]
                            };
                        };
                    }
                }],
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true
            });
        });
    </script>

    <script>
        // Pie Chart Data from Blade
        var pieData = @json($pie_data);

        // Prepare labels and values for the pie chart
        var pieLabels = Object.keys(pieData);
        var pieValues = Object.values(pieData);

        // Create Pie Chart
        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieValues,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                }]
            }
        });

        // Line Chart Data from Blade
        var lineLabels = @json($dates);
        var prices = @json($prices);

        // Prepare datasets for the line chart
        var lineDatasets = [];
        Object.keys(prices).forEach(function(emiten) {
            lineDatasets.push({
                label: emiten,
                data: prices[emiten],
                fill: false,
                borderColor: getRandomColor(),
            });
        });

        // Create Line Chart
        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: lineLabels,
                datasets: lineDatasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price (in IDR)'
                        }
                    }
                }
            }
        });

        // Function to generate random color for the line chart
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Bar Chart Data from Blade
        var barLabels = @json($bar_labels); // Labels for Bar Chart
        var barValues = @json($bar_values); // Data for Bar Chart

        // Create Bar Chart
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [{
                    label: 'Volume Transaksi',
                    data: barValues,
                    backgroundColor: '#36A2EB',
                    borderColor: '#36A2EB',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Volume'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    }
                }
            }
        });
    </script>
@endsection