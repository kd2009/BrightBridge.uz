@extends("admin.main")

@section('content')

    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
                 <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <br>
                <div class="col-lg-12">
                   
                 

               <br>
                <div class="col-lg-12 table-responsive">
                    <!-- Table for job listing -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Status</th>
                                <th>Promotion</th>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Info</th>
                                <th>Responses</th>
                                <th>Qualifications</th>
                                <th>Benefits</th>
                                <th>Salary</th>
                                <th>Posted Date</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)

                            <?php $category = \App\Category::where(['id' =>$job->cat_id])->first(); ?>
                                <tr>
                                    <td><img style="width: 50px;height: 50px;border-radius: 50%;" src="../{{ $job->img }}"></td>
                                    <td>
                                        @if ($job->status == 0)
                                             <div class="candidate-actions">
                                                <form action="{{ route('approve-job', ['id' => $job->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                </form>
                                                <form action="{{ route('decline-job', ['id' => $job->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                                </form>
                                            </div>
                                        @elseif ($job->status == 1)
                                            <span class="badge badge-success">Confirmed</span>
                                        @elseif ($job->status == 2)
                                            <span class="badge badge-danger">Declined</span>
                                        @endif
                                    </td>

                                    <!-- ✅ Promotion Field Added -->
                                    <td>
                                        @if ($job->promotion == 1)
                                            <span class="badge badge-warning">Promoted</span>
                                        @else
                                            <span class="badge badge-secondary">Common</span>
                                        @endif
                                    </td>

                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->company }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ $job->type }}</td>

                                    <!-- ✅ "See More" / "See Less" for long texts -->
                                    <td>
                                        <div class="text-content">
                                            <span class="short-text">{{ Str::limit($job->info, 50) }}</span>
                                            <span class="full-text d-none">{{ $job->info }}</span>
                                            @if (strlen($job->info) > 50)
                                                <button class="see-more-btn btn btn-link p-0">See More</button>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-content">
                                            <span class="short-text">{{ Str::limit($job->responses, 50) }}</span>
                                            <span class="full-text d-none">{{ $job->responses }}</span>
                                            @if (strlen($job->responses) > 50)
                                                <button class="see-more-btn btn btn-link p-0">See More</button>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-content">
                                            <span class="short-text">{{ Str::limit($job->quals, 50) }}</span>
                                            <span class="full-text d-none">{{ $job->quals }}</span>
                                            @if (strlen($job->quals) > 50)
                                                <button class="see-more-btn btn btn-link p-0">See More</button>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-content">
                                            <span class="short-text">{{ Str::limit($job->benefits, 50) }}</span>
                                            <span class="full-text d-none">{{ $job->benefits }}</span>
                                            @if (strlen($job->benefits) > 50)
                                                <button class="see-more-btn btn btn-link p-0">See More</button>
                                            @endif
                                        </div>
                                    </td>

                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->date }}</td>
                                    <td>{{$category->title}}</td>

                                    <td>
                                        <!-- Edit and Delete buttons in the same row -->
                                        <a href="{{route('jobedit',['id'=>$job->id])}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('jobdelete',['id'=>$job->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/category-tab-->

        </div>
    </div>

    <!-- ✅ JavaScript for See More / See Less functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".see-more-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let parent = this.parentElement;
                    let shortText = parent.querySelector(".short-text");
                    let fullText = parent.querySelector(".full-text");

                    if (fullText.classList.contains("d-none")) {
                        fullText.classList.remove("d-none");
                        shortText.classList.add("d-none");
                        this.textContent = "See Less";
                    } else {
                        fullText.classList.add("d-none");
                        shortText.classList.remove("d-none");
                        this.textContent = "See More";
                    }
                });
            });
        });
    </script>

@endsection
