<?php $__env->startSection("content"); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center">
       <video autoplay loop muted playsinline class="video-bg">
    <source src="../upl/banner/7777.mp4" type="video/mp4">
</video>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"><?=$countjobs?>+ Jobs listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Inspiring innovation, enabling careers</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Total Quality Management Platform Meeting Global Standards for Education & Career Growth</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="<?php echo e(route('logup')); ?>" class="boxed-btn3">Upload your Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area --> <form action="<?php echo e(route('jobs')); ?>" method="GET">
    <div class="catagory_area">
        <div class="container">
        
 <form action="<?php echo e(route('jobs')); ?>" method="GET">
    <div class="row cat_search g-3">
        <!-- Search Bar -->
        <div class="col-lg-3 col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Search jobs..."
                value="<?php echo e(request('search')); ?>" />
        </div>

        <!-- Job Type -->
        <div class="col-lg-2 col-md-6">
            <div class="single_input">
                <select name="job_type" class="wide">
                    <option value="">Select Job Type</option>
                    <?php $__currentLoopData = ['Full-time', 'Part-time', 'Internship', 'Freelance', 'Volunteering']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type); ?>" <?php echo e(request('job_type') == $type ? 'selected' : ''); ?>>
                            <?php echo e($type); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- Location -->
        <div class="col-lg-2 col-md-6">
            <div class="single_input">
                <select name="location" class="wide">
                    <option value="">Select Location</option>
                    <?php $__currentLoopData = [
                        'Uzbekistan, Tashkent', 'Uzbekistan, Samarkand', 'Uzbekistan, Bukhara',
                        'Uzbekistan, Khiva', 'Uzbekistan, Fergana', 'Uzbekistan, Namangan',
                        'Uzbekistan, Andijan', 'Uzbekistan, Nukus', 'Uzbekistan, Jizzakh',
                        'Uzbekistan, Navoi', 'Uzbekistan, Termez', 'Uzbekistan, Karshi',
                        'Uzbekistan, Gulistan', 'Uzbekistan, Angren'
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city); ?>" <?php echo e(request('location') == $city ? 'selected' : ''); ?>>
                            <?php echo e($city); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- Category -->
        <div class="col-lg-2 col-md-6">
            <div class="single_input">
                <select name="category" class="wide">
                    <option value="">Select Category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>" <?php echo e(request('category') == $item->id ? 'selected' : ''); ?>>
                            <?php echo e($item->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-lg-3 col-md-12">
            <div class="job_btn">
                <button type="submit" class="boxed-btn3 w-100">Find Job</button>
            </div>
        </div>
    </div>
</form>




            <div class="row">
                <div class="col-lg-12">
                    <div class="popular_search d-flex align-items-center">
                        <span>Popular Search:</span>
                        <ul>
<?foreach ($category as $item) {?>
                            <li><a href="<?php echo e(route('category',['id'=>$item->id])); ?>"><?=$item->title?></a></li>
<?}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </form>

<div class="container my-5">
    <h2 class="text-center">News Feed</h2>

    <div class="row mt-4">
        <?php $__currentLoopData = array_reverse(array_slice($news, -3)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $date = strtotime($newsItem->created_at);
                $day = date('d', $date);
                $month = date('M', $date);
            ?>

            <div class="col-md-4" style="margin-top: 10px;">
                <article class="news_card">
                    <div class="news_img">
                        <img src="<?php echo e(asset($newsItem->img)); ?>" alt="News Image">
                      
                    </div>
                    <div class="news_details">
                        <a href="<?php echo e(route('single-blog', ['id' => $newsItem->id])); ?>">
                            <h5><?php echo e($newsItem->title); ?></h5>
                        </a>
                        <a href="<?php echo e(route('blogpost')); ?>" class="read_more">Read more →</a>
                    </div>
                </article>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- More News Button -->
    <div class="text-center mt-4">
        <a href="<?php echo e(route('blogpost')); ?>" class="boxed-btn3">More news →</a>
    </div>
</div>

    
    
    
    


    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popular Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                
<?foreach ($category as $item) {?>
              

                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="<?php echo e(route('category',['id'=>$item->id])); ?>"><h4><?=$item->title?></h4></a>
                        <p> <span><?=$categoryJobCounts[$item->id] ?></span> Available jobs</p>
                    </div>
                </div>
<?}?>
              
               
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->
    
    
    
    
    

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="<?php echo e(('jobs')); ?>" class="boxed-btn3">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                   
<?php foreach ($jobs as $item) {?>
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img style="width: 48px; height: 48px;" src="<?=$item->img?>">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="<?php echo e(route('job_details',['id'=>$item->id])); ?>"><h4><?=$item->title?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?=$item->location?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?=$item->type?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a href="<?php echo e(route('job_details',['id'=>$item->id])); ?>" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>Date line: <?=$item->date?></p>
                                </div>
                            </div>
                        </div>
                    </div>

<?php }?>


                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
 

    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="<?php echo e(route('jobs')); ?>" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="<?php echo e(route('postjob')); ?>" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
  
  <!-- Sponsors Section -->
<div class="sponsors_area my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Our Sponsors</h3>
                </div>
            </div>
        </div>

        <!-- Desktop Grid Layout -->
        <div class="row d-none d-md-flex justify-content-center">
            <?php foreach ($sponsors2 as $sponsor) { ?>
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex flex-column align-items-center">
                    <div class="single_sponsor_wrapper">
                        <div class="single_sponsor">
                            <img src="<?= $sponsor->logo ?>" alt="<?= $sponsor->name ?>" class="sponsor-img">
                        </div>
                        <p class="sponsor-name"> <?= $sponsor->name ?> </p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Mobile Carousel Layout -->
        <div class="owl-carousel sponsors-carousel d-md-none">
            <?php foreach ($sponsors2 as $sponsor) { ?>
                <div class="single_sponsor_wrapper text-center">
                    <div class="single_sponsor">
                        <img src="<?= $sponsor->logo ?>" alt="<?= $sponsor->name ?>" class="sponsor-img">
                    </div>
                    <p class="sponsor-name"> <?= $sponsor->name ?> </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Partners Section -->
<div class="sponsors_area my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Our Partners</h3>
                </div>
            </div>
        </div>

        <!-- Desktop Grid Layout -->
        <div class="row d-none d-md-flex justify-content-center">
            <?php foreach ($sponsors as $sponsor) { ?>
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex flex-column align-items-center">
                    <div class="single_sponsor_wrapper">
                        <div class="single_sponsor">
                            <img src="<?= $sponsor->logo ?>" alt="<?= $sponsor->name ?>" class="sponsor-img">
                        </div>
                        <p class="sponsor-name"> <?= $sponsor->name ?> </p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Mobile Carousel Layout -->
        <div class="owl-carousel sponsors-carousel d-md-none">
            <?php foreach ($sponsors as $sponsor) { ?>
                <div class="single_sponsor_wrapper text-center">
                    <div class="single_sponsor">
                        <img src="<?= $sponsor->logo ?>" alt="<?= $sponsor->name ?>" class="sponsor-img">
                    </div>
                    <p class="sponsor-name"> <?= $sponsor->name ?> </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {
    function initOwlCarousel() {
        if ($(window).width() < 768) { // Mobile view
            if (!$(".sponsors-carousel").hasClass("owl-loaded")) {
                $(".sponsors-carousel").addClass("owl-loaded").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true, // Enable navigation arrows
                    navText: ["<span class='carousel-nav prev'>&#9665;</span>", "<span class='carousel-nav next'>&#9655;</span>"], // Custom left & right arrows
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 2 },
                        1000: { items: 3 }
                    }
                });
            }
        } else { // Desktop view
            if ($(".sponsors-carousel").hasClass("owl-loaded")) {
                $(".sponsors-carousel").trigger("destroy.owl.carousel").removeClass("owl-loaded");
                $(".sponsors-carousel").find(".owl-stage-outer").children().unwrap();
            }
        }
    }

    initOwlCarousel(); // Initialize on page load
    $(window).resize(function () {
        initOwlCarousel(); // Reinitialize on window resize
    });
});

</script>

<style>
    .single_sponsor_wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    .single_sponsor {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px; /* Ensuring all sponsors have the same width */
        height: 100px; /* Fixed height for uniformity */
    }
    .sponsor-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .sponsor-name {
        margin-top: 5px;
        font-size: 14px;
        white-space: nowrap; /* Ensures the name stays in one line */
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
        width: 150px; /* Same width as image */
    }
    /* Hide carousel in desktop view */
@media (min-width: 768px) {
    .sponsors-carousel {
        display: none !important;
    }
}

/* Hide grid layout in mobile view */
@media (max-width: 767px) {
    .row.d-none.d-md-flex {
        display: none !important;
    }
}
/* Style for navigation arrows */
.carousel-nav {
    font-size: 24px; 
    color: black; /* Arrow color */
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.8);
    padding: 5px 10px;
    border-radius: 50%;
    z-index: 1000;
    transition: background 0.3s;
}

