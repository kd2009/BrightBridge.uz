@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Edit Job Listing</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Edit Job</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="contact-form mx-auto" style="width: 50%; background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <!-- Job Title -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Job Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $job->title ?? '' }}" required>
                    </div>

                    <!-- Location -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Location</label>
                        <input type="text" class="form-control" name="location" value="{{ $job->location ?? '' }}" required>
                    </div>

                    <!-- Job Type -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Job Type</label>
                        <input type="text" class="form-control" name="type" value="{{ $job->type ?? '' }}" required>
                    </div>

                    <!-- Job Info -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Job Info</label>
                        <textarea class="form-control" name="info" rows="4">{{ $job->info ?? '' }}</textarea>
                    </div>

                    <!-- Responsibilities -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Responsibilities</label>
                        <textarea class="form-control" name="responses" rows="4">{{ $job->responses ?? '' }}</textarea>
                    </div>

                    <!-- Qualifications -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Qualifications</label>
                        <textarea class="form-control" name="quals" rows="4">{{ $job->quals ?? '' }}</textarea>
                    </div>

                    <!-- Benefits -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Benefits</label>
                        <textarea class="form-control" name="benefits" rows="4">{{ $job->benefits ?? '' }}</textarea>
                    </div>
                    
                    <!-- Salary -->
                  <!-- Salary Type Selection (Radio Buttons) -->
<div class="single-field">
    <label>Salary Type</label><br>
    <input type="radio" id="fixed_salary" name="salary_option" value="fixed" 
        {{ is_numeric(str_replace(' ', '', $job->salary)) ? 'checked' : '' }} required>
    <label for="fixed_salary">Fixed Salary</label>

    <input type="radio" id="negotiable_salary" name="salary_option" value="negotiable" 
        {{ $job->salary === "Negotiable" ? 'checked' : '' }} required>
    <label for="negotiable_salary">Negotiable</label>
</div>
<br>

<!-- Salary Input (Initially Hidden) -->
<div id="salary_input_div" class="control-group" style="display: {{ is_numeric(str_replace(' ', '', $job->salary)) ? 'block' : 'none' }};">
    <label for="salary_input">Enter Salary</label>
    <input type="text" class="form-control" id="salary_input" name="salary"
        value="{{ is_numeric(str_replace(' ', '', $job->salary)) ? number_format(str_replace(' ', '', $job->salary), 0, '.', ' ') : '' }}"
        placeholder="Enter Salary" />
    <p class="help-block text-danger"></p>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let fixedSalaryRadio = document.getElementById("fixed_salary");
    let negotiableSalaryRadio = document.getElementById("negotiable_salary");
    let salaryInputDiv = document.getElementById("salary_input_div");
    let salaryInput = document.getElementById("salary_input");
    let oldSalaryValue = salaryInput.value; // Store initial salary value

    // Show input when "Fixed Salary" is selected and restore previous value
    fixedSalaryRadio.addEventListener("change", function () {
        salaryInputDiv.style.display = "block";
        salaryInput.setAttribute("required", "required");
        salaryInput.value = oldSalaryValue; // Restore previous value
    });

    // Hide input when "Negotiable" is selected and store previous salary value
    negotiableSalaryRadio.addEventListener("change", function () {
        oldSalaryValue = salaryInput.value; // Store the last entered value
        salaryInputDiv.style.display = "none";
        salaryInput.removeAttribute("required");
        salaryInput.value = ""; // Clear input when selecting "Negotiable"
    });

    // Format salary input (adds spaces after every 3 digits)
    salaryInput.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, ""); // Remove non-numeric characters
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // Add spaces every 3 digits
    });
});
</script>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Category</label>
                        <select class="form-control" name="cat_id" required>
                            @foreach($category as $cat)
                                <option value="{{ $cat->id }}" {{ $job->cat_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button class="btn btn-primary py-2 px-4" type="submit">Update Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
