<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <!-- LOGIN -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="shadow-2xl md:w-1/3 mx-auto p-4 relative">
       
        {{-- button close --}}
        <a href="{{route('dashboard')}}">
          <span class="text-2xl absolute bg-violet-500 rounded-full w-8 h-8 top-4 right-4 text-white flex justify-center items-center">X</span>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        </a>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        
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

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="/bk/login" method="POST">
            @csrf
            <div>
              <label for="nuptk" class="block text-sm font-medium leading-6 text-gray-900">NIP</label>
              <div class="mt-2">
                <input id="nuptk" name="nuptk" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>


</div>
</body>
</html>