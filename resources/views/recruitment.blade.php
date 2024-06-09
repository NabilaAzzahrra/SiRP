<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recruitment') }}
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
    <input type="hidden" id="account_active" name="account_active" value="{{ Auth::user()->id }}">
    <div class="py-2 bg-white shadow-lg rounded-lg mx-7 p-5">
        <div class="bg-white shadow-lg border-slate-900 border-xl p-4 rounded-lg text-center font-bold mt-3">
            Data Recruitment
        </div>
        <div
            class="py-1 bg-[#2A2973] hover:bg-[#48478f] hover:shadow-md hover:border hover:border-sky-600 w-20 h-[30px] text-center my-4 rounded-lg">
            <a href="{{ route('recruitment.create') }}"><i class="fa-solid fa-plus text-white"></i></a>
        </div>
        <div class="py-4">
            <table class="table table-bordered" id="recruitment-datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Perusahaan</th>
                        <th>Kota</th>
                        <th>Bidang</th>
                        <th>Posisi</th>
                        <th>Kualifikasi</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
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
    <script>
        $(document).ready(function() {
            console.log('RUN!');
            let queryParams = [];

            let account_active = document.getElementById('account_active').value;

            if (account_active !== 'all') {
                queryParams.push(`account_active=${account_active}`);
            }

            let queryString = queryParams.join('&');

            urlRegisterProgram = `/api/recruitment?${queryString}`;
            $('#recruitment-datatable').DataTable({
                ajax: {
                    url: urlRegisterProgram,
                    dataSrc: 'recruitment'
                },
                columns: [{
                    data: 'no',
                    render: (data, major, row, meta) => {
                        return meta.row + 1;
                    }
                }, {
                    data: 'code',
                    render: function(data, type, row) {
                        return data
                    }
                }, {
                    data: 'company',
                    render: function(data, type, row) {
                        return data.company_name
                    }
                }, {
                    data: 'company',
                    render: function(data, type, row) {
                        return data.city
                    }
                }, {
                    data: 'company',
                    render: function(data, type, row) {
                        return data.sector
                    }
                }, {
                    data: 'position_required',
                    render: function(data, type, row) {
                        return data
                    }
                }, {
                    data: 'qualification',
                    render: function(data, type, row) {
                        return data
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
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-position_required="${data.position_required}" data-qualification="${data.qualification}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return recruitmentDelete('${data.code}','${data.position_required}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        let moreUrl =
                            `<button type="button" data-id="${data.code}" onclick="return recruitmentMore(this)" class="bg-sky-400 hover:bg-bg-sky-400 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-eye"></i></button>`;
                        return `${editUrl} ${deleteUrl} ${moreUrl}`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const position_required = button.dataset.position_required;
            const qualification = button.dataset.qualification;
            let url = "{{ route('recruitment.update', ':id') }}".replace(':id', id);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Recruitment`;
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

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
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

        const recruitmentMore = (button) => {
            const id = button.getAttribute('data-id');
            let url = "{{ route('recruitment.show', ':id') }}".replace(':id', id);

            window.location.href = url;
        }
    </script>
</x-app-layout>
