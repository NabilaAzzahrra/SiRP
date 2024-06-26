<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @can('role-A')
        <div class="py-8">
            <div class="px-10 max-w-7sm justify-center gap-10 mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

                <div
                    class="bg-red-400 my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-red-500 hover:shadow-lg hover:shadow-slate-400">
                    <div class="p-4 text-gray-900 flex">
                        <div class="pr-8">
                            <i class="fa-solid fa-building text-white text-4xl pl-4"></i>
                        </div>
                        <div class="pr-[148px] md:pr-48">
                            <div class="text-sm text-white font-bold">
                                {{ __('Perusahaan') }}
                            </div>
                            <div class="text-sm text-white font-semibold">
                                {{ count($company) }}
                            </div>
                        </div>
                        <div class="py-3">
                            <a href="{{ route('company.index') }}"><i
                                    class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-slate-500 my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-slate-600 hover:shadow-lg hover:shadow-slate-400">
                    <div class="p-4 text-gray-900 flex">
                        <div class="pr-8">
                            <i class="fa-solid fa-graduation-cap text-white text-4xl"></i>
                        </div>
                        <div class="pr-[150px] md:pr-48">
                            <div class="text-sm text-white font-bold">
                                {{ __('Mahasiswa') }}
                            </div>
                            <div class="text-sm text-white font-semibold">
                                {{ __('267') }}
                            </div>
                        </div>
                        <div class="py-3">
                            <a href="{{ route('student.index') }}"><i
                                    class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-[#00AEB6] my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-[#86b9bd] hover:shadow-lg hover:shadow-slate-400">
                    <div class="p-4 text-gray-900 flex">
                        <div class="pr-8">
                            <i class="fa-solid fa-comments text-white text-4xl"></i>
                        </div>
                        <div class="pr-40 md:pr-48">
                            <div class="text-sm text-white font-bold">
                                {{ __('Follow-Up') }}
                            </div>
                            <div class="text-sm text-white font-semibold">
                                {{ __('6790') }}
                            </div>
                        </div>
                        {{-- <div class="py-3 opacity-0 lg:opacity-100 md:pl-[200px] lg:pl-[200px]"> --}}
                        <div class="py-3">
                            <a href="{{ route('followup.index') }}"><i
                                    class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i> </a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-[#ECAE30] my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-[#fac458e5] hover:shadow-lg hover:shadow-slate-400">
                    <div class="p-4 text-gray-900 flex">
                        <div class="pr-8">
                            <i class="fa-solid fa-briefcase text-white text-4xl pl-3"></i>
                        </div>
                        <div class="pr-[140px] md:pr-48">
                            <div class="text-sm text-white font-bold">
                                {{ __('Recruitment') }}
                            </div>
                            <div class="text-sm text-white font-semibold">
                                {{ __('100') }}
                            </div>
                        </div>
                        <div class="py-3">
                            <a href="{{ route('recruitment.index') }}"><i
                                    class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="py-2">
            <div class="px-2 max-w-7sm gap-8 justify-center mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

                <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                    <div class="p-4 text-gray-900 w-full">
                        <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                            @php
                                $month = date('F');
                                $bulan = '';
                                if ($month == 'January') {
                                    $bulan = 'Januari';
                                } elseif ($month == 'February') {
                                    $bulan = 'Februari';
                                } elseif ($month == 'March') {
                                    $bulan = 'Maret';
                                } elseif ($month == 'April') {
                                    $bulan = 'April';
                                } elseif ($month == 'May') {
                                    $bulan = 'Mei';
                                } elseif ($month == 'June') {
                                    $bulan = 'Juni';
                                } elseif ($month == 'July') {
                                    $bulan = 'Juli';
                                } elseif ($month == 'August') {
                                    $bulan = 'Agustus';
                                } elseif ($month == 'September') {
                                    $bulan = 'September';
                                } elseif ($month == 'October') {
                                    $bulan = 'Oktober';
                                } elseif ($month == 'November') {
                                    $bulan = 'November';
                                } elseif ($month == 'December') {
                                    $bulan = 'Desember';
                                } else {
                                    $bulan = 'Bulan tidak valid';
                                }

                            @endphp
                            <h2>Rekapitulasi Masa Follow-Up Bulan <span class="font-bold">{{ $bulan }}</span></h2>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-sm text-white font-bold p-12" style="width:60%">
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                    <div class="p-4 text-gray-900 w-full">
                        <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                            @php
                                $month = date('F');
                                $bulan = '';
                                if ($month == 'January') {
                                    $bulan = 'Januari';
                                } elseif ($month == 'February') {
                                    $bulan = 'Februari';
                                } elseif ($month == 'March') {
                                    $bulan = 'Maret';
                                } elseif ($month == 'April') {
                                    $bulan = 'April';
                                } elseif ($month == 'May') {
                                    $bulan = 'Mei';
                                } elseif ($month == 'June') {
                                    $bulan = 'Juni';
                                } elseif ($month == 'July') {
                                    $bulan = 'Juli';
                                } elseif ($month == 'August') {
                                    $bulan = 'Agustus';
                                } elseif ($month == 'September') {
                                    $bulan = 'September';
                                } elseif ($month == 'October') {
                                    $bulan = 'Oktober';
                                } elseif ($month == 'November') {
                                    $bulan = 'November';
                                } elseif ($month == 'December') {
                                    $bulan = 'Desember';
                                } else {
                                    $bulan = 'Bulan tidak valid';
                                }

                            @endphp
                            <h2>Rekapitulasi Recruitment Bulan <span class="font-bold">{{ $bulan }}</span></h2>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-sm text-white font-bold p-12" style="width:100%">
                                <canvas id="myBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endcan

    @can('role-M')
        <div class="py-8">
            <div class="px-10 max-w-7sm justify-center gap-10 mx-auto grid grid-cols-2">
                @foreach ($historyapply as $h)
                    <div class="bg-white p-5 rounded-3xl w-full shadow-xl hover:shadow-sky-200">
                        <div class="ml-10 mb-4 mt-4 text-center font-bold text-xl">
                            {{ $h->company_name }}
                        </div>
                        <div class="ml-10 mb-2">
                            Posisi Lowongan Pekerjaan
                        </div>
                        <div class="ml-10 font-bold">
                            {{ $h->position_required }}
                        </div>
                        <div class="ml-10 mb-4">
                            Apply Tanggal : {{ date('d F Y', strtotime($h->created_at)) }}
                        </div>
                        <div class="ml-10 font-bold">
                            {{ $h->status }}
                        </div>
                        @php
                            if ($h->status == 'KANDIDAT') {
                                $txw_kandidat = 'text-white shadow-md shadow-slate-500';
                                $txw_interview = '';
                                $txb = '';
                            } elseif ($h->status == 'INTERVIEW') {
                                $txw_kandidat = '';
                                $txw_interview = 'text-white shadow-md shadow-slate-500';
                                $txb = '';
                            } else {
                                $txw_kandidat = '';
                                $txw_interview = '';
                                $txb = 'text-white shadow-md shadow-slate-500';
                            }

                            if ($h->status == 'KERJA') {
                                $text = 'KERJA';
                            } elseif ($h->status == 'GAGAL') {
                                $text = 'GAGAL';
                            } else {
                                $text = 'BELUM';
                            }

                        @endphp

                        <div class="flex ml-10 mb-4 justify-center font-bold">
                            <div class="bg-sky-300 p-2 w-auto rounded-full {{ $txw_kandidat }}">
                                KANDIDAT
                            </div>
                            <div class="bg-sky-300 mt-5 -ml-2 w-10 h-1 flex items-center justify-center"></div>
                            <div class="bg-sky-300 p-2 -ml-1 w-auto rounded-full {{ $txw_interview }}">
                                INTERVIEW
                            </div>
                            <div class="bg-sky-300 mt-5 -ml-2 w-10 h-1 flex items-center justify-center"></div>
                            <div class="bg-sky-300 w-24 -ml-1 p-2 rounded-full text-center {{ $txb }}">
                                {{ $text }}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endcan

    @can('role-P')
        <div class="py-8">
            <div class="px-10 max-w-7sm justify-center gap-10 mx-auto">
                <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                    <div class="p-4 text-gray-900 w-full">
                        <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                            @php
                                $month = date('F');
                                $bulan = '';
                                if ($month == 'January') {
                                    $bulan = 'Januari';
                                } elseif ($month == 'February') {
                                    $bulan = 'Februari';
                                } elseif ($month == 'March') {
                                    $bulan = 'Maret';
                                } elseif ($month == 'April') {
                                    $bulan = 'April';
                                } elseif ($month == 'May') {
                                    $bulan = 'Mei';
                                } elseif ($month == 'June') {
                                    $bulan = 'Juni';
                                } elseif ($month == 'July') {
                                    $bulan = 'Juli';
                                } elseif ($month == 'August') {
                                    $bulan = 'Agustus';
                                } elseif ($month == 'September') {
                                    $bulan = 'September';
                                } elseif ($month == 'October') {
                                    $bulan = 'Oktober';
                                } elseif ($month == 'November') {
                                    $bulan = 'November';
                                } elseif ($month == 'December') {
                                    $bulan = 'Desember';
                                } else {
                                    $bulan = 'Bulan tidak valid';
                                }

                            @endphp
                            <h2>Recruitment Pegawai Bulan <span class="font-bold">{{ $bulan }}</span>
                            </h2>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-sm text-white font-bold p-12" style="width:100%">
                                <canvas id="myBarChartCompany"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('role-A')
        <script>
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var data = @json($data);

            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.data,
                        backgroundColor: ['#00AEB6', '#F15C67', '#ECAE30'],
                    }]
                },
            });
        </script>
        <script>
            // Data untuk chart
            var sectors = @json($sectors);
            var rec = @json($rec);

            var data = {
                labels: sectors,
                datasets: [{
                    label: "Data Recruitment",
                    backgroundColor: ["rgba(75,192,192,0.2)", "rgba(255,99,132,0.2)", "rgba(255,205,86,0.2)",
                        "rgba(255,205,86,0.2)"
                    ],
                    borderColor: ["rgba(75,192,192,1)", "rgba(255,99,132,1)", "rgba(255,205,86,1)",
                        "rgba(255,205,86,1)"
                    ],
                    borderWidth: 1,
                    data: rec
                }]
            };

            // Konfigurasi chart
            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Inisialisasi chart
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        </script>
    @endcan

    @can('role-P')
        <script>
            // Data untuk chart
            var posisi = @json($posisi);
            var rec = @json($lolos);

            var data = {
                labels: posisi,
                datasets: [{
                        label: "Data Recruitment",
                        backgroundColor: ["rgba(75,192,192,0.2)", "rgba(255,99,132,0.2)", "rgba(255,205,86,0.2)",
                            "rgba(255,205,86,0.2)"
                        ],
                        borderColor: ["rgba(75,192,192,1)", "rgba(255,99,132,1)", "rgba(255,205,86,1)",
                            "rgba(255,205,86,1)"
                        ],
                        borderWidth: 1,
                        data: lolos
                    }]
            };

            // Konfigurasi chart
            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Inisialisasi chart
            var ctx = document.getElementById('myBarChartCompany').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        </script>
    @endcan

</x-app-layout>
