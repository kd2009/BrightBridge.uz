

<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Candidates</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area candidate_page_padding">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center">
                        <div class="single_candidates text-center w-100">
                            <div class="thumb">
                                <img style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" 
                                     src="<?php echo e($item->img); ?>">
                            </div>
                            <a href="<?php echo e(route('candidate-detail', ['id' => $item->id])); ?>">
                                <h4><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></h4>
                            </a>
                            <p><?php echo e($item->job_position); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination_wrap">
                        <?php echo e($candidates->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("main2.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/candidate.blade.php ENDPATH**/ ?>