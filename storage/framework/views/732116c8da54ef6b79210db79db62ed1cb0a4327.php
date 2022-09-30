<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 p-3">
                <h2>Все товары для покупки</h2>
                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-2 mb-2">
                            <div class="card" style="width: 100%;">
                                <img src="/storage/<?php echo e($product->photo); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                    <p class="card-text">Стоимость <?php echo e($product->price); ?></p>
                                    <a href="#" class="btn btn-primary">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\is41-plechevdd\PhpstormProjects\laravel9\resources\views/users/product/main.blade.php ENDPATH**/ ?>