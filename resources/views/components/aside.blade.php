<aside id="sidebarPanel" class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60 hidden md:block">
    <button id="sidebarButtonInsidePanel" class="text-2xl hidden absolute bg-violet-500 rounded-full w-8 h-8 top-4 -right-4 text-white justify-center items-center">
        X
    </button>

    <div class="flex flex-col justify-between h-full">
        <div class="flex-grow">
            <div class="px-4 py-6 text-center border-b">
                <h1 class="text-xl font-bold leading-none"><span class="text-yellow-700">Citra Negara</span> Presensi</h1>
            </div>
            @if (isset($sideIs) && $sideIs == "sekretaris")
                
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        <li>
                            <a href="/absensi/walas" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Absensi
                            </a>
                        </li>
                        <li>
                            <a href="/absensi/data" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Data Absensi
                            </a>
                        </li>
                        
                    </ul>
                </div>
            @else
                
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        <li class="{{ $side == 'akun' ? 'active' : '' }}">
                            <a href="/" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Akun
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                <span>⬆</span> Kelola Laporan
                            </a>
                        </li>
                        <li class="{{ $side == 'siswa' ? 'active' : '' }}">
                            <a href="/siswa" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola data siswa
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Pesan
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="p-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                    ⭕<span class="font-bold text-sm ml-2">Logout</span>
                </button> 
            </form>
        </div>
    </div>
</aside>