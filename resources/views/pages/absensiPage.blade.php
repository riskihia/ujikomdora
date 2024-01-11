<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
  
    @php
        $side = session()->has('nuptk') ? 'walas' : 'sekretaris';
    @endphp
  @include('components.aside', ['sideIs' => $side, 'side' => 'absen', 'kelas'=>$kelas])

  <button id="sidebarButton" class="md:hidden items-center text-blue-600 p-3">
      <svg class="block scale-150 h-4 w-4 fill-current" viewBox="0 0 20 20">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
  </button>

  <main class="md:ml-60 max-h-screen md:overflow-auto px-6 pb-8">
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl mb-10">Selamat datang <span class="font-bold">{{$username}}</span></h1>

        <p class="text-xl">Tanggal : {{$tanggal}}</p>
        <p class="text-xl">Hari : {{$hari}}</p>

        @if(session()->has('pesan'))
            <div class="bg-green-300 p-3 shadow-lg rounded-md" role="alert">
            {{ session()->get('pesan')}}
            </div>
        @endif
        <hr class="my-4">

        {{-- Kelola absensi --}}
        <div>
            {{-- Tabel --}}
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-5">Nama</div>
                <div class="col-span-7 flex justify-between">
                    <div class="...">Hadir</div>
                    <div class="...">Sakit</div>
                    <div class="col-span-2 ...">Alpha</div>
                    <div class="...">Izin</div>
                </div>
            </div>
            @if (isset($absensi))
                @php
                    $url = url()->current();
                    $segments = explode('/', $url);
                    $url = end($segments);
                @endphp
                <form action="/absensi/{{$url}}" method="POST">
                    @csrf 
                    @foreach ($absensi as $absensi_data)
                        <div class="grid grid-cols-12 gap-4 mt-4 hover:bg-slate-100 py-2 px-2">
                            <div class="col-span-5">{{$absensi_data->siswa->nama}}</div>
                            <div class="col-span-7 flex justify-between items-center">
                                <input name="{{$absensi_data->siswa->id}}" type="radio" value="hadir" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                {{ $absensi_data->keterangan === 'hadir' ? 'checked' : '' }}
                                >
                                
                                <input name="{{$absensi_data->siswa->id}}" type="radio" value="sakit" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                {{ $absensi_data->keterangan === 'sakit' ? 'checked' : '' }}
                                >
                                <input name="{{$absensi_data->siswa->id}}" type="radio" value="alpha" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                {{ $absensi_data->keterangan === 'alpha' ? 'checked' : '' }}
                                >
                                <input name="{{$absensi_data->siswa->id}}" type="radio" value="izin" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                {{ $absensi_data->keterangan === 'izin' ? 'checked' : '' }}
                                >
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                    </div>
                </form>
            @else
            <div>
                <p class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm00">Tidak ada absensi</p>
            </div>
            @endif
        </div>
      </div>
    </div>
  </main>
  @vite('resources/js/app.js')
</body>
</html>