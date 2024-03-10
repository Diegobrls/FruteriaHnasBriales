<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php if(session('mensaje')): ?>
                    <div class="alert alert-info"><?php echo e(session('mensaje')); ?></div>
                <?php endif; ?>
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <?php if($pedido->cesta_id !== null): ?>
                                <h2 class="text-lg font-semibold mb-2"><?php echo e($pedido->cesta->nombre); ?></h2>
                                <img src="<?php echo e($pedido->cesta->foto); ?>" alt="Foto de la cesta" style="max-width: 100%; height: auto;">
                                <h3 class="text-lg font-semibold mb-2">Para: <?php echo e($pedido->nombre_destinatario); ?></h3>
                                <p class="text-gray-700 dark:text-gray-300">Nota: <?php echo e($pedido->nota); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Fecha del pedido: <?php echo e($pedido->fecha_realizacion); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">fecha de entrega: <?php echo e($pedido->fecha_entrega); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Horario de entrega: <?php echo e($pedido->horario_entrega); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Direccion: <?php echo e($pedido->direccion); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Descripción: <?php echo e($pedido->cesta->descripcion); ?></p>
                                <h3 class="text-lg font-semibold mb-2">Precio: <?php echo e($pedido->cesta->precio); ?></h3>
                            <?php else: ?>
                                <h2 class="text-lg font-semibold mb-2"><?php echo e($pedido->cesta_personal->nombre); ?></h2>
                                <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-cesta-frutas_114360-11880.jpg?t=st=1709124155~exp=1709127755~hmac=d1c5c740d8314ce9eac83d852dd7ccba5ad17e1b6d84859da4a5ba011feec481&w=740" style="max-width: 100%; height: auto; alt="Foto de la cesta personalizada">
                                <h3 class="text-lg font-semibold mb-2">Para: <?php echo e($pedido->nombre_destinatario); ?></h3>
                                <p class="text-gray-700 dark:text-gray-300">Nota: <?php echo e($pedido->nota); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Fecha del pedido: <?php echo e($pedido->fecha_realizacion); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">fecha de entrega: <?php echo e($pedido->fecha_entrega); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Horario de entrega: <?php echo e($pedido->horario_entrega); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Direccion: <?php echo e($pedido->direccion); ?></p>
                                <p class="text-gray-700 dark:text-gray-300">Descripción: <?php echo e($pedido->cesta_personal->descripcion); ?></p>
                                <h3 class="text-lg font-semibold mb-2">Precio: <?php echo e($pedido->cesta_personal->precio); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Usuario\Desktop\Docker compose\proyecto_laravel\fruteriaHermanasBriales\resources\views/mispedidos.blade.php ENDPATH**/ ?>