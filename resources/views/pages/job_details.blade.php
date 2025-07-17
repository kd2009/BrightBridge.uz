@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?=$job[0]->title?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="../<?=$job[0]->img?>" alt="" style="width: 50px;height: 50px;object-fit: cover;">
                                </div>
                                <div class="jobs_conetent">
                                    <a href=""><h4><?=$job[0]->title?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?=$job[0]->location?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?=$job[0]->type?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>



                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p><?=$job[0]->info?></p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                <li><?=$job[0]->responses?>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <li>                   <?=$job[0]->quals?>
</li>
                                   </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                   <p>  <?=$job[0]->benefits?>
                            </p>
                        </div>


                                  
                                
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summary</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: <span><?=$job[0]->date?></span></li>
                              <li>Salary: <span>
    <?php 
        if ($job[0]->salary == "Negotiable") {
            echo "Negotiable"; 
        } else {
            echo htmlspecialchars($job[0]->salary, ENT_QUOTES, 'UTF-8') . " sums"; 
        }
    ?>
</span></li>

                                <li>Location: <span><?=$job[0]->location?></span></li>
                                <li>Job Type: <span> <?=$job[0]->type?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://job-boards.uz"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="https://wa.me/?text=https://job-boards.uz"> <i class="fa fa-whatsapp"></i></a> </li>
                            <li><a href="https://t.me/share/url?url=https://job-boards.uz&text=Check%20this%20out!"> <i class="fa fa-telegram"></i></a> </li>
                        </ul>
                    </div>
                       <?php
                        if (isset($_SESSION['candidate_id'])) {?>
                        

    @if($check)
    <div class="submit_btn">
        <a class="boxed-btn3" style="width: 100%; height: 50px;" href="{{route('myapplications',['id'=>$userid])}}">You have already applied</a>
    </div>
@else
  

                                    <div class="submit_btn">
                                        <a class="boxed-btn3" style="width: 100%;height: 50px" href="{{route('apply',['id'=>$job[0]->id])}}">Apply</a>

                                    </div>
         
@endif
                     <?php  } else{?>

                                     <div class="submit_btn">
                                        <a class="boxed-btn3" style="width: 100%;height: 50px" href="{{route('login')}}">Log in to Apply</a>
                                    </div>


                        <?}?>


                </div>
            </div>
        </div>
    </div>
@endsection