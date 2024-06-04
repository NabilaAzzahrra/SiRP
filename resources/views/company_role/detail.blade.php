<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kandidat') }}
        </h2>
    </x-slot>

    <div class="py-8">
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
                        <p class="font-bold text-md"><i class="fa-solid fa-city"></i> <span class="pl-1">Kota</span>
                        </p>
                        <p class="pl-5">{{ $recruitment->company->city }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="font-bold text-md"><i class="fa-solid fa-user"></i> <span class="pl-1">PIC</span>
                        </p>
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
                                {{-- <th>Hasil</th> --}}
                                <th>Status</th>
                                {{-- <th>Keterangan</th> --}}
                                <th>Link Dokument</th>
                                <th class="flex items-center justify-center">#</th>
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
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST"  id="formSourceModal">

                    @csrf
                    <input type="hidden" id="status" name="status" value="INTERVIEW">
                    <div class="p-4 space-y-6">
                        <h1>Apakah Yakin untuk melakukan interview pada kandidat ini?</h1>
                    </div>
                    <div class="flex items-center p-4 space-x-0 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 w-40 h-10 rounded-l-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 w-40 h-10 rounded-r-xl text-white hover:bg-red-600">Batal</button>
                    </div>
                </form>

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
                            },
                            {
                                data: 'status',
                                render: (data, type, row, meta) => {
                                    return data;
                                }
                            },
                            // {
                            //     data: 'result',
                            //     render: (data, type, row, meta) => {
                            //         return data;
                            //     }
                            // }, {
                            //     data: 'status',
                            //     render: (data, type, row, meta) => {
                            //         return data;
                            //     }
                            // },
                            // {
                            //     data: 'information',
                            //     render: (data, type, row, meta) => {
                            //         return data;
                            //     }
                            // },
                            {
                                data: 'student',
                                render: (data, type, row, meta) => {
                                    return data.link_berkas;
                                }
                            }, {
                                data: {
                                    no: 'no',
                                    nim: 'nim'
                                },
                                render: (data) => {
                                    let tertarikUrl = `
                                    <a href="#" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-status="${data.status}"
                                                        onclick="return editSourceModal(${data.id}, '${data.status}')" class="bg-white hover:bg-black hover:text-white px-4 py-2 border border-2 border-black rounded-l-full text-xs">
                                        Interview
                                    </a>`;
                                    let tolakUrl = `
                                    <a href="#" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-status="${data.status}"
                                                        onclick="return editSourceModalTolak(${data.id}, '${data.status}')" class="bg-white hover:bg-black hover:text-white px-4 py-2 border border-2 border-black rounded-r-full text-xs">
                                        Tolak
                                    </a>`;
                                    return `
                                    <div class="flex space-x-0">
                                        ${tertarikUrl} ${tolakUrl}
                                    </div>
                                    `;
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
                var studentElement = document.getElementById(`student${rowCount}`);
                var selectedOption = studentElement.options[studentElement.selectedIndex];
                var baseUrl = $('#base_url').val();
                var data = selectedOption.value;

                await axios.get(`${baseUrl}/student/student_name/${data}`)
                    .then((response) => {
                        console.log(response);
                        document.getElementById(`nim${rowCount}`).value = response.data.student.nim;
                        document.getElementById(`major${rowCount}`).value = response.data.student.classes.major
                            .major;
                        document.getElementById(`classes${rowCount}`).value = response.data.student.classes
                            .class_name;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            };
        </script>

        <script>
            // const editSourceModal = (button) => {
            //     const formModal = document.getElementById('formSourceModal');
            //     const modalTarget = button.dataset.modalTarget;
            //     const id = button.dataset.id;
            //     let url = "{{ route('candidat.interview', ':id') }}".replace(':id', id);

            //     document.getElementById('title_source').innerText = `Konfirmasi`;
            //     document.getElementById('formSourceButton').innerText = 'Interview';
            //     document.getElementById('formSourceModal').setAttribute('action', url);

            //     // Remove existing hidden inputs if they exist to avoid duplicates
            //     document.querySelectorAll('#formSourceModal input[type="hidden"]').forEach(input => {
            //         if (input.name !== '_token') input.remove();
            //     });

            //     let csrfToken = document.createElement('input');
            //     csrfToken.setAttribute('type', 'hidden');
            //     csrfToken.setAttribute('value', '{{ csrf_token() }}');
            //     formModal.appendChild(csrfToken);

            //     let methodInput = document.createElement('input');
            //     methodInput.setAttribute('type', 'hidden');
            //     methodInput.setAttribute('name', '_method');
            //     methodInput.setAttribute('value', 'PATCH');
            //     formModal.appendChild(methodInput);

            //     document.getElementById(modalTarget).classList.toggle('hidden');
            // }

            const editSourceModal = (id, status) => {
                const formModal = document.getElementById('formSourceModal');
                const sourceModal = document.getElementById('sourceModal');
                let url = "{{ route('candidat.interview', ':id') }}".replace(':id', id);
                document.getElementById('formSourceModal').setAttribute('action', url);

                document.getElementById('title_source').innerText = 'Konfirmasi';
                document.getElementById('formSourceButton').innerText = 'Interview';

                sourceModal.classList.remove('hidden');

                const actionUrl = formModal.getAttribute('action').replace(':id', id);
                formModal.setAttribute('action', actionUrl);

                return false;
            }

            const editSourceModalTolak = (id, status) => {
                const formModal = document.getElementById('formSourceModal');
                const sourceModal = document.getElementById('sourceModal');
                let url = "{{ route('candidat.tolak', ':id') }}".replace(':id', id);
                document.getElementById('formSourceModal').setAttribute('action', url);

                document.getElementById('title_source').innerText = 'Konfirmasi';
                document.getElementById('formSourceButton').innerText = 'Tolak';

                sourceModal.classList.remove('hidden');

                const actionUrl = formModal.getAttribute('action').replace(':id', id);
                formModal.setAttribute('action', actionUrl);

                return false;
            }



            const sourceModalClose = (button) => {
                const modalTarget = button.dataset.modalTarget;
                let status = document.getElementById(modalTarget);
                status.classList.toggle('hidden');
            }
        </script>
    @endpush
</x-app-layout>
