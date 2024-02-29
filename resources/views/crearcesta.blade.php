<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-purple-100 rounded-lg p-8">
                @if (session('alert'))
                    <script>alert('{{ session('alert') }}');</script>
                @endif
                <h1 class="text-2xl font-semibold mb-6 text-purple-600">Crear Nueva Cesta</h1>
                <form action="{{ route('guardarCesta') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="cestas_personal" class="block text-lg font-medium text-gray-700">Nombre de la cesta:</x-input-label>
                        <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" required>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="cestas_personal" class="block text-lg font-medium text-gray-700">Descripción:</x-input-label>
                        <textarea id="descripcion" name="descripcion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" required></textarea>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="cestas_personal" class="block text-lg font-medium text-gray-700">Foto (opcional):</x-input-label>
                        <input type="file" id="foto" name="foto" class="text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                    </div>
                    <x-input-label for="elementos" class="mb-3 text-lg" :value="__('Elementos')" />
                    <div class="mb-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
                        @foreach($elementos as $elemento)
                            <div class="flex items-center">
                                <input type="checkbox" id="elemento{{ $elemento->id }}" name="elementos[]" value="{{ $elemento->id }}" class="text-purple-600 border rounded focus:outline-none focus:border-purple-500">
                                <label for="elemento{{ $elemento->id }}" class="ml-2 text-sm font-medium text-gray-700">{{ $elemento->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded hover:bg-purple-700">Crear Cesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
