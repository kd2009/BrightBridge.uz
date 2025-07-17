@extends('admin.main')

@section('content')

    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
               <br>
                <div class="col-lg-12">
                    <!-- Table for job listing -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Candidate Name</th>
                                <th>Candidate Surname</th>
                                <th>Status</th> <!-- Add a new column for Status -->
                                <th>Actions</th> <!-- Actions for delete button -->
                            </tr>
                        </thead>
                       <tbody>
    @foreach ($applications as $item)
        @if(isset($jobDetails[$item->id]) && isset($candidateDetails[$item->id]))
            @php
                $job = $jobDetails[$item->id];
                $cand = $candidateDetails[$item->id];
            @endphp
            <tr>
                <td>
                    @if(!empty($job->img))
                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="../{{ $job->img }}">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->type }}</td>
                <td>{{ $cand->first_name }}</td>
                <td>{{ $cand->last_name }}</td>

                <!-- Status Column -->
                <td>
                    @if ($item->status == 0)
                        <span class="badge badge-warning">Pending</span>
                    @elseif ($item->status == 1)
                        <span class="badge badge-success">Confirmed</span>
                    @elseif ($item->status == 2)
                        <span class="badge badge-danger">Declined</span>
                    @endif
                </td>

                <td>
                    <!-- Delete button -->
                    <a href="{{ route('applicationdelete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endif
    @endforeach
</tbody>

                    </table>
                </div>
            </div><!--/category-tab-->

        </div>
    </div>

@endsection
