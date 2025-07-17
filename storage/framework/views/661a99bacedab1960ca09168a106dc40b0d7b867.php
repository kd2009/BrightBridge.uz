<?php if($jobs->isEmpty()): ?>
    <p>No jobs found.</p>
<?php else: ?>
    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single_jobs white-bg d-flex justify-content-between mb-3">
            <div class="jobs_left d-flex align-items-center" style="width: 100%;">
                <div class="thumb mr-3">
                    <img src="../<?php echo e($item->img); ?>" alt="" style="width: 48px; height: 48px; object-fit: cover;">
                </div>
                <div class="jobs_conetent">
                    <a href="<?php echo e(route('job_details', ['id' => $item->id])); ?>">
                        <h4><?php echo e($item->title); ?></h4>
                    </a>
                    <div class="links_locat d-flex align-items-center">
                        <div style="width: 150px; margin-left: 10px; height: 40px;">
                            <p><i class="fa fa-map-marker"></i>
                                <span style="font-size: 0.85rem;"><?php echo e($item->location); ?></span>
                            </p>
                        </div>
                        <div style="width: 150px; margin-left: 10px; height: 40px;">
                            <p><i class="fa fa-clock-o"></i>
                                <span style="font-size: 0.85rem;"><?php echo e($item->type); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jobs_right text-right">
                <div class="apply_now mb-2">
                    <?php if(isset($userid)): ?>
                        <?php if(!empty($check[$item->id]) && $check[$item->id]): ?>
                            <a href="<?php echo e(route('myapplications', ['id' => $userid])); ?>"
                               class="boxed-btn3"
                               style="min-width: 180px; text-align: center;">
                                You have already applied
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('apply', ['id' => $item->id])); ?>"
                               class="boxed-btn3"
                               style="min-width: 180px; text-align: center;">
                                Apply Now
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="boxed-btn3"
                           style="min-width: 180px; text-align: center;">
                            Login to Apply
                        </a>
                    <?php endif; ?>
                </div>

                <div class="date">
                    <p style="font-size: 0.85rem; color: #555;">
                        Deadline: <?php echo e(\Carbon\Carbon::parse($item->date)->format('Y-m-d')); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- ✅ Pagination -->
    <div class="pagination-container mt-4">
        <?php echo e($jobs->links()); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/brightbr/public_html/resources/views/pages/filter.blade.php ENDPATH**/ ?>