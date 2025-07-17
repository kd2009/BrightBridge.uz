<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>News</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        
<?php foreach ($blog as $item) { 
    // Extract day and month from created_at timestamp
    $date = strtotime($item->created_at);
    $day = date('d', $date);  // Day as two digits
    $month = date('M', $date); // Month as abbreviated name (e.g., Jan, Feb)
?>

    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="../<?=$item->img?>" alt="">
            <a href="#" class="blog_item_date">
                <h3><?=$day?></h3>
                <p><?=$month?></p>
            </a>
        </div>

        <div class="blog_details">
            <a class="d-inline-block" href="<?php echo e(route('single-blog', ['id' => $item->id])); ?>">
               <h2><?=$item->title?></h2>
            </a><br>
            <?=$item->about?>
        </div>
    </article>

<?php } ?>


                     

                     
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                       
                      <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                               <?foreach ($category as $item) {?>

                                <li>

                                    <a href="<?php echo e(route('newscategory',['id'=>$item->id])); ?>" class="d-flex">
                                        <p><?=$item->title?></p>
                                    </a>
                                </li>
                               
<?                               }?>
   <li>

                                    <a href="<?php echo e(route('blogpost')); ?>" class="d-flex">
                                        <p>All news</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>
    <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Recent Post</h3>
                    <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="media post_item">
                            <!-- Correct image path -->
                            <img src="../<?=$post->img?>" alt="post" style="width: 50px;height: 50px;object-fit: contain;">
                            <div class="media-body">
                                <a href="<?php echo e(route('single-blog', ['id' => $post->id])); ?>">
                                    <h3><?php echo e($post->title); ?></h3>
                                </a>
                                <p><?php echo e($post->created_at->format('F d, Y')); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </aside>


                        
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make("main2.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/blog.blade.php ENDPATH**/ ?>