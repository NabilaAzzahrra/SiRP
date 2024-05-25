<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="px-10 max-w-7sm justify-center gap-10 mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-red-400 my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-red-500 hover:shadow-lg hover:shadow-slate-400">
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
                        <a href="{{ route('company.index') }}"><i class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                    </div>
                </div>
            </div>

            <div class="bg-slate-500 my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-slate-600 hover:shadow-lg hover:shadow-slate-400">
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
                        <a href="#"><i class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="bg-[#00AEB6] my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-[#86b9bd] hover:shadow-lg hover:shadow-slate-400">
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
                        <a href="#"><i class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i> </a>
                    </div>
                </div>
            </div>
       
            <div class="bg-[#ECAE30] my-4 overflow-hidden w-full shadow-sm rounded-3xl lg:rounded-3xl md:rounded-3xl hover:bg-[#fac458e5] hover:shadow-lg hover:shadow-slate-400">
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
                        <a href="#"><i class="fa-solid fa-eye text-white hover:-translate-y-1 hover:scale-110"></i></a>
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
                        <h2>Tambah Data <span class="font-bold">Jurusan</span></h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <form action="{{ route('major.store') }}" method="post">
                                @csrf
                                <label for="">
                                    <span
                                        class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Jurusan</span>
                                    <input type="text" name="major" onkeyup="this.value = this.value.toUpperCase()"
                                        class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer"
                                        id="" placeholder="Masukan Prodi...">
                                    <span class="text-sm m-l text-red-500">{{ $errors->first('major') }}</span>
                                </label>
                                <div class="pt-2">
                                    <button type="submit"
                                        class="bg-sky-400 h-10 w-28 mt-2 rounded-xl text-lime-50 hover:bg-sky-600 hover:shadow-sky-700 hover:shadow-md">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline text-white" height="16"
                                                width="14"
                                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path
                                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                            </svg> Simpan
                                        </div>
                                    </button>
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Data <span class="font-bold">Jurusan</span></h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <table class="table table-bordered" id="major-datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Prodi</th>
                                        <th>Action</th>
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
                        <form method="POST" action="{{ route('major.store') }}" id="formSourceModal">
                            @csrf
                            <div class="p-4 space-y-6">
                                <div>
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900">Jurusan</label>
                                    <input type="text" id="major" name="major"
                                        class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer hover:shadow-lg"
                                        id="" placeholder="Masukan Jurusan...">
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

        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log('RUN!');
            $('#major-datatable').DataTable({
                ajax: {
                    url: 'api/major',
                    dataSrc: 'major'
                },
                columns: [{
                    data: 'no',
                    render: (data, major, row, meta) => {
                        return meta.row + 1;
                    }
                }, {
                    data: 'major',
                }, {
                    data: {
                        no: 'no',
                        name: 'name'
                    },
                    render: (data) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-major="${data.major}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return majorDelete('${data.id}','${data.major}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `${editUrl} ${deleteUrl}`;
                    }
                }, ],
            });
        });

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const major = button.dataset.major;
            let url = "{{ route('major.update', ':id') }}".replace(':id', id);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Jurusan ${major}`;
            document.getElementById('major').value = major;
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

        const majorDelete = async (id, major) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus jurusan ${major} ?`);
            if (tanya) {
                await axios.post(`/major/${id}`, {
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

</x-app-layout>
