<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JobCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="description" content="BrightBridge to Success, JobCare for Growth. Total Quality Management Platform Meeting Global Standards for Education & Career Growth">
    <meta name="keywords" content="brightbridge, jobcare, jobs, ishlari, vacancies, vakansiyalar, upwork">
    <meta name="author" content="Abbos Utkirov">

    <!-- Open Graph -->
    <meta property="og:title" content="JobCare - BrightBridge">
    <meta property="og:description" content="BrightBridge to Success, JobCare for Growth.">
    <meta property="og:image" content="<?php echo e(asset('public/upl/jobcare-logo.jpg')); ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="<?php echo e(url('main')); ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="JobCare - BrightBridge">
    <meta name="twitter:description" content="BrightBridge to Success, JobCare for Growth.">
    <meta name="twitter:image" content="<?php echo e(asset('public/upl/jobcare-logo.jpg')); ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('public/upl/favicon.ico')); ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo e(asset('public/upl/jobcare-logo.jpg')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('public/upl/favicon.ico')); ?>">

    <!-- Owl Carousel CSS (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<style>
    
/* Remove underline from all elements */
* {
    text-decoration: none !important;
}


</style>


<body>
    <?php echo $__env->make("inc.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent("content"); ?>

    <?php echo $__env->make("inc.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ajax-form.js')); ?>"></script>
    <script src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scrollIt.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.slicknav.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('js/gijgo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/range.js')); ?>"></script>

    <!-- Contact Scripts -->
    <script src="<?php echo e(asset('js/contact.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.ajaxchimp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mail-script.js')); ?>"></script>

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <!-- Salary Range Slider -->
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 24600,
                values: [750, 24600],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1] + "/ Year");
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1) + "/ Year");
        });
    </script>
</body>
</html>
<?php /**PATH /home/brightbr/public_html/resources/views/main2/main2.blade.php ENDPATH**/ ?>