<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kandidat') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="px-2 max-w-7sm gap-8 justify-center mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Data Lowongan<span class="font-bold ml-2">{{ Auth::user()->name }} </span></h2><input type="hidden" id="code"
                        value="{{ Auth::user()->id_company }}">
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <table class="table table-bordered" id="recruitment-datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Posisi</th>
                                        <th>Kualifikasi</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
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
                        Edit Data
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-4 space-y-6">
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Position
                                Required</label>
                            <input type="text" id="position_required" name="position_required"
                                class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                id="" placeholder="Masukan Posisi...">
                        </div>
                    </div>
                    <div class="p-4 space-y-6">
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kualifikasi
                            </label>
                            <input type="text" id="qualification" name="qualification"
                                class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                id="" placeholder="Masukan Kualifikasi...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="changeSourceModal(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
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
                `/api/recruitment/${id}`;
        </script>
        <script>
            const getDataTableFollowUp = async () => {
                return new Promise(async (resolve, reject) => {
                    try {
                        const response = await axios.get(urlFollowup);
                        let recruitment = response.data.recruitment;
                        console.log(recruitment);

                        let columnConfigs = [{
                                data: 'no',
                                render: (data, type, row, meta) => {
                                    return meta.row + 1;
                                },
                            },
                            {
                                data: 'position_required',
                                render: function(data, type, row) {
                                    return data
                                }
                            }, {
                                data: 'qualification',
                                render: (data) => {
                                    return `<div class="text-wrap">${data}</div>`;
                                }
                            }, {
                                data: 'created_at',
                                render: (data) => {
                                    const date = new Date(data);
                                    const day = date.getDate().toString().padStart(2, '0');
                                    const month = (date.getMonth() + 1).toString().padStart(2, '0');
                                    const year = date.getFullYear();
                                    return `${day}/${month}/${year}`;
                                }
                            }, {
                                data: {
                                    no: 'no',
                                    name: 'name'
                                },
                                render: (data) => {
                                    let moreUrl =
                                        `<button type="button" data-id="${data.id}" data-code="${data.code}" onclick="return detailMore(this)" class="bg-sky-400 hover:bg-bg-sky-400 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-eye"></i></button>`;
                                    return `${moreUrl}`;
                                }
                            }
                        ];


                        const dataTableConfig = {
                            data: recruitment,
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
            const editSourceModal = (button) => {
                const formModal = document.getElementById('formSourceModal');
                const modalTarget = button.dataset.modalTarget;
                const id = button.dataset.id;
                const position_required = button.dataset.position_required;
                const qualification = button.dataset.qualification;
                let url = "{{ route('candidat.update', ':id') }}".replace(':id', id);
                let status = document.getElementById(modalTarget);
                document.getElementById('title_source').innerText = `Update Lowongan Kerja`;
                document.getElementById('position_required').value = position_required;
                document.getElementById('qualification').value = qualification;
                document.getElementById('formSourceButton').innerText = 'Simpan';
                document.getElementById('formSourceModal').setAttribute('action', url);
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);

                let methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);

                status.classList.toggle('hidden');
            }

            const recruitmentDelete = async (id, position_required) => {
                let tanya = confirm(`Apakah anda yakin untuk menghapus lowongan pekerjaan ${position_required} ?`);
                if (tanya) {
                    await axios.post(`/recruitment/${id}`, {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        })
                        .then(function(response) {
                            location.reload();
                        })
                        .catch(function(error) {
                            alert('Error deleting record');
                            console.log(error);
                            console.log(id);
                        });
                }
            }

            const detailMore = (button) => {
                const id = button.getAttribute('data-id');
                const code = button.getAttribute('data-code');
                let url = `{{ route('interview.show', ['id' => ':id', 'code' => ':code']) }}`
                    .replace(':id', id)
                    .replace(':code', code);

                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
