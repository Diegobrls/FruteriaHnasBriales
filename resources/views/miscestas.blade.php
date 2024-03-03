<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <a href="{{ route('crearcesta') }}" class="bg-purple-500 hover:bg-purple-700 text-white hover:text-white p-6 block text-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500">
                    <span class="text-lg font-semibold">Crear Cesta</span>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"> 
                @foreach ($cestasPersonal as $cestas)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $cestas->nombre }}</h3>
                            @if ($cestas->foto)
                                <img src="{{ $cestas->foto }}" alt="Foto de la cesta" style="max-width: 100%; height: auto;">
                            @else
                                <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-cesta-frutas_114360-11880.jpg?t=st=1709124155~exp=1709127755~hmac=d1c5c740d8314ce9eac83d852dd7ccba5ad17e1b6d84859da4a5ba011feec481&w=740" style="max-width: 100%; height: auto; alt="Foto de la cesta personalizada">
                            @endif
                            <p class="text-gray-700 dark:text-gray-300">{{ $cestas->descripcion }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Precio: {{ $cestas->precio }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Cantidad: {{ $cestas->cantidad_elementos }}</p><br>
                            <a href="{{ route('cestas_personal.editar', ['cestaId' => $cestas->id]) }}" class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Editar Cesta</a></br></br>
                            <a href="{{ route('pedidos.create', ['cestaId' => $cestas->id]) }}" class="btn btn-primary bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-2 rounded">Comprar</a>
                            <form action="{{ route('borrarcesta', $cestas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Borrar Cesta</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
