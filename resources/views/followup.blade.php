<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jurusan') }}
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

    <div class="py-2">
        <div class="px-2 max-w-7sm gap-8 justify-center mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Tambah Data <span class="font-bold">Follow-Up</span></h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <form action="{{ route('followup.store') }}" method="post">
                                @csrf
                                <div class="flex gap-4 my-4">
                                    <div class="w-full">
                                        <label for="">
                                            <span
                                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Tanggal
                                                Followup</span>
                                            <input type="datetime-local" name="followup_date"
                                                onkeyup="this.value = this.value.toUpperCase()"
                                                class="px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer"
                                                id="" placeholder="Masukan Tanggal...">
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('followup_date') }}</span>
                                        </label>
                                    </div>
                                    <div class="w-full">
                                        <label for="">
                                            <span
                                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Nama
                                                Perusahaan</span>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="company_name" data-placeholder="Pilih Perusahaan"
                                                onchange="return getcompany()" id="company">
                                                <option value="">Pilih...</option>
                                                @foreach ($company as $c)
                                                    <option value="<?= $c->id ?>">
                                                        <?= $c->company_name ?></option>
                                                @endforeach
                                            </select><br>
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('followup_date') }}</span>
                                        </label>
                                    </div>
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Alamat</span>
                                        <input type="text" id="address" name="address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Alamat Perusahaan...." value="{{ old('address') }}"
                                            readonly>
                                        <span class="text-sm m-l text-red-500">{{ $errors->first('address') }}</span>
                                    </div>
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kota</span>
                                        <input type="text" id="city" name="city"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Kota Perusahaan...." value="{{ old('city') }}"
                                            readonly>
                                        <span class="text-sm m-l text-red-500">{{ $errors->first('city') }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-4 my-4">
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Bidang</span>
                                        <input type="text" id="sector" name="sector"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Bidang Perusahaan...."
                                            value="{{ old('sector') }}" readonly>
                                        <span class="text-sm m-l text-red-500">{{ $errors->first('sector') }}</span>
                                    </div>
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kontak
                                            Person</span>
                                        <input type="text" id="pic" name="pic"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Kontak Person Perusahaan...."
                                            value="{{ old('pic') }}" readonly>
                                        <span class="text-sm m-l text-red-500">{{ $errors->first('pic') }}</span>
                                    </div>
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Posisi</span>
                                        <input type="text" id="position" name="position"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Posisi PIC Perusahaan...."
                                            value="{{ old('position') }}" readonly>
                                        <span class="text-sm m-l text-red-500">{{ $errors->first('position') }}</span>
                                    </div>
                                    <div class="w-full">
                                        <span
                                            class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kontak</span>
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Isi dengan Kontak Perusahaan...."
                                            value="{{ old('phone_number') }}" readonly>
                                        <span
                                            class="text-sm m-l text-red-500">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-4 my-4">
                                    <div class="w-full">
                                        <label for="">
                                            <span
                                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Follow-Up
                                                Melalui</span>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="via" data-placeholder="Pilih Follow-Up Melalui">
                                                <option value="">Pilih...</option>
                                                <option value="TELEPON">TELEPON</option>
                                                <option value="EMAIL">EMAIL</option>
                                                <option value="WHATSSAPP">WHATSSAPP</option>
                                                <option value="KUNJUNGAN">KUNJUNGAN</option>
                                            </select><br>
                                            <span class="text-sm m-l text-red-500">{{ $errors->first('via') }}</span>
                                        </label>
                                    </div>
                                    <div class="w-full">
                                        <label for="">
                                            <span
                                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Hasil
                                                Follow-Up</span>
                                            <textarea
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Isi dengan Hasil Follow-Up...." onkeyup="this.value = this.value.toUpperCase()"
                                                name="followup_result" id="followup_result" cols="30" rows="10"></textarea><br>
                                            <span
                                                class="text-sm m-l text-red-500">{{ $errors->first('followup_result') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <button type="submit"
                                        class="bg-sky-400 h-10 w-28 mt-2 rounded-xl text-lime-50 hover:bg-sky-600 hover:shadow-sky-700 hover:shadow-md">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline text-white"
                                                height="16" width="14"
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

        </div>
    </div>

    <div class="py-2">
        <div class="px-2 max-w-7sm gap-8 justify-center mx-auto sm:px-6 lg:px-8 md:flex lg:flex">

            <div class="bg-white my-2 overflow-hidden shadow-lg w-full rounded-lg lg:rounded-lg md:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg ">
                        <h2>Data <span class="font-bold">Follow-Up</span> Perusahaan</h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%">
                            <table class="table table-bordered" id="followup-datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Perusahaan</th>
                                        <th class="flex items-center justify-center h-full">Action</th>
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
                                <button type="button" data-modal-target="sourceModal"
                                    onclick="changeSourceModal(this)"
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
            $('#followup-datatable').DataTable({
                ajax: {
                    url: 'api/followup',
                    dataSrc: 'followup'
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return meta.row + 1;
                    }
                }, {
                    data: 'company',
                    render: (data, type, row) => {
                        return data.company_name;
                    }
                },{
                    data: 'company',
                    render: (data, type, row) => {
                        var linkCompany = "{{route('followup.edit', ':id')}}".replace(
                            ':id',
                            data.id 
                        );
                        let nameCompany = `
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                            <a href="${linkCompany}" class="mr-8 bg-sky-500 text-white hover:bg-sky-600 py-1 px-2 rounded-md items-center justify-center">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                        `;
                        return nameCompany;
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

        const followupDelete = async (id, company_name) => {
            let tanya = confirm(
                `Apakah Anda yakin untuk menghapus Follow-Up dari perusahaan ${company_name} ?`);
            if (tanya) {
                try {
                    await axios.post(`/followup/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    });
                    // Handle success
                    location.reload();
                } catch (error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                }
            }
        }
    </script>

    <script>
        const getcompany = async () => {
            var companyElement = document.getElementById('company');
            var selectedOption = companyElement.options[companyElement.selectedIndex];
            var baseUrl = $('#base_url').val();
            var data = selectedOption.value;

            await axios.get(`${baseUrl}/company/company_name/${data}`)
                .then((response) => {
                    console.log(response);
                    document.getElementById('address').value = response.data.company.address;
                    document.getElementById('city').value = response.data.company.city;
                    document.getElementById('sector').value = response.data.company.sector;
                    document.getElementById('pic').value = response.data.company.pic;
                    document.getElementById('position').value = response.data.company.position;
                    document.getElementById('phone_number').value = response.data.company.phone_number;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
    </script>

</x-app-layout>
