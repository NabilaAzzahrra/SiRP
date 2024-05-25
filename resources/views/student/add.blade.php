<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
        <div id="alert-2" data-aos="fade-left" data-aos-duration="5000" data-aos-easing="ease-in-out"
            class="absolute right-0 flex items-center mx-7 p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                Diwajibkan mengisi data yang memiliki tanda <span class="font-semibold hover:no-underline">*
                </span> pada inputan.
            </div>
        </div>

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
                            {{ __('100') }}
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


    <div class="py-2 bg-white shadow-lg rounded-lg mx-7 p-5">
        <div class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg text-center font-bold mt-3">
            Tambah Data Student
        </div>
        <div class="py-2 my-4 rounded-full">
            <form action="{{ route('student.store') }}" method="post">
                @csrf
                <div class="my-4">

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="nim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="nim" name="nim"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()" placeholder="Isi dengan NIM...."
                                value="{{ old('nim') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('nim') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="student_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="student_name" name="student_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Nama Lengkap Mahasiswa...." value="{{ old('student_name') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('student_name') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="class_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="class_name" data-placeholder="Pilih Kelas" onchange="return getprodi()">
                                <option value="">Pilih...</option>
                                @foreach ($classes as $c)
                                    <option value="<?= $c->id ?>" data-major="<?= $c->id_major ?>">
                                        <?= $c->class_name ?></option>
                                @endforeach
                            </select><br>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('class_name') }}</span>
                        </div>

                        <div class="w-full" id="prodi">
                            <label for="major"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="major" name="major"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Bidang Perusahaan...." value="{{ old('major') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('major') }}</span>
                        </div>

                        <div class="w-full">
                            <label for="financial_status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Keuangan<span class="text-red-500">*</span></label>
                            <input type="text" id="financial_status" name="financial_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Status Keuangan...." value="{{ old('financial_status') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('financial_status') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="academic_counselors"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing
                                Akademik<span class="text-red-500">*</span></label>
                            <input type="text" id="academic_counselors" name="academic_counselors"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Pembimbing Akademik...." value="{{ old('academic_counselors') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('academic_counselors') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="city"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request
                                Penempatan</label>
                            <input type="text" id="request_recruitment" name="request_recruitment"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Request Penempatan...." value="{{ old('request_recruitment') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('request_recruitment') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="gender"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="gender" data-placeholder="Pilih Gender">
                                <option value="">Pilih...</option>
                                <option value="P">PEREMPUAN</option>
                                <option value="L">LAKI-LAKI</option>
                            </select><br>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('gender') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="place_of_birth"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                Lahir</label>
                            <input type="text" id="place_of_birth" name="place_of_birth"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan tempat lahir...." value="{{ old('place_of_birth') }}">
                        </div>
                        <div class="w-full">
                            <label for="date_of_birth"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kode Pos Perusahaan...." value="{{ old('date_of_birth') }}">
                        </div>
                        <div class="w-full">
                            <label for="age"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia</label>
                            <input type="number" id="age" name="age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kode Pos Perusahaan...." value="{{ old('age') }}">
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="hamlet"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kampung/Dusun</label>
                            <input type="text" id="hamlet" name="hamlet"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kode Pos Perusahaan...." value="{{ old('hamlet') }}">
                        </div>
                        <div class="w-full">
                            <label for="village"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan</label>
                            <input type="text" id="village" name="village"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Desa/Kelurahan...." value="{{ old('village') }}">
                        </div>
                        {{-- <div class="w-full">
                            <label for="kode_pos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <input type="number" id="kode_pos" name="kode_pos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kode Pos Perusahaan...." value="{{ old('kode_pos') }}">
                        </div> --}}
                        <div class="w-full">
                            <label for="city"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten</label>
                            <input type="text" id="city" name="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kota/Kabupaten...." value="{{ old('city') }}">
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="phone_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Handphone
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="phone_number" name="phone_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Nomor Handphone...."
                                value="{{ old('phone_number') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('phone_number') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="parents_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="parents_name" name="parents_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Nama Orang Tua...." value="{{ old('parents_name') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('parents_name') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="parents_job"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan Orang
                                Tua
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="parents_job" name="parents_job"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Pekerjaan Orang Tua...." value="{{ old('parents_job') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('parents_job') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="parents_phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Handphone Orang
                                Tua
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="parents_phone" name="parents_phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan No Handphone Orang Tua...." value="{{ old('parents_phone') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('parents_phone') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="competence_test1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uji Kompetensi 1
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="competence_test1" name="competence_test1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Uji Kompetensi 1...."
                                value="{{ old('competence_test1') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('competence_test1') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="competence_test2"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uji Kompetensi 2
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="competence_test2" name="competence_test2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Uji Kompetensi 2...." value="{{ old('competence_test2') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('competence_test2') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="competence_test3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uji Kompetensi 3
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="competence_test3" name="competence_test3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Uji Kompetensi 3...." value="{{ old('competence_test3') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('competence_test3') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="competence_test4"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uji Kompetensi 4
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="competence_test4" name="competence_test4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Uji Kompetensi 4...." value="{{ old('competence_test4') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('competence_test4') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="high_school"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="high_school" name="high_school"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Asal Sekolah...."
                                value="{{ old('high_school') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('high_school') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="major_high_school"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="major_high_school" name="major_high_school"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Jurusan Sekolah...." value="{{ old('major_high_school') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('major_high_school') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="class_year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Angkatan
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="class_year" name="class_year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Tahun Angkatan...." value="{{ old('class_year') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('class_year') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="graduation_year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Lulus
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="graduation_year" name="graduation_year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Tahun Lulus...." value="{{ old('graduation_year') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('graduation_year') }}</span>
                        </div>
                    </div>


                    <div>
                        <button type="submit"
                            class="bg-sky-400 h-10 w-28 mt-2 rounded-xl text-lime-50 hover:bg-sky-600 hover:shadow-sky-700 hover:shadow-md">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline text-white" height="16"
                                    width="14"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    function hiddenAlert() {
        setTimeout(() => {
            document.getElementById('alert-2').style.display = 'none';
        }, 5000);
    }
    hiddenAlert();
</script>
<script>
    const getprodi = async () => {
        var selectedOption = $('[name="class_name"] option:selected');
        var kode = selectedOption.val();
        var majorAttribute = selectedOption.data('major');
        var base_url = $('#base_url').val(); // pastikan #base_url memiliki nilai yang diinginkan

        await axios.get(`${base_url}/student/prodi/${majorAttribute}`)
            .then((response) => {
                console.log(response.data.major.major);
                document.getElementById('major').value = response.data.major.major;
            })
            .catch((error) => {
                console.log(error);
            });
    };
</script>
