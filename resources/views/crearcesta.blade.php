<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-purple-100 rounded-lg p-8">
                @if (session('alert'))
                    <div class="alert alert-danger">{{ session('alert') }}</div>
                @endif
                <h1 class="text-2xl font-semibold mb-6 text-purple-600">Crear Nueva Cesta</h1>
                <form action="{{ route('guardarCesta') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="nombre" class="block text-lg font-medium text-gray-700">Nombre de la cesta:</x-input-label>
                        <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" required>
                        @error('nombre')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="descripcion" class="block text-lg font-medium text-gray-700">Descripción:</x-input-label>
                        <textarea id="descripcion" name="descripcion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" required></textarea>
                        @error('descripcion')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-input-label for="elementos" class="mb-3 text-lg" :value="__('Selecciona al menos 5 elementos:')" /> 
                    <div class="mb-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
                        @foreach($elementos as $elemento)
                            <div class="flex items-center">
                                <input type="checkbox" id="elemento{{ $elemento->id }}" name="elementos[]" value="{{ $elemento->id }}" class="text-purple-600 border rounded focus:outline-none focus:border-purple-500">
                                <label for="elemento{{ $elemento->id }}" class="ml-2 text-sm font-medium text-gray-700">{{ $elemento->nombre  }} </label>
                                <p class="text-sm text-gray-500"> (+{{ $elemento->valor }}€)</p>
                            </div>
                        @endforeach
                    </div>
                    @error('elementos')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    <div class="mb-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                        <input type="file" id="foto" name="foto" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        @error('foto')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded hover:bg-purple-700">Crear Cesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
