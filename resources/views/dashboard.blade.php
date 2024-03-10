<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 font-semibold">
            <h1 class="text-4xl font-bold mb-3">Cestas de regalo</h1>
            <!-- Crear cesta si eres admin -->
            @if(Auth::id() == 4)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                    <a href="{{ route('crearcestacatalogo') }}" class="bg-purple-500 hover:bg-purple-700 text-white hover:text-white p-6 block text-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500">
                        <span class="text-lg font-semibold">Crear cesta del catálogo</span>
                    </a>
                </div>
            @endif
            <!-- filtro -->
            <div class="mt-4 px-6 py-6">
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="mb-3">
                        <label for="precio_min" class="form-label">Precio mínimo:</label>
                        <input type="number" class="form-control bg-purple-100" id="precio_min" name="precio_min">
                        <label for="precio_max" class="form-label">Precio máximo:</label>
                        <input type="number" class="form-control bg-purple-100" id="precio_max" name="precio_max">
                        <label for="elementos" class="form-label">Elementos mínimos:</label>
                        <input type="number" class="form-control bg-purple-100" id="elementos" name="elementos">
                    </div>
                    <button type="submit" class="btn text-purple-700 hover:text-purple-900">Filtrar</button>
                </form>
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="mb-3">
                        <label for="ordenar_por" class="form-label">Ordenar por:</label>
                        <select class="form-control bg-purple-100 " id="ordenar_por" name="ordenar_por">
                            <option value="precio_asc">Precio ascendente</option>
                            <option value="precio_desc">Precio descendente</option>
                            <option value="elementos_asc">Elementos ascendente</option>
                            <option value="elementos_desc">Elementos descendente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn text-purple-700 hover:text-purple-900">Ordenar</button>
                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($cestas as $cesta)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex flex-col justify-between h-full">
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-center mb-4">{{ $cesta->nombre }}</h3>
                            <img src="{{ asset($cesta->foto) }}" alt="Foto de la cesta" style="max-width: 100%; height: auto;">
                            <p class="text-gray-700 dark:text-gray-300 mt-5">{{ $cesta->descripcion }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Precio: {{ $cesta->precio }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Cantidad de elementos: {{ $cesta->cantidad_elementos }}</p>
                            <label for="elementos_{{ $cesta->id }}" class="text-gray-700 dark:text-gray-300">Productos que contiene:</label>
                            <select name="elementos_{{ $cesta->id }}" id="elementos_{{ $cesta->id }}" class="mt-2 block w-full px-4 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                                <option value=""></option>
                                @foreach ($cesta->elementos as $elemento)
                                    <option value="{{ $elemento->id }}">{{ $elemento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::id() == 4)
                            <div class="mt-4 col-12">
                                <a href="{{ route('cestas.editar', ['cestaId' => $cesta->id]) }}" class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Editar Cesta</a></br></br>
                                <form action="{{ route('borrarcestaadmin', $cesta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Borrar Cesta</button>
                                </form>                            
                            </div class="mb-4">
                        @endif
                        <a href="{{ route('pedidos.create', ['cestaId' => $cesta->id]) }}" class="btn btn-primary bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-2 rounded mt-4">Comprar</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
