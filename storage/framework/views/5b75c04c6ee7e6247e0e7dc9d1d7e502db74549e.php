

<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Detailed News</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <!-- Left Side (Main Blog Post) -->
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="../<?= $blog[0]->img ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?= $blog[0]->title ?></h2>
                  <?php echo $blog[0]->info; ?>





                     
                     <!-- YouTube Embed Code -->
                     <!-- YouTube Embed Code -->
<?php
if (!empty($blog[0]->youtube)) {
    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/', 
               $blog[0]->youtube, $matches);
    $youtubeID = $matches[1] ?? '';

    if (!empty($youtubeID)) {
        // Check if the URL contains "shorts"
        $isShorts = strpos($blog[0]->youtube, 'shorts') !== false;

        // Set dynamic styles for normal videos vs. Shorts
        $iframeStyle = $isShorts 
            ? "width: 50%; height: 500px; display: flex; justify-content: center; align-items: center;margin: auto;" 
            : "width: 100%; height: 350px;";

        echo '<div class="youtube-video" style="' . ($isShorts ? 'text-align:center;' : '') . '">
                  <iframe style="' . $iframeStyle . '" 
                          src="https://www.youtube.com/embed/' . $youtubeID . '" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                          allowfullscreen>
                  </iframe>
              </div>';
    }
}
?>

                  </div>
               </div>

               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/sharer.php?u=<?= url()->current() ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/share?url=<?= url()->current() ?>&text=<?= urlencode($blog[0]->title) ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://dribbble.com/shots/new?url=<?= url()->current() ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="https://www.behance.net/?url=<?= url()->current() ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
               </div>
            </div>

            <!-- Right Sidebar (Categories & Recent Posts) -->
            <div class="col-lg-4 d-flex flex-column">
               <div class="blog_right_sidebar">
                   
                   <!-- Categories Section -->
                   <aside class="single_sidebar_widget post_category_widget">
                       <h4 class="widget_title">Category</h4>
                       <ul class="list cat-list">
                           <?php foreach ($category as $item) { ?>
                               <li>
                                   <a href="<?php echo e(route('newscategory', ['id' => $item->id])); ?>" class="d-flex">
                                       <p><?= $item->title ?></p>
                                   </a>
                               </li>
                           <?php } ?>
                           <li>
                               <a href="<?php echo e(route('blogpost')); ?>" class="d-flex">
                                   <p>All news</p>
                               </a>
                           </li>
                       </ul>
                   </aside>

                   <!-- Recent Posts Section -->
                   <aside class="single_sidebar_widget popular_post_widget">
                       <h3 class="widget_title">Recent Post</h3>
                       <?php foreach ($recentPosts as $post) { ?>
                           <div class="media post_item">
                               <img src="<?= asset($post->img) ?>" alt="post" style="width: 50px; height: 50px; object-fit: contain;">
                               <div class="media-body">
                                   <a href="<?php echo e(route('single-blog', ['id' => $post->id])); ?>">
                                       <h3><?= $post->title ?></h3>
                                   </a>
                                   <p><?= date('F d, Y', strtotime($post->created_at)) ?></p>
                               </div>
                           </div>
                       <?php } ?>
                   </aside>

               </div>
            </div>

         </div>
      </div>
   </section>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make("main2.main2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/single-blog.blade.php ENDPATH**/ ?>