@extends("admin.main")

@section('content')

    <div class="container-fluid">

   
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h3>Adding Candidate</h3>
                    <div class="contact-form">
                        <!-- Display Success Messages -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Display Error Messages -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Log Up Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            
                            <div class="control-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                    required="required" data-validation-required-message="Please enter your First Name" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                    required="required" data-validation-required-message="Please enter your Last Name" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                    required="required" data-validation-required-message="Please enter your Email" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="password" class="form-control" name="password" placeholder="Set Password"
                                    required="required" data-validation-required-message="Please set a password" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="number" class="form-control" name="age" placeholder="Age"
                                    required="required" value="{{ old('age') }}" min="18" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                                    required="required" pattern="\+998[0-9]{9}" title="Please enter a valid Uzbek phone number"
                                    value="{{ old('phone', '+998') }}" oninput="if (!this.value.startsWith('+998')) this.value = '+998';" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="job_position" placeholder="Job Position"
                                    required="required" data-validation-required-message="Please enter your Job Position" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="custom-file control-group mb-3">
                                <input name="resume" type="file" class="custom-file-input" id="resumeFile"
                                    aria-describedby="resumeHelp" accept=".pdf,.doc,.docx" required>
                                <label class="custom-file-label" for="resumeFile">Upload CV</label>
                                <p class="help-block text-danger"></p>
                            </div>

                           <div class="custom-file control-group mb-3">
    <input name="img" type="file" class="custom-file-input" id="imgFile"
        aria-describedby="imgHelp" accept=".jpg,.png,.jpeg" required>
    <label class="custom-file-label" for="imgFile">Upload Your Picture</label>
    <p class="help-block text-danger"></p>
</div>


                            <div class="control-group">
                                <input type="text" class="form-control" name="skills"
                                    placeholder="Add skills e.g., Working in a team, social media knowledge, etc."
                                    required>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="experience" placeholder="Experience Years"
                                    required="required"
                                    data-validation-required-message="Please enter your Experience Years" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="address" placeholder="Address"
                                    required="required" data-validation-required-message="Please enter your Address" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="number" class="form-control" name="salary" placeholder="Expected Salary"
                                    required="required"
                                    data-validation-required-message="Please enter your Expected Salary" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit">Submit</button>
                            </div>
                        </form>
                       
                    </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        const resumeInput = document.getElementById('resumeFile');
        resumeInput.addEventListener('change', function () {
            const fileName = this.files[0] ? this.files[0].name : 'Upload CV';
            this.nextElementSibling.innerHTML = fileName;
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        
        const imgInput = document.getElementById('imgFile');
        imgInput.addEventListener('change', function () {
            const fileName = this.files[0] ? this.files[0].name : 'Upload Your Picture';
            this.nextElementSibling.innerHTML = fileName;
        });
    });
</script>
