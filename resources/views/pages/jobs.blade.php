@extends("main2.main")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ $countjobs }}+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listing Section -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
            
              <div class="col-lg-3">
    <div class="job_filter white-bg">
        <div class="form_inner white-bg">
            <h3>Filter</h3>
            <form id="filter-form">
                
                <!-- Search Bar -->
                <div class="col-lg-12 mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Search jobs..." />
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select id="location" class="wide">
                                <option value="">Select Location</option>
                                @foreach([
                                    'Uzbekistan, Tashkent', 'Uzbekistan, Samarkand', 'Uzbekistan, Bukhara',
                                    'Uzbekistan, Khiva', 'Uzbekistan, Fergana', 'Uzbekistan, Namangan',
                                    'Uzbekistan, Andijan', 'Uzbekistan, Nukus', 'Uzbekistan, Jizzakh',
                                    'Uzbekistan, Navoi', 'Uzbekistan, Termez', 'Uzbekistan, Karshi',
                                    'Uzbekistan, Gulistan', 'Uzbekistan, Angren'
                                ] as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select id="category" class="wide">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select id="job_type" class="wide">
                                <option value="">Select Type</option>
                                @foreach(['Full-time', 'Part-time', 'Internship', 'Freelance', 'Volunteering', 'Full-time and Part-time'] as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


                <!-- Job Listings -->
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listings</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="filtered-jobs" class="job_lists m-0">
                        <div class="row">
                            @include('pages.filter', ['jobs' => $jobs])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ AJAX Script for Filtering -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function () {
    function fetchFilteredJobs(page = 1) {
        let search = $("#search").val(); // Get search value
        let location = $("#location").val();
        let category = $("#category").val();
        let job_type = $("#job_type").val();

        $.ajax({
            url: "{{ route('filter') }}?page=" + page,
            method: "POST",
            data: {
                search: search, // Include search in request
                location: location,
                category: category,
                job_type: job_type,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                $("#filtered-jobs").html(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    // Run search when typing (debounce to prevent excessive requests)
    let typingTimer;
    $("#search").on("keyup", function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(fetchFilteredJobs, 200); // Wait 500ms before sending request
    });

    // Run search when filters change
    $("#location, #category, #job_type").change(fetchFilteredJobs);

    // Handle pagination
    $(document).on("click", ".pagination a", function (e) {
        e.preventDefault();
        let page = $(this).attr("href").split("page=")[1];
        fetchFilteredJobs(page);
    });

    // Initial load
    fetchFilteredJobs();
});

    </script>
@endsection
