<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recruitment') }}
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
            Tambah Data Recruitment
        </div>
        <div class="py-2 my-4 rounded-full">
            <form action="{{ route('recruitment.store') }}" method="post">
                @csrf
                <div class="my-4">

                    <input type="hidden" id="kode" name="kode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Kode...." value="{{ $kode_recruitment }}" />
                    <span class="text-sm m-l text-red-500">{{ $errors->first('kode') }}</span>
                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="">
                                <span
                                    class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Nama
                                    Perusahaan</span>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="company_name" data-placeholder="Pilih Perusahaan"
                                    onchange="return getcompany()" id="company">
                                    <option value="">Pilih...</option>
                                    @foreach ($company as $c)
                                        <option value="<?= $c->code_company ?>">
                                            <?= $c->company_name ?></option>
                                    @endforeach
                                </select><br>
                                <span class="text-sm m-l text-red-500">{{ $errors->first('company_name') }}</span>
                            </label>
                        </div>
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Alamat</span>
                            <input type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Alamat Perusahaan...." value="{{ old('address') }}" readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('address') }}</span>
                        </div>
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kota</span>
                            <input type="text" id="city" name="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Kota Perusahaan...." value="{{ old('city') }}" readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('city') }}</span>
                        </div>
                    </div>

                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Bidang</span>
                            <input type="text" id="sector" name="sector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Bidang Perusahaan...." value="{{ old('sector') }}" readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('sector') }}</span>
                        </div>
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kontak
                                Person</span>
                            <input type="text" id="pic" name="pic"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Kontak Person Perusahaan...." value="{{ old('pic') }}"
                                readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('pic') }}</span>
                        </div>
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Posisi
                                PIC</span>
                            <input type="text" id="position" name="position"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Posisi PIC Perusahaan...." value="{{ old('position') }}"
                                readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('position') }}</span>
                        </div>
                        <div class="w-full">
                            <span
                                class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kontak</span>
                            <input type="text" id="phone_number" name="phone_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Isi dengan Kontak Perusahaan...." value="{{ old('phone_number') }}"
                                readonly>
                            <span class="text-sm m-l text-red-500">{{ $errors->first('phone_number') }}</span>
                        </div>
                    </div>
                    <div class="flex gap-4 my-4">
                        <div class="w-full">
                            <label for="">
                                <span
                                    class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Posisi</span>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isi dengan Posisi...."
                                    onkeyup="this.value = this.value.toUpperCase()" name="position_required"
                                    id="position_required" cols="30" rows="10"><br>
                                <span
                                    class="text-sm m-l text-red-500">{{ $errors->first('position_required') }}</span>
                            </label>
                        </div>
                        <div class="w-full">
                            <label for="">
                                <span
                                    class="block font-semibold mb-1 text-slate-700 after:content-['*'] after:text-pink-500 after:ml-0.5 dark:text-white">Kualifikasi</span>
                                <textarea
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isi dengan Kualifikasi...." onkeyup="this.value = this.value.toUpperCase()" name="qualification"
                                    id="qualification" cols="30" rows="10"></textarea><br>
                                <span class="text-sm m-l text-red-500">{{ $errors->first('qualification') }}</span>
                            </label>
                        </div>
                    </div>

                    <div
                        class="bg-slate-100 shadow-2xl border-slate-900 border-xl p-4 rounded-lg text-center font-bold mt-3">
                        DATA KANDIDAT
                    </div>

                    <button id="addRowBtn" class="mb-3 bg-sky-500 p-2 rounded-xl m-4 text-white"><i
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

                    <div>
                        <button type="submit"
                            class="bg-sky-400 h-10 w-28 mt-2 rounded-xl text-lime-50 hover:bg-sky-600 hover:shadow-sky-700 hover:shadow-md">
                            <div class="">
                                <i class="fa-solid fa-floppy-disk" style="color: #ffffff;"></i> Simpan
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
    const getcompany = async () => {
        var studentElement = document.getElementById('company');
        var selectedOption = studentElement.options[studentElement.selectedIndex];
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
