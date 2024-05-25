<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
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
                        <a href="{{ route('student.index') }}"><i
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
                        <a href="{{ route('student.index') }}"><i
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

    <div class="py-2 bg-white shadow-lg rounded-lg mx-7 p-5">
        <div class="bg-white shadow-lg border-slate-900 border-xl p-4 rounded-lg text-center font-bold mt-3">
            Data Student
        </div>
        <div
            class="py-1 bg-[#2A2973] hover:bg-[#48478f] hover:shadow-md hover:border hover:border-sky-600 w-20 h-[30px] text-center my-4 rounded-lg">
            <a href="{{ route('student.create') }}"><i class="fa-solid fa-plus text-white"></i></a>
        </div>
        <div class="py-4">
            <table class="table table-bordered" id="student-datatable">
                <thead>
                    <tr>
                        <th width="50px">No.</th>
                        <th width="200px">NIM</th>
                        <th width="200px">Mahasiswa</th>
                        <th width="100px">Prodi</th>
                        <th width="70px">Kelas</th>
                        <th width="100px">IPK</th>
                        <th width="200px">Asal Sekolah</th>
                        <th width="50px">Tahun Angkatan</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log('RUN!');
            $('#student-datatable').DataTable({
                ajax: {
                    url: 'api/student',
                    dataSrc: 'student'
                },
                createdRow: function(row, data, dataIndex) {
                    // Menengahkan teks di semua sel pada baris
                    $('td', row).css('text-align', 'center');
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#student-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'nim',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }, {
                    data: 'nim',
                }, {
                    data: 'student_name',
                }, {
                    data: 'classes',
                    render: function(data, type, row) {
                        return data.major.major;
                    }
                }, {
                    data: 'classes',
                    render: function(data, type, row) {
                        return data.class_name;
                    }
                }, {
                    data: 'ipk',
                    render: function(data, type, row) {
                        return data ||
                            '<i class="fa-solid fa-circle-xmark" style="color: #f90101; font-size:20px;"></i>';
                    }
                }, {
                    data: 'high_school',
                }, {
                    data: 'class_year',
                }, {
                    data: {
                        no: 'no',
                        name: 'name'
                    },
                    render: function(data, type, row) {
                        var editUrl = "{{route('student.edit', ':nim')}}".replace(
                            ':nim',
                            data.nim
                        );
                        return `
                        <a href="${editUrl}" class="mr-8">
                            <i class="fa-solid fa-user" style="color: #63E6BE; font-size:20px;"></i>
                        </a>
                            <button onclick="return studentDelete('${data.nim}', '${data.student_name}')">
                                <i class="fa-solid fa-trash" style="color: #FFD43B; font-size:20px;"></i>
                            </button>
                        `;
                    }
                }]
            });
        });


        const studentDelete = async (nim, student_name) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus mahasiswa atas nama ${student_name}?`);
            if (tanya) {
                await axios.post(`/student/${nim}`, {
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