/* Left arrow */
.prev {
    left: -30px; /* Adjust as needed */
}

/* Right arrow */
.next {
    right: -30px; /* Adjust as needed */
}

/* Hover effect */
.carousel-nav:hover {
    background: rgba(255, 255, 255, 1);
}


</style>

                    
                    
                    
                    
           <!-- testimonial_area  -->
  <div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Testimonial</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <!-- The Owl Carousel Container -->
                <div class="owl-carousel owl-theme">

                    <?php foreach ($testimonials as $item) { ?>
                        <div class="single_carousel">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="thumb">
                                    <!-- Check for valid image, fallback if missing -->
                                    <img src="upl/<?= !empty($item->img) ? $item->img : 'default-image.jpg' ?>" alt="Testimonial Image">
                                    <div class="quote_icon">
                                        <i class="Flaticon flaticon-quote"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <!-- Ensure text is not empty -->
                                    <p><?= !empty($item->text) ? $item->text : 'No testimonial text available.' ?></p>
                                    <span>- <?= !empty($item->fullname) ? $item->fullname : 'Anonymous' ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Owl Carousel Initialization --><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
          
            dots: true,
           
        });
    });
</script>

<style>


.news_card:hover {
    transform: translateY(-5px);
}

.news_img {
    position: relative;
}







.news_card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    display: flex;
    flex-direction: column;
    height: 100%; /* Ensures all cards have the same height */
}

.news_img img {
    width: 100%;
    height: 200px; /* Ensures all images have the same height */
    object-fit: cover;
    border-bottom: 3px solid #007bff;
}

.news_details {
    flex-grow: 1; /* Ensures the content area grows equally */
    padding: 15px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.news_details h5 {
    flex-grow: 1; /* Allows the title section to adjust properly */
    margin-bottom: 5px;
}

.read_more {
    display: block;
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    margin-top: auto; /* Pushes the read more button to the bottom */
}


















  .video-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}


   .news-card {
            position: relative;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
        }
        .news-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .news-content {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }</style>
        
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        
        
        
   <?php $__env->stopSection(); ?>
<?php echo $__env->make("main2.main2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/index.blade.php ENDPATH**/ ?>