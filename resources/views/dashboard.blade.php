<x-app-layout>
    

   <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>  -->

    <div class="px-20 pt-10 flex flex-wrap justify-between gap-6">
        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/marcas.jpg')}}" alt="marcas">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Cadastrar Marcas</div>
                <p class="text-gray-700 text-base">
                    Cadastre aqui as marcas existentes na sua loja!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>

        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/cosmeticos.jpg')}}" alt="cosmeticos">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Cadastrar Produtos</div>
                <p class="text-gray-700 text-base">
                    Cadastre aqui os produtos disponíveis na sua loja!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>

        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/relatorio.jpg')}}" alt="pedidos">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Cadastrar Pedidos</div>
                <p class="text-gray-700 text-base">
                    Cadastre aqui as datas de chegada dos seus pedidos e sua marca!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>

    <div class="px-20 pt-10 flex flex-wrap justify-between gap-6">
        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/marcas.jpg')}}" alt="marcas">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Cadastrar Revistas</div>
                <p class="text-gray-700 text-base">
                    Cadastre aqui as revistas disponíveis de acordo com a marca e com o ciclo!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>

        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/cosmeticos.jpg')}}" alt="cosmeticos">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Cadastrar Empréstimo</div>
                <p class="text-gray-700 text-base">
                    Cadastre aqui os produtos emprestados para outras revendedoras!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>

        <div class="max-w-xs w-full sm:w-1/2 md:w-1/3 lg:w-1/4 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('assets/img/relatorio.jpg')}}" alt="pedidos">
            <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2">Relatório de estoque!</div>
                <p class="text-gray-700 text-base">
                    Olhe aqui seu relatório de estoque!
                </p> 
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>


</x-app-layout>
