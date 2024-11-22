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
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative max-w-sm mx-auto" role="alert">
                <strong class="font-bold">{{ session()->get('message') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>

             @endif

            </div>

          

            <main class="flex justify-center pt-20">
                <div class="w-full max-w-4xl bg-white  rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl font-semibold mb-6">Edite aqui os produtos disponíveis na sua loja!</h1>
                    <hr class="mb-6">
                    <form class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2" action="{{route('products.update', ['product' => $product->id])}}" method="POST">
                         @csrf
                         <input type="hidden" name="_method" value="PUT">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Nome do Produto</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Nome do produto" required>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="description">Descrição</label>
                                <textarea id="description" name="description" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Descrição do produto" required>{{ $product->description }}</textarea>

                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="price">Preço</label>
                                <input type="number" step="0.01" id="price" value="{{ $product->price }}" name="price" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Preço do produto" required>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="expiration_date">Data de Validade</label>
                                <input type="date" id="expiration_date" name="expiration_date" value="{{ $product->expiration_date }}" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" required>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="quantity">Quantidade</label>
                                <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Quantidade do produto" required>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mark_id">Marca</label>
                                <select id="mark_id" name="mark_id" class="min-w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" required>
                                    <option value="" disabled selected>Selecione a marca</option>
                                        @foreach($marks as $mark)
                                            <option value="{{ $mark->id }}" {{ $mark->id == $product->mark_id ? 'selected' : '' }}>
                                                {{ $mark->id }} - {{ $mark->mark }}
                                            </option>
                                        @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="pt-7">
                            <button type="submit" class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 text-sm w-full md:w-auto">
                                Editar
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
        
    </body>
</html>