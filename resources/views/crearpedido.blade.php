<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('alert'))
                <div class="alert alert-danger">{{ session('alert') }}</div>
            @endif
            <h1 class="text-2xl font-semibold mb-6 text-purple-600">Cestas de regalo</h1>
            <div class="container bg-purple-100 rounded-lg p-8">
                <h2 class="text-xl font-semibold mb-4 text-purple-800">Realizar Pedido</h2>
                <form action="{{ route('pedidos.crear') }}" method="POST">
                    @csrf
                    @if(isset($cesta_personal))
                        <input type="hidden" name="cesta_personal_id" value="{{ $cesta_personal->id }}">
                    @elseif(isset($cesta))
                        <input type="hidden" name="cesta_id" value="{{ $cesta->id }}">
                    @endif
                    <div class="mb-4">
                        <label for="nota" class="block text-sm font-medium text-gray-700">Nota:</label>
                        <textarea name="nota" id="nota" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" rows="4"></textarea>
                        @error('nota')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección de entrega:</label>
                        <input type="text" name="direccion" id="direccion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        @error('direccion')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nombre_destinatario" class="block text-sm font-medium text-gray-700">Nombre del destinatario:</label>
                        <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        @error('nombre_destinatario')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="horario_entrega" class="block text-sm font-medium text-gray-700">Horario de entrega:</label>
                        <input type="text" name="horario_entrega" id="horario_entrega" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        @error('horario_entrega')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fecha_entrega" class="block text-sm font-medium text-gray-700">Fecha de entrega:</label>
                        <input type="date" name="fecha_entrega" id="fecha_entrega" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        @error('fecha_entrega')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded hover:bg-purple-700">Realizar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
