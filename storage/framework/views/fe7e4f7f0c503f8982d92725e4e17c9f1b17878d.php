

<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Candidate Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="candidate_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="candidate_details_header">
                        <div class="single_candidate white-bg d-flex justify-content-between">
                            <div class="candidate_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="../<?=$info[0]->img?>" alt="Candidate Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                </div>
                                <div class="candidate_content">
                                    <h4><?=$info[0]->first_name?> <?=$info[0]->last_name?></h4>
                                    <div class="details_location d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-envelope"></i> <?=$info[0]->email?></p>
                                        </div>
                                        <div class="location">
                                            <p>  <i class="fa fa-phone"></i> <?=$info[0]->phone?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Age</h4>
                            <p><?=$info[0]->age?></p>
                        </div> <div class="single_wrap">
                            <h4>Job Position</h4>
                            <p><?=$info[0]->job_position?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Skills</h4>
                            <p><?=$info[0]->skills?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Experience</h4>
                            <p><?=$info[0]->experience_years?> years</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Address</h4>
                            <p><?=$info[0]->address?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Expected Salary</h4>
                            <p><?=$info[0]->expected_salary?> sums</p>
                        </div>

                        <div class="single_wrap">
                            <h4>Uploaded Resume</h4>
                             <a href="<?php echo e(asset($info[0]->resume)); ?>" target="_blank" class="text-decoration-none">
                                            View Resume
                                        </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="candidate_summary">
                        <div class="summary_header">
                            <h3>Candidate Summary</h3>
                        </div>
                        <div class="summary_content">
                            <ul>
                                <li>Name: <span><?=$info[0]->first_name?> <?=$info[0]->last_name?></span></li>
                                <li>Age: <span><?=$info[0]->age?></span></li>
                                <li>Email: <span><?=$info[0]->email?></span></li>
                                <li>Phone: <span><?=$info[0]->phone?></span></li>
                                <li>Experience: <span><?=$info[0]->experience_years?> years</span></li>
                                <li>Expected Salary: <span>$<?=$info[0]->expected_salary?></span></li>
                                <li>Address: <span><?=$info[0]->address?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                           <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://candidate-details.uz"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="https://wa.me/?text=https://candidate-details.uz"> <i class="fa fa-whatsapp"></i></a> </li>
                            <li><a href="https://t.me/share/url?url=https://candidate-details.uz&text=Check%20this%20out!"> <i class="fa fa-telegram"></i></a> </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<style type="text/css">/* General Styles */
.bradcam_area {
    background-color: #f5f5f5;
    padding: 50px 0;
    text-align: center;
    margin-bottom: 30px;
}

.bradcam_text h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
}

.candidate_details_area {
    font-family: Arial, sans-serif;
}

/* Candidate Header */
.candidate_details_header {
    margin-bottom: 30px;
}

.single_candidate {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    display: flex;
    align-items: center;
}

.candidate_left .thumb {
    margin-right: 20px;
}

.candidate_left img {
    border: 3px solid #ddd;
    background-color: #fff;
    transition: transform 0.3s ease;
}

.candidate_left img:hover {
    transform: scale(1.1);
}

.candidate_content h4 {
    font-size: 1.5rem;
    color: #555;
    margin-bottom: 10px;
}

.details_location p {
    margin: 0;
    color: #666;
    font-size: 0.9rem;
}

/* Content Section */
.descript_wrap {
    margin-top: 30px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.descript_wrap .single_wrap {
    margin-bottom: 20px;
}

.descript_wrap h4 {
    font-size: 1.2rem;
    color: #444;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.descript_wrap p {
    color: #555;
    font-size: 1rem;
}

/* Summary Section */
.candidate_summary {
    background: #fafafa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

.summary_header h3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 15px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

.summary_content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.summary_content li {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.summary_content li span {
    color: #333;
    font-weight: bold;
}

/* Share Section */
.share_wrap {
    margin-top: 20px;
}

.share_wrap span {
    font-size: 1rem;
    color: #555;
    margin-right: 10px;
}

.share_wrap ul {
    list-style: none;
    display: flex;
    gap: 10px;
}

.share_wrap ul li a {
    font-size: 1.2rem;
    color: #555;
    transition: color 0.3s ease;
}

.share_wrap ul li a:hover {
    color: #007bff;
}

/* Buttons and Links */
a, button {
    text-decoration: none;
    color: #fff;
}

.single_wrap a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
}

.single_wrap a:hover {
    text-decoration: underline;
}

button {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
<?php echo $__env->make("main2.main2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/candidate-detail.blade.php ENDPATH**/ ?>