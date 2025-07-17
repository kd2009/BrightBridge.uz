@extends("admin.main")

@section('content')
    <div class="container-fluid">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h3>Adding Job</h3>
            <div class="contact-form">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="" method="POST" enctype="multipart/form-data">
                  @csrf


                    <div class="control-group">
                        <input type="text" class="form-control" name="company_name" placeholder="Company name" required />
                        <p class="help-block text-danger"></p>
                    </div> 
                    
                    <div class="control-group">
                        <input type="text" class="form-control" name="title" placeholder="Job Title" required />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="single_field">
                        <select class="form-control" name="location">
                            <option value="">Select Location</option>
                            @foreach([
                                'Uzbekistan, Tashkent', 'Uzbekistan, Samarkand', 'Uzbekistan, Bukhara',
                                'Uzbekistan, Khiva', 'Uzbekistan, Fergana', 'Uzbekistan, Namangan',
                                'Uzbekistan, Andijan', 'Uzbekistan, Nukus', 'Uzbekistan, Jizzakh',
                                'Uzbekistan, Navoi', 'Uzbekistan, Termez', 'Uzbekistan, Karshi',
                                'Uzbekistan, Gulistan', 'Uzbekistan, Angren'
                            ] as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="single_field">
                        <select class="form-control" name="type">
                            <option value="">Select Type</option>
                            @foreach([
                                'Full-time', 'Part-time', 'Internship',
                                'Freelance', 'Volunteering','Full-time and Part-time'] as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <textarea class="form-control" name="info" placeholder="Job Description" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <input type="text" class="form-control" name="responses" placeholder="Job Responsibilities" required />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <textarea class="form-control" name="quals" placeholder="Required Qualifications" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <textarea class="form-control" name="benefits" placeholder="Job Benefits" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="custom-file control-group mb-3">
                        <input name="img" type="file" class="custom-file-input" id="inputGroupFile03" required>
                        <label class="custom-file-label" for="inputGroupFile03">Upload Logo</label>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="single-field">
                        <label>Salary Type</label><br>
                        <input type="radio" id="fixed_salary" name="salary_option" value="fixed" required>
                        <label for="fixed_salary">Fixed Salary</label>

                        <input type="radio" id="negotiable_salary" name="salary_option" value="negotiable" required>
                        <label for="negotiable_salary">Negotiable</label>
                    </div>

                    <div id="salary_input_div" class="control-group" style="display: none;">
                        <input type="text" class="form-control" id="salary_input" name="salary" placeholder="Enter Salary" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="single-field">
                        <select name="cat_id" class="form-control" required>
                            <option value="">Job Category</option>
                            @foreach($category as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit">Submit Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let fixedSalaryRadio = document.getElementById("fixed_salary");
    let negotiableSalaryRadio = document.getElementById("negotiable_salary");
    let salaryInputDiv = document.getElementById("salary_input_div");
    let salaryInput = document.getElementById("salary_input");

    fixedSalaryRadio.addEventListener("change", function () {
        salaryInputDiv.style.display = "block";
        salaryInput.setAttribute("required", "required");
    });

    negotiableSalaryRadio.addEventListener("change", function () {
        salaryInputDiv.style.display = "none";
        salaryInput.removeAttribute("required");
        salaryInput.value = "";
    });

    salaryInput.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, "");
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    });
});
</script>
@endsection

