<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($pedidos as $pedido)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            @if ($pedido->cesta_id !== null)
                                <h2 class="text-lg font-semibold mb-2">{{ $pedido->cesta->nombre }}</h2>
                                <img src="{{ $pedido->cesta->foto }}" alt="Foto de la cesta" style="max-width: 100%; height: auto;">
                                <h3 class="text-lg font-semibold mb-2">Para: {{ $pedido->nombre_destinatario }}</h3>
                                <p class="text-gray-700 dark:text-gray-300">Nota: {{ $pedido->nota }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Fecha del pedido: {{ $pedido->fecha_realizacion }}</p>
                                <p class="text-gray-700 dark:text-gray-300">fecha de entrega: {{ $pedido->fecha_entrega }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Horario de entrega: {{ $pedido->horario_entrega }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Direccion: {{ $pedido->direccion }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Descripción: {{ $pedido->cesta->descripcion }}</p>
                                <h3 class="text-lg font-semibold mb-2">Precio: {{ $pedido->cesta->precio }}</h3>
                            @else ($pedido->cesta_personal_id)
                                <p class="text-gray-700 dark:text-gray-300">{{ $pedido->cesta_personal->nombre }}</p>
                                @if ($pedido->cestas_personal->foto)
                                    <img src="{{ $pedido->$cestas_personal->foto }}" alt="Foto de la cesta" style="max-width: 30%; height: auto;">
                                @else
                                    <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-cesta-frutas_114360-11880.jpg?t=st=1709124155~exp=1709127755~hmac=d1c5c740d8314ce9eac83d852dd7ccba5ad17e1b6d84859da4a5ba011feec481&w=740" style="max-width: 30%; height: auto; alt="Foto de la cesta personalizada">
                                @endif
                                <h3 class="text-lg font-semibold mb-2">Para: {{ $pedido->nombre_destinatario }}</h3>
                                <p class="text-gray-700 dark:text-gray-300">Nota: {{ $pedido->nota }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Fecha del pedido: {{ $pedido->fecha_realizacion }}</p>
                                <p class="text-gray-700 dark:text-gray-300">fecha de entrega: {{ $pedido->fecha_entrega }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Horario de entrega: {{ $pedido->horario_entrega }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Direccion: {{ $pedido->direccion }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Descripción: {{ $pedido->cesta_personal->descripcion }}</p>
                                <h3 class="text-lg font-semibold mb-2">Precio: {{ $pedido->cesta_personal->precio }}</h3>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
