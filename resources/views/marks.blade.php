<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
        <div class="h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-red shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
    <div class="overflow-x-auto py-10 px-20">
        <table class="min-w-full table-auto bg-white border border-red-400">
            <thead>
                <tr class="bg-red-200 text-left">
                    <th class="px-4 py-2 border-b">Marca</th>
                    <th class="px-4 py-2 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                    <tr class="">
                        <td class="px-4 py-2 border-b hover:bg-red-100">{{$mark->name}}</td> 
                        <td class="px-4 py-2 border-b">
                            <a href="">
                                <button class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                                    Excluir
                                </button>
                            </a>
                            <a href="{{route('marks.edit',['mark'=>$mark->id])}}">
                                 <button class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                                    Editar
                                </button>
                            </a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>


        </div>
        
    </body>