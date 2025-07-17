@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3 style="color: #fff; font-weight: bold;">View Candidates</h3>
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
                @foreach ($candidates as $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img style="width: 100px; height: 100px;object-fit: cover;border-radius: 50%;" 
                                     src="{{ asset($item->img) }}" alt="Candidate Image">
                            </div>
                            <a href="{{ route('candidate-detail', ['id' => $item->id]) }}">
                                <h4>{{ $item->first_name }} {{ $item->last_name }}</h4>
                            </a>
                            <p>{{ $item->job_position }}</p>

                            <!-- Status or Buttons based on Status -->
                            @if ($item->status == 0)
                                <!-- If Status is 0, show Approve and Decline buttons -->
                                <div class="candidate-actions">
                                    <form action="{{ route('approve-candidate', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form action="{{ route('decline-candidate', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                    </form>
                                </div>
                            @elseif ($item->status == 1)
                                <!-- If Status is 1, show Approved text -->
                                <span class="badge bg-success">Approved</span>
                            @elseif ($item->status == 2)
                                <!-- If Status is 2, show Declined text -->
                                <span class="badge bg-danger">Declined</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Section (if needed) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination_wrap">
                        <ul>
                            <li><a href="#"> <i class="ti-angle-left"></i> </a></li>
                            <li><a href="#"><span>01</span></a></li>
                            <li><a href="#"><span>02</span></a></li>
                            <li><a href="#"> <i class="ti-angle-right"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
@endsection
