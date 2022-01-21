<?php if($paginator->hasPages()): ?>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <?php if($paginator->onFirstPage()): ?>
            <a class="pagination-previous" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>" disabled>Previous</a>
        <?php else: ?>
            <a class="pagination-previous" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">Previous</a>
        <?php endif; ?>
        <ul class="pagination-list">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                <?php endif; ?>
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li><a class="pagination-link is-current" aria-label="Page <?php echo e($page); ?>" aria-current="page"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li><a class="pagination-link" href="<?php echo e($url); ?>" aria-label="Goto page <?php echo e($page); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if($paginator->hasMorePages()): ?>
            <a class="pagination-next" href="<?php echo e($paginator->nextPageUrl()); ?>">Next page</a>
        <?php else: ?>
            <a class="pagination-next" disabled>Next page</a>
        <?php endif; ?>
    </nav>
<?php endif; ?>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/vendor/pagination/bootstrap-4.blade.php ENDPATH**/ ?>