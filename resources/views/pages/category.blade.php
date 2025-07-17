@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?=$counter?>+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Search keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Location">Location</option>
                                                <option value="1">Rangpur</option>
                                                <option value="2">Dhaka </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Category">Category</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Experience">Experience</option>
                                                <option value="1">Experience 1</option>
                                                <option value="2">Experience 2 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Job type">Job type</option>
                                                <option value="1">full time 1</option>
                                                <option value="2">part time 2 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Qualification">Qualification</option>
                                                <option value="1">Qualification 1</option>
                                                <option value="2">Qualification 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Gender">Gender</option>
                                                <option value="1">male</option>
                                                <option value="2">female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="range_wrap">
                            <label for="amount">Price range:</label>
                            <div id="slider-range"></div>
                            <p>
                                <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-size: 14px; font-weight:400;">
                            </p>
                        </div>
                        <div class="reset_btn">
                            <button class="boxed-btn3 w-100" type="submit">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <select>
                                            <option data-display="Most Recent">Most Recent</option>
                                            <option value="1">Marketer</option>
                                            <option value="2">Wordpress </option>
                                            <option value="4">Designer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            @foreach ($jobs as $item)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="../{{ $item->img }}" style="width: 50px;height: 50px;object-fit: cover;">
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="{{route('job_details',['id'=>$item->id])}}"><h4>{{ $item->title }}</h4></a>
                                                <div class="links_locat d-flex align-items-center">
                                                   
                                                    <div class="" style="background-color: ; width: 150px; padding-right: 10px;margin-left: 10px;padding-top: 5px;height: 40px;">
                                                        <p> <i class="fa fa-briefcase"></i> <font size="2">  {{ $item->company }}</font></p>
                                                    </div>


                                                   <div class=""  style="background-color: ; width: 150px; padding-right: 10px;margin-left: 10px;padding-top: 5px;height: 40px;">
                                                        <p> <i class="fa fa-map-marker"></i> <font size="2">  {{ $item->location }}</font></p>
                                                    </div>
                                                    <div class="" style="background-color: ; width: 150px; padding-right: 10px;margin-left: 10px;padding-top: 5px;height: 40px;">
                                                        <p> <i class="fa fa-clock-o"></i><font size="2">  {{ $item->type }}</font></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            <div class="apply_now">
                                                <a href="{{route('job_details',['id'=>$item->id])}}" class="boxed-btn3">Apply Now</a>
                                            </div>
                                            <div class="date">
                                                <p>Date line: {{ $item->date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination Controls -->
                        <div class="pagination_wrap">
                            <ul>
                                <!-- Previous Page Link -->
                                @if ($jobs->onFirstPage())
                                    <li class="disabled"><a href="#"> <i class="ti-angle-left"></i> </a></li>
                                @else
                                    <li><a href="{{ $jobs->previousPageUrl() }}"> <i class="ti-angle-left"></i> </a></li>
                                @endif

                                <!-- Page Numbers -->
                                @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                    <li class="{{ $page == $jobs->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}"><span>{{ $page }}</span></a>
                                    </li>
                                @endforeach

                                <!-- Next Page Link -->
                                @if ($jobs->hasMorePages())
                                    <li><a href="{{ $jobs->nextPageUrl() }}"> <i class="ti-angle-right"></i> </a></li>
                                @else
                                    <li class="disabled"><a href="#"> <i class="ti-angle-right"></i> </a></li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection
