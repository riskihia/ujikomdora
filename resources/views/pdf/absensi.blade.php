<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    {{-- @vite('resources/css/app.css') --}}
    <style>
        #tabel, tr, td, th{
            /* background-color: green; */
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
            padding: 6px 12px 6px 12px;
        }
    </style>
</head>
<body>
    <div>
        <table id="tabel">
            @if ($isShowBulan)
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ($absensis->groupBy(function ($item) {
                            return \Carbon\Carbon::parse($item->tanggal)->weekOfYear;
                        }) as $week => $weekAbsensis)
                            <th>{{ 'Minggu ' . $week }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nama }}</td>
                            @foreach ($absensis->groupBy(function ($item) {
                                return \Carbon\Carbon::parse($item->tanggal)->weekOfMonth;
                            }) as $week => $weekAbsensis)
                                <td>
                                    @php
                                        $attendanceCount = $weekAbsensis->filter(function ($item) use ($siswa) {
                                            return $item->siswa_id == $siswa->id && $item->status == 'Hadir';
                                        })->count();
                                    @endphp
                                    {{ $attendanceCount }} hari hadir
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
                </tbody>
            @else
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ($absensis->unique('tanggal') as $data)
                            <th>{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nama }}</td>
                            @foreach ($absensis as $data)
                                @if ($data->siswa_id == $siswa->id)
                                    <td>{{ $data->status }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
  {{-- @vite('resources/js/app.js') --}}
</body>
</html>