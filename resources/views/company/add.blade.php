<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
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
            Tambah Data Perusahaan
        </div>
        <div class="py-2 my-4 rounded-full">
            <form action="{{ route('company.store') }}" method="post">
                @csrf
                <div class="my-4">

                    <div class="flex gap-4 my-4">
                        <input type="hidden" id="code_company" name="code_company"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Kode...." value="{{ $kode_company }}" />
                        <div class="w-full">
                            <label for="company_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="company_name" name="company_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Nama Perusahaan...." value="{{ old('company_name') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('company_name') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="sector"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="sector" name="sector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Bidang Perusahaan...." value="{{ old('sector') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('sector') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="company_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                                Perusahaan</label>
                            <input type="text" id="company_type" name="company_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Tipe Perusahaan...." value="{{ old('company_type') }}">
                        </div>
                        <div class="w-full">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat <span
                                    class="text-red-500">*</span></label>
                            <textarea type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()" placeholder="Isi dengan Alamat Perusahaan...."
                                value="{{ old('address') }}"></textarea>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('address') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="city"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <input type="text" id="city" name="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan City Perusahaan...." value="{{ old('city') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('city') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Email Perusahaan...." value="{{ old('email') }}">
                        </div>
                        <div class="w-full">
                            <label for="fax"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FAX</label>
                            <input type="text" id="fax" name="fax"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan FAX Perusahaan...." value="{{ old('fax') }}">
                        </div>
                        <div class="w-full">
                            <label for="kode_pos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kode Pos Perusahaan...." value="{{ old('kode_pos') }}">
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="grade"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="grade" data-placeholder="Pilih Tingkat">
                                <option value="">Pilih...</option>
                                <option value="INTERNASIONAL">INTERNASIONAL</option>
                                <option value="NASIONAL">NASIONAL</option>
                                <option value="LOKAL">LOKAL</option>
                            </select><br>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('grade') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="pic"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak Person
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="pic" name="pic"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Kontak Person Perusahaan...." value="{{ old('pic') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('pic') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="position"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="position" name="position"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Jabatan Kontak Person Perusahaan...."
                                value="{{ old('position') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('position') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="phone_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Hp/Telepon
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="phone_number" name="phone_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onkeyup="this.value = this.value.toUpperCase()"
                                placeholder="Isi dengan Telepon Perusahaan...." value="{{ old('phone_number') }}">
                            <span class="text-sm m-l text-red-500">{{ $errors->first('phone_number') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="relation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relasi
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="relation" data-placeholder="Pilih Relasi">
                                <option value="">Pilih...</option>
                                <option value="BARU">BARU</option>
                                <option value="LAMA">LAMA</option>
                            </select><br>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('relation') }}</span>
                        </div>
                        <div class="w-full">
                            <label for="mou"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MOU
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="mou" data-placeholder="Pilih MOU">
                                <option value="">Pilih...</option>
                                <option value="SUDAH">SUDAH</option>
                                <option value="BELUM">BELUM</option>
                            </select><br>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('mou') }}</span>
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
