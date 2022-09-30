<?php if($paginator->hasPages()): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <?php echo __('pagination.previous'); ?>
                        </span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="page-link">
                            <?php echo __('pagination.previous'); ?>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="page-link">
                        <?php echo __('pagination.next'); ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <?php echo __('pagination.next'); ?>
                        </span>
                    </li>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\Users\is41-plechevdd\PhpstormProjects\laravel9\vendor\laravel\framework\src\Illuminate\Pagination/resources/views/simple-tailwind.blade.php ENDPATH**/ ?>
