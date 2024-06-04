<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grafik Recruitment') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="px-10 max-w-7sm justify-center gap-10 mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Rekapitulasi Recruitment Bulan <span class="font-bold">04/01/2024-04/02/2024</span></h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="text-sm text-white font-bold p-12" style="width:60%; height: 50%;">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var data = {
            labels: ["Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                "Agustus", "September"
            ],
            datasets: [{
                label: "Recruitment",
                backgroundColor: ["rgba(255,205,86,0.2)", "rgba(255,205,86,0.2)", "rgba(255,205,86,0.2)", ],
                borderColor: ["rgba(255,205,86,1)", "rgba(255,205,86,1)", "rgba(255,205,86,1)", ],
                borderWidth: 1,
                data: [0, 0, 0, 0, 0, 0, 0, 0, {{ count($juni) }}, 0, 0, 0]
            }, {
                label: "Lolos",
                backgroundColor: ["rgba(75,192,192,0.2)", "rgba(75,192,192,0.2)", "rgba(75,192,192,0.2)", ],
                borderColor: ["rgba(75,192,192,1)", "rgba(75,192,192,1)", "rgba(75,192,192,1)", ],
                borderWidth: 1,
                data: [0, 0, 0, 4, 2, 0, 0, 0, 0, 0, 0, 0]
            }, {
                label: "Kandidat",
                backgroundColor: ["rgba(255,99,132,0.2)", "rgba(255,99,132,0.2)",
                    "rgba(255,99,132,0.2)",
                ],
                borderColor: ["rgba(255,99,132,1)", "rgba(255,99,132,1)", "rgba(255,99,132,1)"],
                borderWidth: 1,
                data: [0, 0, 0, 8, 3, 0, 0, 0, 0, 0, 0, 0]
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</x-app-layout>
