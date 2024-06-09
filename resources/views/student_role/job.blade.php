<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Vacancy') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="grid grid-cols-5 max-w-7sm justify-center gap-10 sm:px-32 lg:px-32">

            @foreach ($recruitment as $r)
                <div class="bg-white px-2 pt-2 w-full rounded-3xl border border-b-4">
                    <div class="bg-sky-100 rounded-3xl h-auto p-2">
                        <div class="bg-white w-auto m-3 text-sm mt-4 rounded-full flex items-center justify-center p-2 ">
                            {{ date('m F Y', strtotime($r->created_at)) }}
                        </div>
                        <div class="mx-3 mt-5 text-sm text-wrap">
                            {{ $r->company_name }}
                        </div>
                        <div class="mx-3 text-2xl text-wrap font-bold">
                            {{ $r->position_required }}
                        </div>
                        <div
                            class="mx-3 mt-5 text-wrap text-sm border border-1 border-sky-300 w-auto py-2 px-4 mb-5 rounder rounded-full">
                            {{ $r->qualification }}
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        @php
                            if ($r->availability === 'AVAILABLE') {
                                $bg = 'bg-sky-200';
                                $tx = 'text-sky-500';
                            } else {
                                $bg = 'bg-red-200';
                                $tx = 'text-red-500';
                            }
                        @endphp

                        <div
                            class="px-2 w-32 ml-4 flex items-center justify-center text-sm rounded-full {{ $bg }} {{ $tx }}">
                            {{ $r->availability }}
                        </div>

                        @if ($r->availability === 'AVAILABLE')
                            <button onclick="return studentApply('{{ $r->code }}', '{{ Auth::user()->nim }}')"
                                id="apply-link" data-availability="{{ $r->availability }}">
                                <div
                                    class="bg-black text-white p-2 w-20 flex items-center justify-center rounded-full my-5 mr-5 hover:bg-white hover:text-black hover:border hover:border-b-2 hover:border-black">
                                    Apply
                                </div>
                            </button>
                        @else
                            <div
                                class="bg-black text-white p-2 w-20 flex items-center justify-center rounded-full my-5 mr-5 hover:bg-white hover:text-black hover:border hover:border-b-2 hover:border-black">
                                Apply
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach

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
                        <input type="text" id="code" name="code" value="{{ $r->code }}">
                        <input type="text" id="nim" name="nim" value="{{ Auth::user()->nim }}">
                        <div class="p-4 space-y-6">
                            <h1>Apakah Yakin untuk Apply lowongan ini?</h1>
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

    </div>
    <script>
        const studentApply = (code, nim) => {
            const formModal = document.getElementById('formSourceModal');
            const sourceModal = document.getElementById('sourceModal');
            let url = "{{ route('job.store', ':id') }}".replace(':id', code);

            // Set form action URL
            formModal.setAttribute('action', url);

            // Update input values
            document.getElementById('code').value = code;
            document.getElementById('nim').value = nim;

            // Update modal title and button text
            document.getElementById('title_source').innerText = 'Konfirmasi';
            document.getElementById('formSourceButton').innerText = 'Apply';

            // Show modal
            sourceModal.classList.remove('hidden');

            return false;
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
