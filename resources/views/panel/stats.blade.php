@extends('panel.base')

@section('title', 'Statistics')

@section('content')
    <p class="d-block"><span class="text-white h4">Statistics</span></p>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="d-flex flex-column">
                            <p><i class="fas fa-square" style="color: rgb(54, 162, 235)"></i> <span class="text-white h5">Lucid Dreams</span></p>
                            <p class="h6">{{ round($lucidDreams/$totalDreams * 100, 2) }}% ({{ $lucidDreams }} total)</p>
                            <p><i class="fas fa-square" style="color: rgb(255, 99, 132)"></i> <span class="text-white h5">Not Lucid Dreams</span></p>
                            <p class="h6">{{ round(($totalDreams - $lucidDreams)/$totalDreams * 100, 2) }}% ({{ $totalDreams - $lucidDreams }} total)</p>
                            <p class="h6"></p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right float-end">
                        <canvas id="piechart" style="max-width: 200px; max-height: 200px">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3 mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="d-flex flex-column w-75">
                    <canvas id="labels">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src=" https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js "></script>
    <script>
        const ctx = document.getElementById('piechart');
        const labels = document.getElementById('labels');
        const data = {
            labels: [
            ],
            datasets: [{
                data: [{{$totalDreams - $lucidDreams}}, {{ $lucidDreams }}],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hover: false,
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'doughnut',
            options: {
                cutout: 80,
                borderColor: 'rgba(0,0,0,0)',
                tooltips: {
                    enabled: false
                },
                events: [],
            },
            data: data,
        };
        new Chart(ctx, config);


        new Chart(labels, {
            type: 'bar',
            data: {
                labels: [@foreach($labels as $label) "{{ $label->name }}", @endforeach],
                datasets: [{
                    axis: 'y',
                    label: 'Dream count by labels',
                    data: [@foreach($labels as $label) {{ $label->entries_count }}, @endforeach],
                    fill: false,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgb(54, 162, 235)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                tooltips: {
                    enabled: false
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                            ticks: {
                                precision: 0,
                            },
                        },
                },

                events: []

            }
        })
    </script>
@endsection
