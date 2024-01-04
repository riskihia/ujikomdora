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
  @include('components.aside', ['sideIs' => $side, 'side' => 'pesan'])

  <button id="sidebarButton" class="md:hidden items-center text-blue-600 p-3">
      <svg class="block scale-150 h-4 w-4 fill-current" viewBox="0 0 20 20">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
  </button>

  <main class="md:ml-60 max-h-screen md:overflow-auto px-6 pb-8">
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold mb-10">Selamat datang {{$username}}</h1>
        <hr class="my-10">

        <h1>Pesan</h1>
      </div>
    </div>
  </main>
  
  @vite('resources/js/app.js')
</body>
</html>