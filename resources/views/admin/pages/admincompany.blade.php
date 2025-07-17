@extends("admin.main")

@section('content')

<div class="container-fluid">
    <div class="category-tab">
        <div class="tab-content">
            <br>
            <div class="col-lg-12">
                <!-- Table for company listing -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Job Position</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Description</th>
                            <th>Certificate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company as $item)
                            <tr>
                                <td>
                                    <img style="width: 50px; height: 50px; border-radius: 50%;" src="../{{ $item->img }}">
                                </td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->second_name }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->job_position }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>
                                    <p id="desc-short-{{ $item->id }}">{{ Str::limit($item->description, 50) }}</p>
                                    <p id="desc-full-{{ $item->id }}" style="display: none;">{{ $item->description }}</p>
                                    <button class="btn btn-sm btn-info toggle-desc" data-id="{{ $item->id }}">See More</button>
                                </td>
                                <td>
                                    @if($item->file)
                                        <a href="{{ asset($item->file) }}" target="_blank" class="btn btn-primary btn-sm">View Certificate</a>
                                    @else
                                        <span class="text-muted">No Certificate</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit and Delete buttons in the same row -->
                                    <a href="{{ route('compedit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('dellcomp', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/category-tab-->
    </div>
</div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggle-desc").forEach(function (button) {
            button.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                let shortDesc = document.getElementById("desc-short-" + id);
                let fullDesc = document.getElementById("desc-full-" + id);

                if (fullDesc.style.display === "none") {
                    fullDesc.style.display = "block";
                    shortDesc.style.display = "none";
                    this.textContent = "See Less";
                } else {
                    fullDesc.style.display = "none";
                    shortDesc.style.display = "block";
                    this.textContent = "See More";
                }
            });
        });
    });
</script>
