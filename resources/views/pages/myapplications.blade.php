@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3 style="float: left; color: #fff; font-weight: bold;">My Applications</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings Section (Full screen) -->
    <div class="job_listing_area plus_padding">
        <div class="container-fluid">  <!-- Using container-fluid for full width -->
            <div class="row">
                <div class="col-lg-12">  <!-- Full width for job listing -->
                    <div class="job_lists m-0">
                        <div class="row">
                            @foreach ($jobs as $item)
                                @php
                                    // Find the application related to this job
                                    $application = $apps->where('job_id', $item->id)->first();
                                @endphp

                                <div class=" " style="width: 80%;margin: auto;">
                                    <div class="single_jobs white-bg d-flex justify-content-between mb-3 p-3 rounded shadow-sm">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{ $item->img }}" style="width: 50px;height: 50px;">
                                            </div>
                                            <div class="jobs_conetent ml-3">
                                                <a href="{{ route('job_details',['id'=>$item->id]) }}">
                                                    <h4 class="text-dark font-weight-bold">{{ $item->title }}</h4>
                                                </a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <p><i class="fa fa-briefcase"></i> <span class="text-muted">{{ $item->company }}</span></p>
                                                    </div>
                                                    <div class="mr-3">
                                                        <p><i class="fa fa-map-marker"></i> <span class="text-muted">{{ $item->location }}</span></p>
                                                    </div>
                                                    <div class="mr-3">
                                                        <p><i class="fa fa-clock-o"></i> <span class="text-muted">{{ $item->type }}</span></p>
                                                    </div>
                                                </div>

                                                <!-- Show application date if available -->
                                                @if ($application)
                                                    <p class="date">Applied on: {{ \Carbon\Carbon::parse($application->created_at)->format('d M Y') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="jobs_right d-flex align-items-center">
                                            <div class="apply_now">
                                                @if ($application)
                                                    @if ($application->status == 0)
                                                        <button class="boxed-btn3" style="background-color: #007bff;">Pending</button>
                                                    @elseif ($application->status == 1)
                                                        <button class="boxed-btn3" style="background-color: green;">Approved</button>
                                                    @elseif ($application->status == 2)
                                                        <button class="boxed-btn3" style="background-color: red;">Declined</button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination Controls (if any) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
