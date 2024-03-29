<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-purple-100 rounded-lg p-8">
                @if (session('alert'))
                    <div class="alert alert-danger">{{ session('alert') }}</div>
                @endif
                <h1 class="text-2xl font-semibold mb-6 text-purple-600">Editar Cesta</h1>
                <div class="container">            
                    <form action="{{ route('cestas_personal.actualizar', ['id' => $cesta->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $cesta->nombre }}" placeholder="Nombre antiguo" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="3" placeholder="Descripción antigua" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $cesta->descripcion }}</textarea>
                        </div>
                        <div class="mb-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
                        @foreach($elementosDisponibles as $elemento)
                            <div class="flex items-center">
                                <input type="checkbox" id="elemento{{ $elemento->id }}" name="elementos[]" value="{{ $elemento->id }}" class="text-purple-600 border rounded focus:outline-none focus:border-purple-500" {{ $cesta->elementos->contains($elemento) ? 'checked' : '' }}>
                                <label for="elemento{{ $elemento->id }}" class="ml-2 text-sm font-medium text-gray-700">{{ $elemento->nombre }}</label>
                                <p class="text-sm text-gray-500"> (+{{ $elemento->valor }}€)</p>
                            </div>
                        @endforeach
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded hover:bg-purple-700">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
