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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <a href="<?php echo e(route('crearcesta')); ?>" class="bg-purple-500 hover:bg-purple-700 text-white hover:text-white p-6 block text-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500">
                    <span class="text-lg font-semibold">Crear Cesta</span>
                </a>
            </div>
            <?php if(session('mensaje')): ?>
                    <div class="alert alert-info"><?php echo e(session('mensaje')); ?></div>
            <?php endif; ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"> 
                <?php $__currentLoopData = $cestasPersonal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cestas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2"><?php echo e($cestas->nombre); ?></h3>
                            <?php if($cestas->foto): ?>
                                <img src="<?php echo e($cestas->foto); ?>" alt="Foto de la cesta" style="max-width: 100%; height: auto;">
                            <?php else: ?>
                                <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-cesta-frutas_114360-11880.jpg?t=st=1709124155~exp=1709127755~hmac=d1c5c740d8314ce9eac83d852dd7ccba5ad17e1b6d84859da4a5ba011feec481&w=740" style="max-width: 100%; height: auto; alt="Foto de la cesta personalizada">
                            <?php endif; ?>
                            <p class="text-gray-700 dark:text-gray-300"><?php echo e($cestas->descripcion); ?></p>
                            <p class="text-gray-700 dark:text-gray-300">Precio: <?php echo e($cestas->precio); ?></p>
                            <p class="text-gray-700 dark:text-gray-300">Cantidad: <?php echo e($cestas->cantidad_elementos); ?></p><br>
                            <select name="elementos_<?php echo e($cestas->id); ?>" id="elementos_<?php echo e($cestas->id); ?>" class="mt-2 block w-full px-4 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-500">
                                <option value=""></option>
                                <?php $__currentLoopData = $cestas->elementos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elemento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($elemento->id); ?>"><?php echo e($elemento->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br>
                            <a href="<?php echo e(route('cestas_personal.editar', ['cestaId' => $cestas->id])); ?>" class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Editar Cesta</a></br></br>
                            <a href="<?php echo e(route('pedidos.create', ['cestaId' => $cestas->id])); ?>" class="btn btn-primary bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-2 rounded">Comprar</a>
                            <form action="<?php echo e(route('borrarcesta', $cestas->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Borrar Cesta</button>
                            </form>
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
<?php /**PATH C:\Users\Usuario\Desktop\Docker compose\proyecto_laravel\fruteriaHermanasBriales\resources\views/miscestas.blade.php ENDPATH**/ ?>