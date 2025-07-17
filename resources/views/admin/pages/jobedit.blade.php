@extends('admin.main')

@section('content')

<div class="container-fluid">
    <div class="category-tab">
        <div class="tab-content">
            <br>
            <div class="col-lg-12">
                <h3>Edit Job Details</h3>
                
                <!-- Form for editing job -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $job->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $job->company) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $job->location) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Job Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="Full-time" {{ old('type', $job->type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('type', $job->type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('type', $job->type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('type', $job->type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>

                    <!-- Salary Selection -->
                    <div class="single-field">
                        <label>Salary Type</label><br>
                        <input type="radio" id="fixed_salary" name="salary_option" value="fixed"
                            {{ old('salary_option', is_numeric(str_replace(' ', '', $job->salary)) ? 'fixed' : 'negotiable') == 'fixed' ? 'checked' : '' }} required>
                        <label for="fixed_salary">Fixed Salary</label>

                        <input type="radio" id="negotiable_salary" name="salary_option" value="negotiable"
                            {{ old('salary_option', $job->salary === "Negotiable" ? 'negotiable' : 'fixed') == 'negotiable' ? 'checked' : '' }} required>
                        <label for="negotiable_salary">Negotiable</label>
                    </div>

                    <!-- Hidden Salary Field (To Ensure Submission) -->
                    <input type="hidden" name="salary" id="hidden_salary" value="{{ old('salary', is_numeric(str_replace(' ', '', $job->salary)) ? $job->salary : '') }}">

                    <!-- Salary Input Field -->
                    <div id="salary_input_div" class="control-group" style="display: {{ is_numeric(str_replace(' ', '', $job->salary)) || old('salary_option') == 'fixed' ? 'block' : 'none' }};">
                        <label for="salary_input">Enter Salary</label>
                        <input type="text" class="form-control" id="salary_input" name="salary"
                            value="{{ old('salary', is_numeric(str_replace(' ', '', $job->salary)) ? number_format(str_replace(' ', '', $job->salary), 0, '.', ' ') : '') }}"
                            placeholder="Enter Salary" />
                    </div>

                    <div class="form-group">
                        <label for="promotion">Promotion Status</label>
                        <select name="promotion" id="promotion" class="form-control" required>
                            <option value="1" {{ old('promotion', $job->promotion) == 1 ? 'selected' : '' }}>Promoted</option>
                            <option value="0" {{ old('promotion', $job->promotion) == 0 ? 'selected' : '' }}>Common</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Job Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status', $job->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $job->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                  

                    <div class="form-group">
                        <label for="img">Company Logo (optional)</label>
                        <input type="file" name="img" id="img" class="form-control">
                        @if ($job->img)
                            <img src="{{ asset($job->img) }}" style="width: 100px; height: 100px; margin-top: 10px; border-radius: 50%;" alt="Company Logo">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="info">Job Information</label>
                        <textarea name="info" id="info" class="form-control" required>{{ old('info', $job->info) }}</textarea>
                    </div>  

                    <div class="form-group">
                        <label for="quals">Job Qualifications</label>
                        <textarea name="quals" id="quals" class="form-control" required>{{ old('quals', $job->quals) }}</textarea>
                    </div>  

                    <div class="form-group">
                        <label for="responses">Job Responsibilities</label>
                        <textarea name="responses" id="responses" class="form-control" required>{{ old('responses', $job->responses) }}</textarea>
                    </div>
<div class="form-group">
                        <label for="benefits">Job Benefits</label>
                        <textarea name="benefits" id="benefits" class="form-control" required>{{ old('benefits', $job->benefits) }}</textarea>
                    </div>

                    <!-- Date Field -->
                 

                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let fixedSalaryRadio = document.getElementById("fixed_salary");
                        let negotiableSalaryRadio = document.getElementById("negotiable_salary");
                        let salaryInputDiv = document.getElementById("salary_input_div");
                        let salaryInput = document.getElementById("salary_input");
                        let hiddenSalary = document.getElementById("hidden_salary");

                        fixedSalaryRadio.addEventListener("change", function () {
                            salaryInputDiv.style.display = "block";
                            salaryInput.setAttribute("required", "required");
                        });

                        negotiableSalaryRadio.addEventListener("change", function () {
                            salaryInputDiv.style.display = "none";
                            salaryInput.removeAttribute("required");
                            salaryInput.value = ""; // Clear input when selecting "Negotiable"
                            hiddenSalary.value = "Negotiable"; // Ensure it's always submitted
                        });

                        salaryInput.addEventListener("input", function () {
                            let value = this.value.replace(/\D/g, ""); // Remove non-numeric characters
                            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // Add spaces every 3 digits
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>

@endsection
