<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 font-poppins">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7sm mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    {{-- <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a> --}}
                    <img src="{{ asset('img/brand/APP_SIRP.png') }}" alt="Nama Gambar" class="w-10 h-10">
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @can('role-A')
                        <li class="relative list-none">
                            <button onclick="dropdownDigital()" id="dropdownNavbarLink"
                                data-dropdown-toggle="dropdownNavbar"
                                class="{{ request()->routeIs(['major', 'recruitment']) ? 'text-gray-900' : 'text-gray-500' }}
                            flex mt-6 items-center justify-between w-full text-sm py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Master
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="digitalNavbar"
                                class="absolute z-10 top-[60px] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('major.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Prodi</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('classes.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kelas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="relative list-none">
                            <button onclick="dropdownDigitalReport()" id="dropdownNavbarLinkReport"
                                data-dropdown-toggle="dropdownNavbar"
                                class=" {{ request()->routeIs('recruitment') ? 'text-gray-900' : 'text-gray-500' }}
                            flex mt-6 items-center justify-between w-full text-sm py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Report
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="digitalNavbarReport"
                                class="absolute z-10 top-[60px] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('reportRecruitment.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Recruitment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reportFollowup.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Follow-up</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reportMou.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">MOU</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reportRekapitulasi.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rekapitulations</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('grafikRecruitment.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Grafik
                                            Recruitment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('serapan.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Serapan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan
                    @can('role-P')
                        <x-nav-link :href="route('candidat.index')" :active="request()->routeIs('kandidat')">
                            {{ __('Kandidat') }}
                        </x-nav-link>
                        <x-nav-link :href="route('interview.index')" :active="request()->routeIs('interview')">
                            {{ __('Interview') }}
                        </x-nav-link>
                        <x-nav-link :href="route('hasil.index')" :active="request()->routeIs('hasil')">
                            {{ __('Hasil Recruitment') }}
                        </x-nav-link>
                    @endcan
                    @can('role-M')
                        <x-nav-link :href="route('job.index')" :active="request()->routeIs('job')">
                            {{ __('Job Vacancy') }}
                        </x-nav-link>
                        <x-nav-link :href="route('job.index')" :active="request()->routeIs('job')">
                            {{ __('Informations') }}
                        </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <li class="relative list-none">
                <x-responsive-nav-link onclick="dropdownDigitalMini()" id="dropdownNavbarLink"
                    data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full text-base py-2 px-3 text-gray-900">Master
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-responsive-nav-link>
                <!-- Dropdown menu -->
                <div id="digitalNavbarMini"
                    class="absolute z-10 top-[50px] left-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User</a>
                        </li>
                        <li>
                            <a href="{{ route('major.index') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Prodi</a>
                        </li>
                        <li>
                            <a href="{{ route('classes.index') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kelas</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="relative list-none">
                <x-responsive-nav-link onclick="dropdownDigitalMiniReport()" id="dropdownNavbarLinkMiniReport"
                    data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full text-base py-2 px-3 text-gray-900">Report
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-responsive-nav-link>
                <!-- Dropdown menu -->
                <div id="digitalNavbarMiniReport"
                    class="absolute z-10 top-[50px] left-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Recruitment</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Follow-up</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">MOU</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rekapitulations</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Grafik
                                Recruitment</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Serapan</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <x-responsive-nav-link :href="route('company.index')" :active="request()->routeIs('company')">
                {{ __('Company') }}
            </x-responsive-nav-link> --}}


        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    const dropdownDigital = () => {
        let content = document.getElementById('digitalNavbar');
        let nonactive = content.classList.contains('hidden');
        if (nonactive) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }

    const dropdownDigitalMini = () => {
        let content = document.getElementById('digitalNavbarMini');
        let nonactive = content.classList.contains('hidden');
        if (nonactive) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }

    const dropdownDigitalReport = () => {
        let content = document.getElementById('digitalNavbarReport');
        let nonactive = content.classList.contains('hidden');
        if (nonactive) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }

    const dropdownDigitalMiniReport = () => {
        let content = document.getElementById('digitalNavbarMiniReport');
        let nonactive = content.classList.contains('hidden');
        if (nonactive) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }
</script>
