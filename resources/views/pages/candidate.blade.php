@extends("main2.main")

@section("content")
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
                @foreach ($candidates as $item)
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center">
                        <div class="single_candidates text-center w-100">
                            <div class="thumb">
                                <img style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" 
                                     src="{{ $item->img }}">
                            </div>
                            <a href="{{ route('candidate-detail', ['id' => $item->id]) }}">
                                <h4>{{ $item->first_name }} {{ $item->last_name }}</h4>
                            </a>
                            <p>{{ $item->job_position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination_wrap">
                        {{ $candidates->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
@endsection
