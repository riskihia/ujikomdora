<aside id="sidebarPanel" class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60 hidden md:block">
    <button id="sidebarButtonInsidePanel" class="text-2xl hidden absolute bg-violet-500 rounded-full w-8 h-8 top-4 -right-4 text-white justify-center items-center">
        X
    </button>

    <div class="flex flex-col justify-between h-full">
        <div class="flex-grow">
            <div class="px-4 py-6 text-center border-b">
                <a href="/walas">
                    <h1 class="text-xl font-bold leading-none"><span class="text-yellow-700">Citra Negara</span> Presensi</h1>
                </a>
            </div>
            @if (!empty($sideIs) && $sideIs == "walas")
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        <li class="{{ $side == 'absen' ? 'active' : '' }}">
                            <a href="/absensi/walas" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Absensi
                            </a>
                        </li>
                        <li class="{{ $side == 'data' ? 'active' : '' }}">
                            <a href="/absensi/{{$kelas}}/data/hari-ini" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Data Absensi
                            </a>
                        </li>
                        <li class="{{ $side == 'pesan' ? 'active' : '' }}">
                            <a href="/walas/pesan" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Pesan
                            </a>
                        </li>
                        
                    </ul>
                </div>
            @elseif(!empty($sideIs) && $sideIs == "bk")
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        @php
                            $admin = session()->get("user_email");
                            $nuptk = session()->get("nuptk");
                            // $kelas = session()->get("kelas");
                            $role = session()->get("role");
                        @endphp
                        @if ($nuptk)
                        
                            @if($role == 'bk')
                            <form action="/absensi/rpl1/data/hari-ini" method="get">
                                @csrf
                                <li class="{{ $kelas == 'rpl1' ? 'active' : '' }}">
                                    <input type="hidden" name="kelas" value="rpl1">
                                    <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                    <span>⬆</span> Data Absensi RPL1
                                    </button>
                                </li>                        
                            </form>
                            <form action="/absensi/rpl2/data/hari-ini" method="get">
                                @csrf
                                <li class="{{ $kelas == 'rpl2' ? 'active' : '' }}">
                                    <input type="hidden" name="kelas" value="rpl2">
                                    <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                    <span>⬆</span> Data Absensi RPL2
                                    </button>
                                </li>                        
                            </form>
                            @elseif ($kelas == 'rpl1')
                                <form action="/absensi/rpl1/data/hari-ini" method="get">
                                    @csrf
                                    <li class="{{ $kelas == 'rpl1' ? 'active' : '' }}">
                                        <input type="hidden" name="kelas" value="rpl1">
                                        <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                        <span>⬆</span> Data Absensi RPL1
                                        </button>
                                    </li>                        
                                </form>
                            @else
                                <form action="/absensi/rpl2/data/hari-ini" method="get">
                                    @csrf
                                    <li class="{{ $kelas == 'rpl2' ? 'active' : '' }}">
                                        <input type="hidden" name="kelas" value="rpl2">
                                        <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                        <span>⬆</span> Data Absensi RPL2
                                        </button>
                                    </li>                        
                                </form>
                            @endif
                            
                            @if (!$role)
                                <li class="border border-blue-400">
                                    <a href="/absensi/walas" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4"><< Back</a>
                                </li>
                            @endif
                        @else
                            <form action="/absensi/rpl1/data/hari-ini" method="get">
                                @csrf
                                <li class="{{ $kelas == 'rpl1' ? 'active' : '' }}">
                                    <input type="hidden" name="kelas" value="rpl1">
                                    <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                    <span>⬆</span> Data Absensi RPL1
                                    </button>
                                </li>                        
                            </form>
                            <form action="/absensi/rpl2/data/hari-ini" method="get">
                                @csrf
                                <li class="{{ $kelas == 'rpl2' ? 'active' : '' }}">
                                    <input type="hidden" name="kelas" value="rpl2">
                                    <button type="submit" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                    <span>⬆</span> Data Absensi RPL2
                                    </button>
                                </li>                        
                            </form>
                            @if ($admin)
                                <li class="border border-blue-400">
                                    <a href="/walas" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4"><< Back</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            @elseif(!empty($sideIs) && $sideIs == "sekretaris")
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        <li class="active">
                            <a href="/absensi/sekretaris" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Absensi
                            </a>
                        </li>
                        
                    </ul>
                </div>
            @else
                <div class="p-4">
                    <ul id="navigationLink" class="space-y-1">
                        <li class="{{ $side == 'akun' ? 'active' : '' }}">
                            <a href="/walas" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Akun
                            </a>
                        </li>
                        <li>
                            <a href="/absensi/rpl1/data/hari-ini" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                <span>⬆</span> Kelola Laporan
                            </a>
                        </li>
                        <li class="{{ $side == 'siswa' ? 'active' : '' }}">
                            <a href="/siswa" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola data siswa
                            </a>
                        </li>
                        {{-- <li>
                            <a href="" class="flex items-center rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            <span>⬆</span> Kelola Pesan
                            </a>
                        </li> --}}
                    </ul>
                </div>
            @endif
        </div>
        <div class="p-4">
            @if (!empty($sideIs) && $sideIs == "walas")                       
                <form action="/walas/logout" method="post">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                        ⭕<span class="font-bold text-sm ml-2">Logout</span>
                    </button> 
                </form>
            @elseif(!empty($sideIs) && $sideIs == "sekretaris")
            @elseif(!empty($sideIs) && $sideIs == "bk")
                <form action="/bk/logout" method="post">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                        ⭕<span class="font-bold text-sm ml-2">Logout</span>
                    </button> 
                </form>
            @else
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                        ⭕<span class="font-bold text-sm ml-2">Logout</span>
                    </button> 
                </form>
            @endif
        </div>
    </div>
</aside>