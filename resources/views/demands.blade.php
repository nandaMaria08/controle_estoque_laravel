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

        <div class="pt-10">
            @if(session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative max-w-sm mx-auto"
                    role="alert">
                    <strong class="font-bold">{{ session()->get('message') }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>

            @endif
        </div>


        <main>
            <div class="overflow-x-auto py-10 px-20">
                <table class="min-w-full table-auto bg-white border border-red-400">
                    <thead>
                        <tr class="bg-red-200 text-left">
                            <th class="px-4 py-2 border-b">Tipo</th>
                            <th class="px-4 py-2 border-b">Ciclo</th>
                            <th class="px-4 py-2 border-b">Marca</th>
                            <th class="px-4 py-2 border-b">Data de chegada</th>
                            <th class="px-4 py-2 border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demands as $demand)
                            <tr class="">
                                <td class="px-4 py-2 border-b hover:bg-red-100">{{$demand->type}}</td>
                                <td class="px-4 py-2 border-b hover:bg-red-100">{{$demand->cycle}}</td>
                                <td class="px-4 py-2 border-b hover:bg-red-100">{{$demand->mark->mark}}</td>
                                <td class="px-4 py-2 border-b hover:bg-red-100">
                                    {{ \Carbon\Carbon::parse($demand->arrival_date)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-2 border-b">
                                    <div class="flex space-x-2">
                                        <form action="{{route('demands.destroy', ['demand' => $demand->id])}}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit"
                                                class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                                                Excluir
                                            </button>
                                        </form>

                                        <a href="{{route('demands.edit', ['demand' => $demand->id])}}">
                                            <button
                                                class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                                                Editar
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>


        <x-footer />


</body>