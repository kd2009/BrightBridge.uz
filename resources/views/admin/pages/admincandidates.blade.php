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
                <button class="btn btn-default" style="margin-top: 5px;">
                        <a href="{{route('addcand')}}"><font color="black">Add Candidate</font></a>
                    </button>
                    <p class="help-block text-danger"></p>
                    <!-- Table for company listing -->
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Job Position</th>
                                <th>Img</th>
                                <th>Skills</th>
                                <th>Experience (Years)</th>
                                <th>Address</th>
                                <th>Expected Salary</th>
                                <th>Resume</th> <!-- New Column for Resume -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->job_position }}</td>
                                    <td>
                                        <img style="width: 40px; height: 40px; border-radius: 50%;" src="../{{ $item->img }}">
                                    </td>
                                    
                                    <td class="text-truncate" style="max-width: 150px;">{{ $item->skills }}</td>
                                    <td>{{ $item->experience_years }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->expected_salary }}</td>
                                    <td>
                                        <!-- Check if a resume exists -->
                                        @if ($item->resume)
                                            <!-- If resume exists, provide a link to view it -->
                                            <a href="{{ asset($item->resume) }}" target="_blank" class="btn btn-info btn-sm">See Resume</a>
                                        @else
                                            <!-- If no resume, display a message -->
                                            <span>No Resume</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit and Delete buttons in the same row -->
                                        <a href="{{ route('candedit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('canddelete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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
