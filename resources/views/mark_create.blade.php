<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>{{ config('app.name', 'Laravel') }}</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
        <div class="h-screen bg-white">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-red shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset



            <main class="flex justify-center pt-20">
                <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl font-semibold mb-6">Cadastre aqui as marcas disponíveis na sua loja!</h1>
                    <hr class="mb-6">
                    <div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-red-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    <form class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2" action="{{ route('marks.store') }}" method="POST">
                        @csrf 

            
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mark">Marca</label>
                                <input type="text" id="mark" name="mark" required class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Escreva a marca" >
                            </div>
                        </div>

           
                        <div class="pt-7 flex justify-center md:justify-start">
                            <button type="submit" class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 text-sm w-full md:w-auto">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </main>

        </div>
    </body>
</html>