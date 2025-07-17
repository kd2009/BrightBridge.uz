

<?php $__env->startSection("content"); ?>
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Company Holder Sign Up</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area candidate_page_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="contact-form">
                        <!-- Success Alert -->
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Error Alert for email or other issues -->
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Validation Error Alert -->
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="control-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                    required="required" value="<?php echo e(old('first_name')); ?>" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="second_name" placeholder="Second Name"
                                    required="required" value="<?php echo e(old('second_name')); ?>" />
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
                                    required="required" value="<?php echo e(old('job_position')); ?>" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name"
                                    required="required" value="<?php echo e(old('company_name')); ?>" />
                                <p class="help-block text-danger"></p>
                            </div> 
                            
                            <div class="control-group">
                                <textarea style="height: 200px;" class="form-control" name="description" placeholder="Company Description"
                                    required="required" data-validation-required-message="Please enter the Company Description"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>

                            
                            
                            
                            <div class="custom-file control-group mb-3">
                                <input name="cert" type="file" class="custom-file-input" id="certFile"
                                    aria-describedby="certHelp" accept=".pdf,.doc,.docx" required>
                                <label class="custom-file-label" for="resumeFile">Upload Certificate</label>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="custom-file control-group" style="margin-bottom: 10px;">
                                <input name="img" type="file" class="custom-file-input" id="inputGroupFile03"
                                    aria-describedby="inputGroupFileAddon03" required>
                                <label class="custom-file-label" for="inputGroupFile03">Upload Logo</label>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="email" class="form-control" name="email" placeholder="E-mail"
                                    required="required" value="<?php echo e(old('email')); ?>" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required="required" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit">Submit</button>
                            </div>
                        </form>

                        <br>
                        <h3 style="color: #007bff;">Already have a company account?</h3>
                        <p><a href="<?php echo e(route('login2')); ?>">Click here to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to update file input labels dynamically
        function updateFileLabel(inputId) {
            const fileInput = document.getElementById(inputId);
            if (fileInput) {
                fileInput.addEventListener('change', function () {
                    const fileName = this.files[0] ? this.files[0].name : 'Choose file';
                    this.nextElementSibling.innerHTML = fileName;
                });
            }
        }

      
        updateFileLabel('inputGroupFile03'); // Logo upload
        updateFileLabel('certFile');        // Certificate upload
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("main2.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/brightbr/public_html/resources/views/pages/postjob.blade.php ENDPATH**/ ?>