<!DOCTYPE html>
<html lang="en" x-data="{ open: false, form: null }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


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

        <div class="px-20 mt-4 flex justify-end">
            <a href="{{ route('clients.create') }}">
                <button class="px-6 py-3 bg-red-300 text-white rounded-lg hover:bg-red-400 transition duration-200">
                    + Novo Cliente
                </button>
            </a>
        </div>
        

        <main>
            <div class="overflow-x-auto py-10 px-20">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full table-auto bg-white border border-red-400">
                        <thead>
                            <tr class="bg-red-200 text-left">
                                <th class="px-4 py-2 border-b">Nome</th>
                                <th class="px-4 py-2 border-b">Telefone</th>
                                <th class="px-4 py-2 border-b">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td class="px-4 py-2 border-b hover:bg-red-100">{{ $client->name }}</td>
                                <td class="px-4 py-2 border-b hover:bg-red-100">
                                    {{ preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $client->phone) }}
                                </td>
                                <td class="px-4 py-2 border-b">
                                    <div class="flex space-x-2">
                                        <form x-ref="deleteForm{{ $client->id }}" action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                @click="open = true; form = $refs.deleteForm{{ $client->id }}"
                                                class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                                                Excluir
                                            </button>
                                        </form>

                                        <a href="{{ route('clients.edit', ['client' => $client->id]) }}">
                                            <button class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
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
            </div>
        </main>
    </div>


    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Tem certeza que deseja excluir?</h2>
            <div class="flex justify-end gap-4">
                <button @click="open = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                <button @click="form.submit()" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Excluir</button>
            </div>
        </div>
    </div>
</body>
</html>
