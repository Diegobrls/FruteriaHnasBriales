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
            <?php if(session('alert')): ?>
                <div class="alert alert-danger"><?php echo e(session('alert')); ?></div>
            <?php endif; ?>
            <h1 class="text-2xl font-semibold mb-6 text-purple-600">Cestas de regalo</h1>
            <div class="container bg-purple-100 rounded-lg p-8">
                <h2 class="text-xl font-semibold mb-4 text-purple-800">Realizar Pedido</h2>
                <form action="<?php echo e(route('pedidos.crear')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($cesta_personal)): ?>
                        <input type="hidden" name="cesta_personal_id" value="<?php echo e($cesta_personal->id); ?>">
                    <?php elseif(isset($cesta)): ?>
                        <input type="hidden" name="cesta_id" value="<?php echo e($cesta->id); ?>">
                    <?php endif; ?>
                    <div class="mb-4">
                        <label for="nota" class="block text-sm font-medium text-gray-700">Nota:</label>
                        <textarea name="nota" id="nota" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500" rows="4"></textarea>
                        <?php $__errorArgs = ['nota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección de entrega:</label>
                        <input type="text" name="direccion" id="direccion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label for="nombre_destinatario" class="block text-sm font-medium text-gray-700">Nombre del destinatario:</label>
                        <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        <?php $__errorArgs = ['nombre_destinatario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label for="horario_entrega" class="block text-sm font-medium text-gray-700">Horario de entrega:</label>
                        <input type="text" name="horario_entrega" id="horario_entrega" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        <?php $__errorArgs = ['horario_entrega'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_entrega" class="block text-sm font-medium text-gray-700">Fecha de entrega:</label>
                        <input type="date" name="fecha_entrega" id="fecha_entrega" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                        <?php $__errorArgs = ['fecha_entrega'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded hover:bg-purple-700">Realizar Pedido</button>
                </form>
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
<?php /**PATH C:\Users\Usuario\Desktop\Docker compose\proyecto_laravel\fruteriaHermanasBriales\resources\views/crearpedido.blade.php ENDPATH**/ ?>