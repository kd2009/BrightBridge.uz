@extends('admin.main')

@section('content')

<div class="container-fluid">
    <div class="category-tab">
        <div class="tab-content">
            <br>
            <div class="col-lg-12">
                <h3>Edit Candidate Details</h3>
                
                <!-- Form for editing candidate -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $candidate->first_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $candidate->last_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{ $candidate->age }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $candidate->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $candidate->phone }}" required>
                    </div>

                    <div class="form-group">
                        <label for="job_position">Job Position</label>
                        <input type="text" name="job_position" id="job_position" class="form-control" value="{{ $candidate->job_position }}" required>
                    </div>

                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="file" name="resume" id="resume" class="form-control">
                        @if ($candidate->resume)
                            <a href="{{ asset($candidate->resume) }}" target="_blank" style="margin-top: 10px;">View Current Resume</a>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="img">Profile Image</label>
                        <input type="file" name="img" id="img" class="form-control">
                        <img src="{{ asset($candidate->img) }}" style="width: 100px; height: 100px; border-radius: 50%; margin-top: 10px;" alt="Profile Image">
                    </div>

                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <textarea name="skills" id="skills" class="form-control" rows="4" required>{{ $candidate->skills }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="experience_years">Experience (Years)</label>
                        <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ $candidate->experience_years }}" required>
                    </div>

                

                   

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $candidate->address }}" required>
                    </div>

                    <div class="form-group">
                        <label for="expected_salary">Expected Salary</label>
                        <input type="number" name="expected_salary" id="expected_salary" class="form-control" value="{{ $candidate->expected_salary }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Candidate</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
