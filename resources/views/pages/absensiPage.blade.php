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
  
  @include('components.aside', ['sideIs' => "sekretaris"])

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

        <hr class="my-4">

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
        <form action="/absensi/walas" method="POST">
            @csrf
            @foreach ($siswas as $siswa)
                <div class="grid grid-cols-12 gap-4 mt-4 hover:bg-slate-100 py-2 px-2">
                    <div class="col-span-5">{{$siswa->nama}}</div>
                    <div class="col-span-7 flex justify-between items-center">
                        <input name="{{$siswa->id}}" type="radio" value="hadir" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <input name="{{$siswa->id}}" type="radio" value="sakit" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <input name="{{$siswa->id}}" type="radio" value="alpha" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <input name="{{$siswa->id}}" type="radio" value="izin" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                </div>
            @endforeach
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </main>
  @vite('resources/js/app.js')
</body>
</html>