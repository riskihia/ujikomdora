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
  
  @include('components.aside', ['side' => 'akun'])

  <button id="sidebarButton" class="md:hidden items-center text-blue-600 p-3">
      <svg class="block scale-150 h-4 w-4 fill-current" viewBox="0 0 20 20">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
  </button>

  <main class="md:ml-60 max-h-screen md:overflow-auto px-6 pb-8">
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold mb-10">Selamat datang Admin</h1>
    
        <div class="flex gap-2">
            <button id="btn-rpl1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">RPL1</button>
            
            <button id="btn-rpl2" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">RPL2</button>
            
          </div>
        <hr class="my-10">

            {{-- EDIT --}}
          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-xl font-normal leading-9 tracking-tight text-gray-900">Edit data <strong>{{$siswa->nama}}</strong> </h2>
            <div>
              @if ($errors->any())
                <div>
                  <div class="flex items-center bg-red-300 text-white text-sm font-bold px-3 py-2" role="alert">
                    
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              @endif

            </div>
              <form class="space-y-6" action="/siswa" method="POST">
                @csrf 
                  @method('PUT')
                <div>
                  <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS</label>
                  <input type="hidden" value="{{$siswa->id}}" name="siswa_id">
                  <div class="mt-2">
                    <input id="nis" disabled value="{{$siswa->nis}}" name="nis" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                  </div>
                </div>

                <div>
                  <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                  <div class="mt-2">
                    <input id="nama" value="{{$siswa->nama}}" name="nama" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
      
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </main>

    @vite('resources/js/app.js')
</body>
</html>