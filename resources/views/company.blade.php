<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
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
            Data Company
        </div>
        @if (Auth::user()->id == 1)
            <div
                class="py-1 bg-[#2A2973] hover:bg-[#48478f] hover:shadow-md hover:border hover:border-sky-600 w-20 h-[30px] text-center my-4 rounded-lg">
                <a href="{{ route('company.create') }}"><i class="fa-solid fa-plus text-white"></i></a>
            </div>
        @endif
        <div class="py-4">
            <table class="table table-bordered" id="company-datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Perusahaan</th>
                        <th>Tipe</th>
                        <th>Kota</th>
                        <th>Kontak Person</th>
                        <th>Jabatan</th>
                        <th>Telepon</th>
                        <th>Akun</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
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

            urlRegisterProgram = `/api/company?${queryString}`;
            console.log(urlRegisterProgram);

            $('#company-datatable').DataTable({
                ajax: {
                    url: urlRegisterProgram,
                    dataSrc: 'company'
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return meta.row + 1;
                    }
                }, {
                    data: 'company_name',
                }, {
                    data: 'sector',
                }, {
                    data: 'city',
                }, {
                    data: 'pic',
                }, {
                    data: 'position',
                }, {
                    data: 'phone_number',
                }, {
                    data: 'user',
                    render: function(data, type, row) {
                        return data.name
                    }
                }, {
                    data: {
                        no: 'no',
                        name: 'name'
                    },
                    render: (data) => {
                        let editUrl = "{{ route('company.edit', ':id') }}".replace(
                            ':id',
                            data.id
                        );

                        let deleteUrl =
                            `<button onclick="return companyDelete('${data.id}','${data.company_name}')"
                            class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"
                            ><i class="fas fa-trash"></i></button>`;
                        return `
                                    <a href="${editUrl}" class="bg-amber-400 w-4 py-1 px-3 text-xs text-white rounded-md"><i class="fas fa-edit"></i></a>

                        ${deleteUrl}`;
                    }
                }, ],
            });
        });

        const companyDelete = async (id, company_name) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus perusahaan ${company_name} ?`);
            if (tanya) {
                await axios.post(`/company/${id}`, {
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
