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
@include('components.aside', ['sideIs' => $side, 'side' => 'data'])
  {{-- @include('components.aside', ['sideIs' => "walas"]) --}}

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

        <div class="flex justify-between">
          <div>
            <p class="text-xl">Tanggal : {{$tanggal}}</p>
            <p class="text-xl">Hari : {{$hari}}</p>
          </div>
          <div>
            @php
                $url = url()->current()
            @endphp
            <a href="{{ $url }}?isPdf=true">
              <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cetak</button>
            </a>
          </div>
        </div>

        @if(session()->has('pesan'))
            <div class="bg-green-300 p-3 shadow-lg rounded-md" role="alert">
            {{ session()->get('pesan')}}
            </div>
        @endif
        <hr class="my-4">

        {{-- button filter day, week,month --}}
        <div class="flex gap-2">
          <a href="/absensi/data/hari-ini">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Hari ini</button>
          </a>
          <a href="/absensi/data/minggu">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Minggu</button>
          </a>
          <a href="/absensi/data/bulan">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bulan</button>
          </a>
        </div>

        {{-- Data absensi --}}
        <h1 class="text-2xl text-center">Data absensi</h1>

        <div>
          <table class="text-base">
            <thead class="bg-slate-50">
                <tr class="border border-slate-400">
                  <th class="p-2">No</th>
                  <th class="border border-r border-slate-400 p-2">Nama</th>
                  @foreach ($absensis->unique('tanggal') as $data)
                    <th class="border border-r border-slate-400 p-2">{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}</th>
                  @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                    <tr class="border border-slate-400">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="hover:bg-violet-200 border border-r border-slate-400 p-2">{{ $siswa->nama }}</td>
                        @foreach ($absensis as $data)
                            @if ($data->siswa_id == $siswa->id)
                                <td class="border border-r border-slate-400 p-2 {{$data->status == 'Hadir' ? 'bg-green-50' : 'bg-red-50'}}">{{ $data->status }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  @vite('resources/js/app.js')
</body>
</html>