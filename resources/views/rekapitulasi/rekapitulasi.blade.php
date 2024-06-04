<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekapitulasi') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="px-2 max-w-7sm gap-8 justify-center mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Data <span class="font-bold">Rekapitulasi</span></h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">


                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-3 py-3 rounded-s-lg">
                                                No
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Program Studi
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Tahun Akademik
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Mahasiswa Awal
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Bermasalah
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Jumlah Mahasiswa
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Mahasiswa Wajib Bekerja
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                KKI
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Kerja
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Wirausaha
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                KKI (%)
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Kerja (%)
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Wirausaha (%)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;

                                        @endphp
                                        @foreach ($major as $m)
                                            @php
                                                $jml = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $jml = count($mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $jml = count($mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $jml = count($mp);
                                                }

                                                $bermasalah = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $bermasalah = count($bermasalah_mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $bermasalah = count($bermasalah_mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $bermasalah = count($bermasalah_mp);
                                                }

                                                $ipk = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $ipk = count($ipk_mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $ipk = count($ipk_mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $ipk = count($ipk_mp);
                                                }

                                                $kki = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $kki = count($kki_mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $kki = count($kki_mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $kki = count($kki_mp);
                                                }

                                                $kerja = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $kerja = count($kerja_mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $kerja = count($kerja_mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $kerja = count($kerja_mp);
                                                }

                                                $wirausaha = 0;
                                                if ($m->major == 'MANAJEMEN INFORMATIKA') {
                                                    $wirausaha = count($wirausaha_mi);
                                                } elseif ($m->major == 'MANAJEMEN KEUANGAN DAN PERBANKAN') {
                                                    $wirausaha = count($wirausaha_mkp);
                                                } elseif ($m->major == 'MANAJEMEN PEMASARAN') {
                                                    $wirausaha = count($wirausaha_mp);
                                                }

                                                $jumlah_mahasiswa = $jml - $bermasalah;
                                                if ($jumlah_mahasiswa > 0) {
                                                    $persentasiKerja = ($kerja / $jumlah_mahasiswa) * 100;
                                                    $persentasiKki = ($kki / $jumlah_mahasiswa) * 100;
                                                    $persentasiWirausaha = ($wirausaha / $jumlah_mahasiswa) * 100;
                                                } else {
                                                    $persentasiKerja = 0;
                                                    $persentasiKki = 0;
                                                    $persentasiWirausaha = 0;
                                                }
                                            @endphp
                                            <tr class="bg-white dark:bg-gray-800">
                                                <td class="px-3 py-3 rounded-s-lg">{{ $no++ }}</td>
                                                <td scope="col" class="px-6 py-3 text-wrap">{{ $m->major }}</td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">2020</td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $jml }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $bermasalah }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">
                                                    {{ $jumlah_mahasiswa }}</td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $ipk }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $kki }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $kerja }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $wirausaha }}
                                                </td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $persentasiKki }}%</td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">
                                                    {{ $persentasiKerja }}%</td>
                                                <td scope="col" class="px-6 py-3 rounded-e-lg">{{ $persentasiWirausaha }}%</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="font-semibold text-gray-900 dark:text-white">
                                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                                            <td scope="col" class="px-6 py-3"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                            <td scope="col" class="px-6 py-3 rounded-e-lg"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</x-app-layout>
