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
          <a href="/walas">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Walas</button>
          </a>
          <a href="/bk">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bimbingan Konselin</button>
          </a>
          <a href="/sekretaris">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sekretaris</button>
          </a>
        </div>
        <hr class="my-10">

        <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
          <div class="flex gap-2">
            <button id="btn-list-Bk" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">List</button>
            
            <button id="btn-create-Bk" class="bg-green-500 hover:bg-blue-700 text-white py-1 px-2 font-semibold rounded">Create</button>
          </div>

          {{-- list bk --}}
          <div id="listAccBk" class="relative overflow-x-auto">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">List akun Bimbingan Konseling</h2>
            
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
                            NUPTK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            created_at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                  @foreach ($bk as $bk_item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }} {{-- Display the loop iteration as the No --}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $bk_item->nuptk }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $bk_item->username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $bk_item->created_at }}
                        </td>
                        <td class="px-6 py-4">
                          <a href='{{url("/bk/$bk_item->id/edit")}}' class="bg-yellow-200 py-1 px-2 rounded-md cursor-pointer">Edit</a>

                          {{-- button delete --}}
                          <form action="/bk" class="inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="bk_id" value="{{$bk_item->id}}">
                            <button type="submit" class="bg-red-200 py-1 px-2 rounded-md cursor-pointer">Hapus</button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>

          {{-- create bk --}}
          <div id="createAccBk" class="hidden mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create akun Bimbingan Konseling</h2>
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
              <form class="space-y-6" action="/bk" method="POST">
                @csrf 
                  
                <div>
                  <label for="nuptk" class="block text-sm font-medium leading-6 text-gray-900">NUPTK</label>
                  <div class="mt-2">
                    <input id="nuptk" name="nuptk" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
      
                <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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