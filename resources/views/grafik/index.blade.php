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
                        <div class="flex justify-between">
                            <div class="p-2">
                                <h2>Rekapitulasi Recruitment Bulan <span class="font-bold">{{ $dateStart }} - {{ $dateEnd }}</span>
                                </h2>
                            </div>
                            <div>
                                <button onclick="filter(this)" data-modal-target="sourceModal"
                                    class="bg-sky-400 py-2 px-4 rounded-lg text-white hover:bg-sky-500"><i
                                        class="fa-solid fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="text-sm text-white font-bold p-12" style="width:60%; height: 50%;">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
                <div class="fixed inset-0 bg-black opacity-50"></div>
                <div class="fixed inset-0 flex items-center justify-center">
                    <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                                Filter Tanggal Recruitment
                            </h3>
                            <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                data-modal-hide="defaultModal">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="flex flex-col p-4 space-y-6">
                            <div>
                                <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900">Dari
                                    Tanggal</label>
                                <input type="date" id="from_date" name="from_date"
                                    class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                    placeholder="Masukan tanggal awal disini...">
                            </div>
                            <div>
                                <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900">Sampai
                                    Tanggal</label>
                                <input type="date" id="to_date" name="to_date"
                                    class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                    placeholder="Masukan tanggal akhir disini...">
                            </div>
                        </div>
                        <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                            <button id="formSourceButton" onclick="changeFilterDataRegisterProgram()"
                                class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                            <button type="button" data-modal-target="sourceModal"
                                class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
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
                data: [{{ count($rec_okt) }}, {{ count($rec_nov) }}, {{ count($rec_des) }},
                    {{ count($rec_jan) }}, {{ count($rec_feb) }}, {{ count($rec_mar) }},
                    {{ count($rec_apr) }}, {{ count($rec_mei) }}, {{ count($rec_juni) }},
                    {{ count($rec_jul) }}, {{ count($rec_ags) }}, {{ count($rec_sep) }}
                ]
            }, {
                label: "Lolos",
                backgroundColor: ["rgba(75,192,192,0.2)", "rgba(75,192,192,0.2)", "rgba(75,192,192,0.2)", ],
                borderColor: ["rgba(75,192,192,1)", "rgba(75,192,192,1)", "rgba(75,192,192,1)", ],
                borderWidth: 1,
                data: [{{ count($lol_okt) }}, {{ count($lol_nov) }}, {{ count($lol_des) }},
                    {{ count($lol_jan) }}, {{ count($lol_feb) }}, {{ count($lol_mar) }},
                    {{ count($lol_apr) }}, {{ count($lol_mei) }}, {{ count($lol_juni) }},
                    {{ count($lol_jul) }}, {{ count($lol_ags) }}, {{ count($lol_sep) }}
                ]
            }, {
                label: "Kandidat",
                backgroundColor: ["rgba(255,99,132,0.2)", "rgba(255,99,132,0.2)",
                    "rgba(255,99,132,0.2)",
                ],
                borderColor: ["rgba(255,99,132,1)", "rgba(255,99,132,1)", "rgba(255,99,132,1)"],
                borderWidth: 1,
                data: [{{ count($can_okt) }}, {{ count($can_nov) }}, {{ count($can_des) }},
                    {{ count($can_jan) }}, {{ count($can_feb) }}, {{ count($can_mar) }},
                    {{ count($can_apr) }}, {{ count($can_mei) }}, {{ count($can_juni) }},
                    {{ count($can_jul) }}, {{ count($can_ags) }}, {{ count($can_sep) }}
                ]
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
    @push('scripts')
        <script>
            const changeFilterDataRegisterProgram = () => {
                let queryParams = [];

                let fromDate = document.getElementById('from_date').value;
                let toDate = document.getElementById('to_date').value;

                if (fromDate !== 'all' && toDate !== 'all') {
                    queryParams.push(`fromDate=${encodeURIComponent(fromDate)}`);
                    queryParams.push(`toDate=${encodeURIComponent(toDate)}`);
                }

                let queryString = queryParams.join('&');
                let urlItemDetail = `{{ route('grafikRecruitment.index') }}?${queryString}`;

                window.location.href = urlItemDetail;
            }
        </script>
    @endpush
    <script>
        const filter = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;

            document.getElementById('title_source').innerText = `Filter Tanggal`;

            let modal = document.getElementById(modalTarget);
            modal.classList.remove('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
