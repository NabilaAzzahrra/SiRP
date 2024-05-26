<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kandidat') }}
        </h2>
    </x-slot>

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
                        <a href="#"><i
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
                        <a href="#"><i
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
                        <a href="#"><i
                                class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="flex">
        <div class="py-2 bg-white shadow-lg rounded-lg mx-7 p-5 w-2/6">
            <div class="bg-slate-200 shadow-lg p-4 mt-8 flex items-center justify-center rounded-xl">
                <h1 class="font-bold">DATA PERUSAHAAN</h1>
            </div>
            <div class="p-5 mt-2">
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-building"></i> <span class="pl-1">Nama
                            Perusahaan</span></p>
                    <p class="pl-5">{{ $recruitment->company->company_name }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-boxes-stacked"></i> <span
                            class="pl-1">Bidang</span></p>
                    <p class="pl-5">{{ $recruitment->company->sector }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-city"></i> <span class="pl-1">Kota</span></p>
                    <p class="pl-5">{{ $recruitment->company->city }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-user"></i> <span class="pl-1">PIC</span></p>
                    <p class="pl-5">{{ $recruitment->company->pic }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-briefcase"></i> <span class="pl-1">Lowongan
                            Pekerjaan</span></p>
                    <p class="pl-5">{{ $recruitment->position_required }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-bold text-md"><i class="fa-solid fa-magnifying-glass"></i> <span
                            class="pl-1">Kualifikasi</span></p>
                    <p class="pl-5">{{ $recruitment->qualification }}</p>
                </div>
            </div>
        </div>
        <div class="py-2 bg-white shadow-lg rounded-lg mx-7 p-5 w-full">
            <div class="bg-slate-300 shadow-lg p-4 mx-20 mt-8 flex items-center justify-center rounded-xl">
                <h1 class="font-bold">TAMBAH KANDIDAT</h1>
            </div>
            <form action="{{ route('detail.store') }}" method="post">
                @csrf
                <button id="addRowBtn" class="mb-3 bg-sky-500 p-2 rounded-xl m-1 text-white"><i
                        class="fa-solid fa-user-plus" style="color: #fafafa;"></i></button>
                <table class="table table-bordered" id="candidat-datatable">
                    <thead>
                        <tr>
                            <th class="w-2">No.</th>
                            <th>Mahasiswa</th>
                            <th>NIM</th>
                            <th>Program Sutudi</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <input type="hidden" name="kode" id="kode" value="{{ $recruitment->code }}">
                <div>
                    <button type="submit"
                        class="bg-sky-400 h-10 w-28 mt-2 rounded-xl text-lime-50 hover:bg-sky-600 hover:shadow-sky-700 hover:shadow-md">
                        <div class="">
                            <i class="fa-solid fa-floppy-disk" style="color: #ffffff;"></i> Simpan
                        </div>
                    </button>
                </div>
            </form>
            <div class="bg-slate-300 shadow-lg p-4 mx-20 my-8 flex items-center justify-center rounded-xl">
                <h1 class="font-bold">DATA KANDIDAT</h1> <input type="hidden" id="code"
                    value="{{ $recruitment->code }}">

            </div>
            <div>
                <table class="table table-bordered" id="recruitment-datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Kelas</th>
                            <th>Tahun Angkatan</th>
                            <th>Hasil</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let id = document.getElementById('code').value;

            let dataTableDataFollowUp;
            let dataTableDataFollowUpInitialized = false;
            let urlFollowup =
                `/api/detail/${id}`;
        </script>
        <script>
            function formatDate(dateString) {
                const date = new Date(dateString);
                const padZero = (num) => (num < 10 ? '0' : '') + num;
                const day = padZero(date.getDate());
                const month = padZero(date.getMonth() + 1);
                const year = date.getFullYear();
                const hours = padZero(date.getHours());
                const minutes = padZero(date.getMinutes());
                const seconds = padZero(date.getSeconds());

                return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
            }
        </script>

        <script>
            const getDataTableFollowUp = async () => {
                return new Promise(async (resolve, reject) => {
                    try {
                        const response = await axios.get(urlFollowup);
                        let detail = response.data.detail;
                        console.log(detail);

                        let columnConfigs = [{
                                data: 'no',
                                render: (data, type, row, meta) => {
                                    return meta.row + 1;
                                },
                            },
                            {
                                data: 'nim',
                                render: (data, type, row, meta) => {
                                    return data;
                                }
                            },
                            {
                                data: 'student',
                                render: (data, type, row, meta) => {
                                    return data.student_name;
                                }
                            },
                            {
                                data: 'student',
                                render: (data, type, row, meta) => {
                                    return data.classes.major.major;
                                }
                            },
                            {
                                data: 'student',
                                render: (data, type, row, meta) => {
                                    return data.classes.class_name;
                                }
                            }, {
                                data: 'student',
                                render: (data, type, row, meta) => {
                                    return data.class_year;
                                }
                            }, {
                                data: 'result',
                                render: (data, type, row, meta) => {
                                    return data;
                                }
                            }, {
                                data: 'status',
                                render: (data, type, row, meta) => {
                                    return data;
                                }
                            }, {
                                data: 'information',
                                render: (data, type, row, meta) => {
                                    return data;
                                }
                            }, {
                                data: {
                                    no: 'no',
                                    nim: 'nim'
                                },
                                render: (data) => {
                                    let deleteUrl = `
                                        <button onclick="return detailDelete('${data.id}', '${data.nim}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                            <i class="fas fa-trash"></i>
                                        </button>`;
                                    return `${deleteUrl}`;
                                }
                            },
                        ];


                        const dataTableConfig = {
                            data: detail,
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
            const promiseDataFollowUp = () => {

                Promise.all([
                        getDataTableFollowUp(),
                    ])
                    .then((response) => {
                        let responseDTRS = response[0];
                        dataTableDataFollowUp = $('#recruitment-datatable').DataTable(responseDTRS
                            .config);
                        dataTableDataFollowUpInitialized = responseDTRS.initialized;

                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
            promiseDataFollowUp();
        </script>

        <script>
            const detailDelete = async (id, nim) => {
                let tanya = confirm(`Apakah anda yakin untuk menghapus kandidat dengan NIM ${nim} ?`);
                if (tanya) {
                    await axios.post(`/detail/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            // Handle success
                            location.reload();
                        })
                        .catch(function(error) {
                            // Handle error
                            alert('Error deleting record');
                            console.log(error);
                        });
                }
            }
        </script>
        <script>
            let table;

            $(document).ready(function() {
                table = $('#candidat-datatable').DataTable();

                $('#addRowBtn').click(function(event) {
                    event.preventDefault();
                    addRow();
                });
            });

            let rowCount = 0;

            function addRow() {
                rowCount++;
                table.row.add([
                    rowCount,
                    `<select class="js-example-placeholder-single js-states form-control w-full m-6" name="student[]" data-placeholder="Pilih Mahasiswa" onchange="return getstudent()" id="student${rowCount}">
            <option value="">Pilih...</option>
            <?php foreach ($student as $c): ?>
                <option value="<?= $c->nim ?>"><?= $c->student_name ?></option>
            <?php endforeach; ?>
        </select>`,
                    `<input type="text" name="nim[]" id="nim${rowCount}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">`,
                    `<input type="text" name="major[]" id="major${rowCount}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">`,
                    `<input type="text" name="classes[]" id="classes${rowCount}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">`,
                    `<button type="button" class="mb-3 bg-red-500 p-2 rounded-xl m-4 text-white" onclick="removeRow(${rowCount})"><i class="fa-solid fa-user-minus" style="color: #fafcff;"></i></button>`
                ]).draw(false);

                $(`#student${rowCount}`).select2({
                    placeholder: "Pilih Mahasiswa"
                });
            }

            function removeRow(rowId) {
                let rowIndex = table.row(`#row${rowId}`).index();
                table.row(rowIndex).remove().draw(false);
                updateRowNumbers();
            }

            function updateRowNumbers() {
                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    let cell = this.cell(rowIdx, 0).node();
                    $(cell).html(rowIdx + 1);
                });
            }
        </script>
        <script>
            const getstudent = async () => {
                var studentElement =  document.getElementById(`student${rowCount}`);
                var selectedOption = studentElement.options[studentElement.selectedIndex];
                var baseUrl = $('#base_url').val();
                var data = selectedOption.value;
        
                await axios.get(`${baseUrl}/student/student_name/${data}`)
                    .then((response) => {
                        console.log(response);
                        document.getElementById(`nim${rowCount}`).value = response.data.student.nim;
                        document.getElementById(`major${rowCount}`).value = response.data.student.classes.major.major;
                        document.getElementById(`classes${rowCount}`).value = response.data.student.classes.class_name;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            };
        </script>
    @endpush
</x-app-layout>
