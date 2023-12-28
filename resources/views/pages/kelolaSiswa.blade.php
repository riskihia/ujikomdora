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
  
  @include('components.aside', ['side' => 'siswa'])


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

        {{-- RPL 1 --}}
        <div id="panel-rpl1" class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
          <div class="flex gap-2">
            <button id="rpl1-btn-list-siswa" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">List</button>
            <button id="rpl1-btn-create-siswa" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">Create</button>
          </div>

          {{-- list --}}
          <div id="rpl1-listKelolaSiswa" class="relative overflow-x-auto">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">List Kelas RP1</h2>

            
            @if(session()->has('pesan'))
              <div class="bg-green-300 p-3 shadow-lg rounded-md" role="alert">
                {{ session()->get('pesan')}}
              </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            created_at
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                  @foreach ($siswas1 as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }} {{-- Display the loop iteration as the No --}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->nis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->jenis_kelamin }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4">
                          <a href='{{url("/siswa/$item->id/edit")}}' class="bg-yellow-200 py-1 px-2 rounded-md cursor-pointer">Edit</a>

                          {{-- button delete --}}
                          <form action="siswa" class="inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="siswa_id" value="{{$item->id}}">
                            <button type="submit" class="bg-red-200 py-1 px-2 rounded-md cursor-pointer">Hapus</button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          {{-- create --}}
          <div id="rpl1-createKelolaSiswa" class="hidden mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create akun RPL1</h2>
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
                
              <div>
                <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS</label>
                <div class="mt-2">
                  <input id="nis" name="nis" type="text" value="{{ old('nis') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              <div>
                <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                <div class="mt-2">
                  <input id="nama" name="nama" type="text" value="{{ old('nama') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              
              <div>
                <label for="kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                <div class="mt-2">
                  <input id="kelamin" name="kelamin" type="text" value="{{ old('kelamin') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              
              <div>
                <label for="kelas" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                <div class="mt-2">
                  <input id="kelas" name="kelas" type="text" value="{{ old('kelas') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
    
              <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
              </div>
            </form>
          </div>
        </div>

        {{-- RPL 2 --}}
        <div id="panel-rpl2" class="hidden p-4 bg-white border rounded-xl text-gray-800 space-y-2">
          <div class="flex gap-2">
            <button id="rpl2-btn-list-siswa" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">List</button>
            <button id="rpl2-btn-create-siswa" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">Create</button>
          </div>

          {{-- list --}}
          <div id="rpl2-listKelolaSiswa" class="relative overflow-x-auto">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">List kelas RPL2</h2>

            
            @if(session()->has('pesan'))
              <div class="bg-green-300 p-3 shadow-lg rounded-md" role="alert">
                {{ session()->get('pesan')}}
              </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          No
                      </th>
                      <th scope="col" class="px-6 py-3">
                          NIS
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Nama
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Gender
                      </th>
                      <th scope="col" class="px-6 py-3">
                          created_at
                      </th>
                  </tr>
              </thead>
              <tbody>
                  
                @foreach ($siswas2 as $item)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $loop->iteration }} {{-- Display the loop iteration as the No --}}
                      </th>
                      <td class="px-6 py-4">
                          {{ $item->nis }}
                      </td>
                      <td class="px-6 py-4">
                          {{ $item->nama }}
                      </td>
                      <td class="px-6 py-4">
                          {{ $item->jenis_kelamin }}
                      </td>
                      <td class="px-6 py-4">
                          {{ $item->created_at }}
                      </td>
                      <td class="px-6 py-4">
                        <a href='{{url("/siswa/$item->id/edit")}}' class="bg-yellow-200 py-1 px-2 rounded-md cursor-pointer">Edit</a>

                        {{-- button delete --}}
                        <form action="siswa" class="inline" method="POST">
                          @method('DELETE')
                          @csrf
                          <input type="hidden" name="siswa_id" value="{{$item->id}}">
                          <button type="submit" class="bg-red-200 py-1 px-2 rounded-md cursor-pointer">Hapus</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          </div>
          {{-- create --}}
          <div id="rpl2-createKelolaSiswa" class="hidden mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create akun RPL2</h2>
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
                  
                <div>
                  <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS</label>
                  <div class="mt-2">
                    <input id="nis" name="nis" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div>
                  <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                  <div class="mt-2">
                    <input id="nama" name="nama" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div>
                  <label for="kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                  <div class="mt-2">
                    <input id="kelamin" name="kelamin" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div>
                  <label for="kelas" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                  <div class="mt-2">
                    <input id="kelas" name="kelas" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
      
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
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