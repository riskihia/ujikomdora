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

    <div class="shadow-lg w-1/2 mx-auto h-screen my-8">
        <img src="{{asset('/img/cn.jpg')}}" class="mx-auto" alt="cn">
        <h2 class="text-4xl font-bold tracking-tight text-center">ABSENSI SMK CITRA NEGARA</h2>

        <div>
            <a class="block bg-green-200 shadow-md rounded-md px-4 py-8 m-4 hover:bg-violet-300" href="/walas/login">
                WALAS
            </a>
            <a class="block bg-green-200 shadow-md rounded-md px-4 py-8 m-4 hover:bg-violet-300" href="/sekretaris/login">
                SEKRETARIS
            </a>
            <a class="block bg-green-200 shadow-md rounded-md px-4 py-8 m-4 hover:bg-violet-300" href="/bk/login">
                Bimbingan Konseling
            </a>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>