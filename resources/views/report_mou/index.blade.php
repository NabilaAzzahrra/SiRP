<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report MoU') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="px-10 max-w-7sm justify-center gap-10 mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">

                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <div class="flex justify-between">
                            <div class="p-2">
                                <h2>REPORT MoU</h2>
                            </div>
                            <div>
                                <button onclick="filter(this)" data-modal-target="sourceModal"
                                    class="bg-sky-400 py-2 px-4 rounded-lg text-white hover:bg-sky-500"><i
                                        class="fa-solid fa-filter"></i></button>
                                <button onclick="exportExcel()"
                                    class="bg-amber-400 py-2 px-4 rounded-lg text-white hover:bg-amber-500"><i
                                        class="fa-solid fa-file-excel"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <table class="table table-bordered" id="mou-datatable">
                                <thead>
                                    <tr>
                                        <th class="w-7">No.</th>
                                        <th>Perusahaan</th>
                                        <th>Bidang</th>
                                        <th>Kota</th>
                                        <th>PIC</th>
                                        <th>Jabatan</th>
                                        <th>No Telepon</th>
                                        <th>Tingkat</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
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
    @push('scripts')
        <script src="{{ asset('js/exceljs.min.js') }}"></script>
        <script>
            var dataNabil;
            let dataTableDataRegisterProgramInstance;
            let dataTableDataRegisterProgramInitialized = false;
            let urlItemDetail =
                `/api/mou`;
        </script>
        <script>
            const changeFilterDataRegisterProgram = () => {
                let queryParams = [];

                let fromDate = document.getElementById('from_date').value;
                let toDate = document.getElementById('to_date').value;

                if (fromDate !== 'all' && toDate !== 'all') {
                    queryParams.push(`fromDate=${fromDate}`);
                    queryParams.push(`toDate=${toDate}`);
                }

                let queryString = queryParams.join('&');

                urlItemDetail = `/api/mou?${queryString}`;

                if (dataTableDataRegisterProgramInstance) {
                    dataTableDataRegisterProgramInstance.clear();
                    dataTableDataRegisterProgramInstance.destroy();
                    getDataTableRegisterProgram()
                        .then((response) => {
                            dataTableDataRegisterProgramInstance = $('#mou-datatable').DataTable(response.config);
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
                        const response = await axios.get(urlItemDetail);
                        let registers = response.data.company;
                        console.log(registers);
                        dataNabil = registers;

                        let columnConfigs = [{
                                data: 'no',
                                render: (data, type, row, meta) => {
                                    return `<div style="text-align:center">${meta.row + 1}.</div>`;
                                },
                            },
                            {
                                data: 'company_name',
                                render: (data, type, row) => {
                                    return data;
                                }
                            }, {
                                data: 'sector',
                                render: (data, type, row) => {
                                    return `<span class="text-wrap">${data}</span>`;
                                }
                            }, {
                                data: 'city',
                                render: (data, type, row) => {
                                    return data;
                                }
                            }, {
                                data: 'pic',
                                render: (data, type, row) => {
                                    return data;
                                }
                            }, {
                                data: 'position',
                                render: (data, type, row) => {
                                    return data;
                                }
                            },{
                                data: 'phone_number',
                                render: (data, type, row) => {
                                    return data;
                                }
                            },{
                                data: 'grade',
                                render: (data, type, row) => {
                                    return data;
                                }
                            }, {
                                data: 'created_at',
                                render: (data, type, row) => {
                                    if (data.length > 0) {
                                        const date = new Date(data);
                                        const day = String(date.getDate()).padStart(2, '0');
                                        const month = String(date.getMonth() + 1).padStart(2,
                                            '0');
                                        const year = date.getFullYear();
                                        return `${day}/${month}/${year}`;
                                    } else {
                                        return 'N/A';
                                    }
                                }
                            }
                        ];

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
        <script>
            const promiseDataRegisterProgram = () => {

                Promise.all([
                        getDataTableRegisterProgram(),
                    ])
                    .then((response) => {
                        let responseDTRS = response[0];
                        dataTableDataRegisterProgramInstance = $('#mou-datatable').DataTable(
                            responseDTRS
                            .config);
                        dataTableDataRegisterProgramInitialized = responseDTRS.initialized;

                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
            promiseDataRegisterProgram();
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
    <script>
        const exportExcel = async () => {
            console.log(dataNabil)
            try {
                const workbook = new ExcelJS.Workbook();
                const worksheet = workbook.addWorksheet('Data');
                let header = ['No', 'Perusahaan', 'Bidang', 'Kota', 'PIC', 'No Telepon', 'Posisi', 'Tanggal', 'NIM',
                    'Nama Kandidat', 'Hasil', 'Status', 'Keterangan'
                ];
                let dataExcel = [
                    header,
                ];
                dataNabil.forEach((data, index) => {
                    let studentBucket = [];
                    const date = new Date(data.created_at);
                    const day = date.getDate().toString().padStart(2,
                        '0');
                    const month = (date.getMonth() + 1).toString().padStart(2,
                        '0');
                    const year = date.getFullYear();
                    const formattedDate = `${day}/${month}/${year}`;

                    function formatDate(dateString) {
                        const date = new Date(dateString);
                        const day = String(date.getDate()).padStart(2, '0');
                        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                        const year = date.getFullYear();
                        return `${day}/${month}/${year}`;
                    }

                    studentBucket.push(
                        `${index + 1}`,
                        `${data.company.company_name}`,
                        `${data.company.sector}`,
                        `${data.company.city}`,
                        `${data.company.pic}`,
                        `${data.company.phone_number}`,
                        `${formatDate(data.created_at)}`,
                        `${data.followup_result}`,
                        `${data.via}`,
                        formattedDate
                    );
                    dataExcel.push(studentBucket);
                });

                worksheet.addRows(dataExcel);

                const blob = await workbook.xlsx.writeBuffer();
                const blobData = new Blob([blob], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blobData);
                link.download = `nabilaaa.xlsx`;

                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

            } catch (error) {
                console.error('Error:', error);
            }
        };
    </script>
</x-app-layout>
