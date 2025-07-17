@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Edit Company Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Edit Company Profile</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="contact-form mx-auto" style="width: 50%; background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <!-- First Name -->
                    <div class="form-group mb-3">
                        <label for="first_name" class="font-weight-bold">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $company->first_name ?? '' }}" required>
                    </div>

                    <!-- Second Name -->
                    <div class="form-group mb-3">
                        <label for="second_name" class="font-weight-bold">Second Name</label>
                        <input type="text" class="form-control" name="second_name" value="{{ $company->second_name ?? '' }}" required>
                    </div>

                    <!-- Age -->
                    <div class="form-group mb-3">
                        <label for="age" class="font-weight-bold">Age</label>
                        <input type="number" class="form-control" name="age" value="{{ $company->age ?? '' }}">
                    </div>

                    <!-- Phone -->
                    <div class="form-group mb-3">
                        <label for="phone" class="font-weight-bold">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $company->phone ?? '' }}">
                    </div>

                    <!-- Job Position -->
                    <div class="form-group mb-3">
                        <label for="job_position" class="font-weight-bold">Job Position</label>
                        <input type="text" class="form-control" name="job_position" value="{{ $company->job_position ?? '' }}">
                    </div>

                    <!-- Company Name -->
                    <div class="form-group mb-3">
                        <label for="company_name" class="font-weight-bold">Company Name</label>
                        <input type="text" class="form-control" name="company_name" value="{{ $company->company_name ?? '' }}">
                    </div>

                    <!-- Description -->
                   <div class="form-group mb-3">
    <label for="description" class="font-weight-bold">Company Description</label>
    <textarea class="form-control" name="description" rows="4">{{ $company->description ?? '' }}</textarea>
</div>

                    <!-- Profile Image Upload -->
                    <div class="form-group mb-4">
                        <label for="img" class="font-weight-bold">Profile Image</label>
                        <input type="file" class="form-control" name="img" accept=".jpg,.jpeg,.png">
                        @if (!empty($company->img))
                            <small class="form-text text-muted">Current: 
                                <img src="{{ asset($company->img) }}" alt="Profile Image" style="width: 50px; height: 50px; border-radius: 50%;">
                            </small>
                        @endif
                    </div>

                    <!-- Certificate Upload -->
                    <div class="form-group mb-4">
                        <label for="certificate" class="font-weight-bold">Certificate</label>
                        <input type="file" class="form-control" name="certificate" accept=".pdf,.doc,.docx">
                        @if (!empty($company->file))
                            <small class="form-text text-muted">Current: 
                                <a href="{{ asset($company->file) }}" target="_blank" class="btn btn-primary btn-sm">View Certificate</a>
                            </small>
                        @endif
                    </div>
                    

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button class="btn btn-primary py-2 px-4" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->
@endsection
