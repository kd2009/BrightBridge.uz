@if($jobs->isEmpty())
    <p>No jobs found.</p>
@else
    @foreach ($jobs as $item)
        <div class="single_jobs white-bg d-flex justify-content-between mb-3">
            <div class="jobs_left d-flex align-items-center" style="width: 100%;">
                <div class="thumb mr-3">
                    <img src="../{{ $item->img }}" alt="" style="width: 48px; height: 48px; object-fit: cover;">
                </div>
                <div class="jobs_conetent">
                    <a href="{{ route('job_details', ['id' => $item->id]) }}">
                        <h4>{{ $item->title }}</h4>
                    </a>
                    <div class="links_locat d-flex align-items-center">
                        <div style="width: 150px; margin-left: 10px; height: 40px;">
                            <p><i class="fa fa-map-marker"></i>
                                <span style="font-size: 0.85rem;">{{ $item->location }}</span>
                            </p>
                        </div>
                        <div style="width: 150px; margin-left: 10px; height: 40px;">
                            <p><i class="fa fa-clock-o"></i>
                                <span style="font-size: 0.85rem;">{{ $item->type }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jobs_right text-right">
                <div class="apply_now mb-2">
                    @if(isset($userid))
                        @if(!empty($check[$item->id]) && $check[$item->id])
                            <a href="{{ route('myapplications', ['id' => $userid]) }}"
                               class="boxed-btn3"
                               style="min-width: 180px; text-align: center;">
                                You have already applied
                            </a>
                        @else
                            <a href="{{ route('apply', ['id' => $item->id]) }}"
                               class="boxed-btn3"
                               style="min-width: 180px; text-align: center;">
                                Apply Now
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="boxed-btn3"
                           style="min-width: 180px; text-align: center;">
                            Login to Apply
                        </a>
                    @endif
                </div>

                <div class="date">
                    <p style="font-size: 0.85rem; color: #555;">
                        Deadline: {{ \Carbon\Carbon::parse($item->date)->format('Y-m-d') }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    <!-- ✅ Pagination -->
    <div class="pagination-container mt-4">
        {{ $jobs->links() }}
    </div>
@endif
