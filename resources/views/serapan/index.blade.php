<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Serapan') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="px-10 max-w-7sm justify-center gap-10 mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">

                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl mb-8 border-slate-900 border-xl p-4 rounded-lg ">
                        <div class="flex justify-between">
                            <div class="p-2">
                                <h2>
                                    Serapan
                                    <span id="filter_kriteria" class="font-bold"></span>
                                    /Tahun
                                    <span id="filter_tahun" class="font-bold"></span>
                                </h2>
                            </div>
                            <div>
                                <button onclick="filter(this)" data-modal-target="sourceModal"
                                    class="bg-sky-400 py-2 px-4 rounded-lg text-white hover:bg-sky-500"><i
                                        class="fa-solid fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-center">


                        <div class="w-full relative">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="serapan-datatable">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No.
                                        </th>
                                        <th scope="col" id="head_kriteria" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tahun
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-center" colspan="4">
                                            Data Tidak ditemukan.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                Filter Serapan
                            </h3>
                            <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                data-modal-hide="defaultModal">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="flex flex-col p-4 space-y-6">
                            <div>
                                <label for="from_date"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kriteria</label>
                                <select class="js-example-placeholder-single js-states form-control w-[840px] m-6"
                                    name="kriteria" id="kriteria" data-placeholder="Pilih Kriteria">
                                    <option value="">Pilih...</option>
                                    <option value="Bidang">Bidang</option>
                                    <option value="Prodi">Prodi</option>
                                </select>
                            </div>
                            <div>
                                <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                                <select class="js-example-placeholder-single js-states form-control w-[840px] m-6"
                                    name="tahun" id="tahun" data-placeholder="Pilih Tahun">
                                    <option value="">Pilih...</option>
                                    @foreach ($tahun as $t)
                                        <option value="{{ $t->class_year }}">{{ $t->class_year }}</option>
                                    @endforeach
                                </select>
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
    @push('scripts')
        <script>
            var dataNabil;
            let dataTableDataRegisterProgramInstance;
            let dataTableDataRegisterProgramInitialized = false;
            let urlItemDetail =
                `/api/detail_bidang`;
            let urlTheme;
        </script>
        <script>
            const changeFilterDataRegisterProgram = () => {
                let queryParams = [];

                let kriteria = document.getElementById('kriteria').value;
                let tahun = document.getElementById('tahun').value;
                document.getElementById('filter_kriteria').innerText = kriteria;
                document.getElementById('filter_tahun').innerText = tahun;

                document.getElementById('filter_kriteria').innerText = kriteria;
                document.getElementById('filter_tahun').innerText = tahun;

                document.getElementById('head_kriteria').innerText = kriteria;

                if (tahun !== 'all') {
                    // queryParams.push(`kriteria=${kriteria}`);
                    queryParams.push(`tahun=${tahun}`);
                }

                let queryString = queryParams.join('&');

                // urlItemDetail = `/api/detail_bidang?${queryString}`;

                if (kriteria === 'Bidang') {
                    urlTheme = 'Bidang';
                    urlItemDetail = `/api/detail_bidang?${queryString}`;
                } else {
                    urlTheme = 'Prodi';
                    urlItemDetail = `/api/detail_prodi?${queryString}`;
                }
                if (dataTableDataRegisterProgramInstance) {
                    dataTableDataRegisterProgramInstance.clear();
                    dataTableDataRegisterProgramInstance.destroy();
                    getDataTableRegisterProgram()
                        .then((response) => {
                            console.log(response)
                            dataTableDataRegisterProgramInstance = $('#serapan-datatable').DataTable(response
                                .config);
                            dataTableDataRegisterProgramInitialized = response.initialized;
                            document.getElementById('sourceModal').classList.add('hidden');


                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    getDataTableRegisterProgram()
                        .then((response) => {
                            console.log(response)
                            dataTableDataRegisterProgramInstance = $('#serapan-datatable').DataTable(response
                                .config);
                            dataTableDataRegisterProgramInitialized = response.initialized;
                            document.getElementById('sourceModal').classList.add('hidden');


                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }


            }


            const getDataTableRegisterProgram = async () => {
                return new Promise(async (resolve, reject) => {
                    try {
                        console.log(urlItemDetail);
                        const response = await axios.get(urlItemDetail);
                        let registers = response.data.detail;
                        let columnConfigs;
                        dataNabil = registers;
                        console.log(urlTheme);
                        if (urlTheme == 'Bidang') {
                            columnConfigs = [{
                                    data: 'no',
                                    render: (data, type, row, meta) => {
                                        return `<div style="text-align:center">${meta.row + 1}.</div>`;
                                    },
                                },
                                {
                                    data: 'Bidang',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                }, {
                                    data: 'Jumlah',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                }, {
                                    data: 'Tahun',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                },
                            ];
                        } else {
                            columnConfigs = [{
                                    data: 'no',
                                    render: (data, type, row, meta) => {
                                        return `<div style="text-align:center">${meta.row + 1}.</div>`;
                                    },
                                },
                                {
                                    data: 'Program_studi',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                }, {
                                    data: 'Jumlah',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                }, {
                                    data: 'Tahun',
                                    render: (data, type, row) => {
                                        return data;
                                    }
                                },
                            ];
                        }



                        const dataTableConfig = {
                            data: registers,
                            columnDefs: [{
                                width: 50,
                                target: 0
                            }],
                            createdRow: (row, data, index) => {
                                if (index % 2 === 0) {
                                    $(row).css('background-color', '#f9fafb');
                                }
                            },
                            columns: columnConfigs,
                        }

                        let results = {
                            config: dataTableConfig,
                            initialized: true
                        }

                        resolve(results);
                    } catch (error) {
                        reject(error)
                    }
                });
            }
        </script>
    @endpush
    <script>
        const filter = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;

            document.getElementById('title_source').innerText = `Filter Serapan`;

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
