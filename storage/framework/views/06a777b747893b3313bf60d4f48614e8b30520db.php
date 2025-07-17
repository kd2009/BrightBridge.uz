

<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Candidate Log Up</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- featured_candidates_area_start -->
    <div class="featured_candidates_area candidate_page_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="contact-form">
                        <!-- Display Success Messages -->
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Display Error Messages -->
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Log Up Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            
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
                                    required="required" value="<?php echo e(old('age')); ?>" min="18" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                                    required="required" pattern="\+998[0-9]{9}" title="Please enter a valid Uzbek phone number"
                                    value="<?php echo e(old('phone', '+998')); ?>" oninput="if (!this.value.startsWith('+998')) this.value = '+998';" />
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
                        <br>
                        <h3 style="color: #007bff;">Already have an account?</h3>
                        <p><a href="<?php echo e(route('login')); ?>">Click here to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end -->
<?php $__env->stopSection(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dynamically update file input label with the selected file name
        const resumeInput = document.getElementById('resumeFile');
        resumeInput.addEventListener('change', function () {
            const fileName = this.files[0] ? this.files[0].name : 'Upload CV';
            this.nextElementSibling.innerHTML = fileName;
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Dynamically update file input label with the selected image file name
        const imgInput = document.getElementById('imgFile');
        imgInput.addEventListener('change', function () {
            const fileName = this.files[0] ? this.files[0].name : 'Upload Your Picture';
            this.nextElementSibling.innerHTML = fileName;
        });
    });
</script>

<?php echo $__env->make("main2.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/logup.blade.php ENDPATH**/ ?>