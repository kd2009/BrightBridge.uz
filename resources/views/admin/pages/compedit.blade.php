@extends('admin.main')

@section('content')

<div class="container-fluid">
    <div class="category-tab">
        <div class="tab-content">
            <br>
            <div class="col-lg-12">
                <h3>Edit Company Details</h3>
                
                <!-- Form for editing company -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                   

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $company->company_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $company->first_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="second_name">Second Name</label>
                        <input type="text" name="second_name" id="second_name" class="form-control" value="{{ $company->second_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{ $company->age }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}" required>
                    </div>

                    <div class="form-group">
                        <label for="job_position">Job Position</label>
                        <input type="text" name="job_position" id="job_position" class="form-control" value="{{ $company->job_position }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{ $company->password }}" required>
                    </div>

                    <div class="form-group">
                        <label for="logo">Company Logo</label>
                        <input type="file" name="img" id="img" class="form-control">
                        <img src="/../public/{{ $company->img }}" style="width: 100px; height: 100px; border-radius: 50%; margin-top: 10px;">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Company</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
