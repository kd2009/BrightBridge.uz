@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3 style="float: left;">My Company Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <div class="company_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="company_details_header">
                        <div class="single_company white-bg d-flex justify-content-between">
                            <div class="company_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="../public/<?=$comp[0]->img?>" alt="Company Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                </div>
                                <div class="company_content">
                                    <h4>{{ $comp[0]->company_name }}</h4>
                                    <div class="details_location d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-envelope"></i> {{ $comp[0]->email }}</p>
                                        </div>
                                        <div class="location">
                                            <p>  <i class="fa fa-phone"></i> {{ $comp[0]->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>First Name</h4>
                            <p>{{ $comp[0]->first_name }}</p>
                        </div> 
                        <div class="single_wrap">
                            <h4>Second Name</h4>
                            <p>{{ $comp[0]->second_name }}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Age</h4>
                            <p>{{ $comp[0]->age }}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Job Position</h4>
                            <p>{{ $comp[0]->job_position }}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Company Name</h4>
                            <p>{{ $comp[0]->company_name }}</p>
                        </div>   <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Company Description</h4>
                            <p id="desc-short">{{ Str::limit($comp[0]->description, 200) }}</p>
                            <p id="desc-full" style="display: none;">{{ $comp[0]->description }}</p>
                            <button id="toggle-desc" class="btn btn-primary">See More</button>
                        </div>
                    </div>
                        
                         <div class="single_wrap">
                            <h4>Uploaded Certificate</h4>
                             <a href="{{ asset($comp[0]->file) }}" target="_blank" class="text-decoration-none">
                                            View Certificate
                                        </a>
                        </div>
                        
                        
                        <div class="single_wrap">
                            <h4>Email</h4>
                            <p>{{ $comp[0]->email }}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Phone</h4>
                            <p>{{ $comp[0]->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="company_summary">
                        <div class="summary_header">
                            <h3>Company Summary</h3>
                        </div>
                        <div class="summary_content">
                            <ul>
                                <li>First Name: <span>{{ $comp[0]->first_name }}</span></li>
                                <li>Second Name: <span>{{ $comp[0]->second_name }}</span></li>
                                <li>Age: <span>{{ $comp[0]->age }}</span></li>
                                <li>Job Position: <span>{{ $comp[0]->job_position }}</span></li>
                                <li>Company Name: <span>{{ $comp[0]->company_name }}</span></li>
                                <li>Email: <span>{{ $comp[0]->email }}</span></li>
                                <li>Phone: <span>{{ $comp[0]->phone }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="company_summary">
                        <div class="summary_header">
                            <h3>Actions</h3>
                        </div>
                        <div class="single_wrap">
                            <ul class="action-links">
                                <li>
                                    <?php if ($comp[0]->status == 1): ?>
                                        
                                    <a href="{{route('checkeradmin')}}" class="action-link exit-link" style="text-decoration: none;">AdminPanel</a> <span class="separator">|</span>

                                    <?php endif ?>
                                    <a href="{{ route('editcomp') }}" style="text-decoration: none;">Edit Profile</a>
                                    <span class="separator">|</span>


                                    <a href="{{ route('exit') }}" class="action-link exit-link" style="text-decoration: none;">Exit</a>
                                    <span class="separator">|</span><br>
                                    <a href="{{ route('myapplications2') }}" style="text-decoration: none;">My Applications</a>
                                    <span class="separator">|</span>
                                    <a href="{{ route('addjob') }}" style="text-decoration: none;">Add Jobs
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://company-details.uz"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://wa.me/?text=https://company-details.uz"> <i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="https://t.me/share/url?url=https://company-details.uz&text=Check%20this%20out!"> <i class="fa fa-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function toggleDescription() {
        let desc = document.getElementById("description");
        let button = document.getElementById("toggleDescription");
        if (desc.classList.contains("short-text")) {
            desc.innerHTML = `{{ $comp[0]->description }}`;
            button.innerHTML = "See Less";
            desc.classList.remove("short-text");
        } else {
            desc.innerHTML = `{{ substr($comp[0]->description, 0, 150) }}...`;
            button.innerHTML = "See More";
            desc.classList.add("short-text");
        }
    }

document.addEventListener("DOMContentLoaded", function() {
    const shortDesc = document.getElementById("desc-short");
    const fullDesc = document.getElementById("desc-full");
    const toggleButton = document.getElementById("toggle-desc");
    
    toggleButton.addEventListener("click", function() {
        if (fullDesc.style.display === "none") {
            fullDesc.style.display = "block";
            shortDesc.style.display = "none";
            toggleButton.textContent = "See Less";
        } else {
            fullDesc.style.display = "none";
            shortDesc.style.display = "block";
            toggleButton.textContent = "See More";
        }
    });
});
</script>

<style>
    .short-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 5px;
        border-radius: 5px;
    }
    button:hover {
        background-color: #0056b3;
    }

/* General Styles */
.bradcam_area {
    background-color: #f5f5f5;
    padding: 50px 0;
    text-align: center;
    margin-bottom: 30px;
}

.bradcam_text h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
}

.company_details_area {
    font-family: Arial, sans-serif;
}

/* Company Header */
.company_details_header {
    margin-bottom: 30px;
}

.single_company {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    display: flex;
    align-items: center;
}

.company_left .thumb {
    margin-right: 20px;
}

.company_left img {
    border: 3px solid #ddd;
    background-color: #fff;
    transition: transform 0.3s ease;
}

.company_left img:hover {
    transform: scale(1.1);
}

.company_content h4 {
    font-size: 1.5rem;
    color: #555;
    margin-bottom: 10px;
}

.details_location p {
    margin: 0;
    color: #666;
    font-size: 0.9rem;
}

/* Content Section */
.descript_wrap {
    margin-top: 30px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.descript_wrap .single_wrap {
    margin-bottom: 20px;
}

.descript_wrap h4 {
    font-size: 1.2rem;
    color: #444;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.descript_wrap p {
    color: #555;
    font-size: 1rem;
}

/* Summary Section */
.company_summary {
    background: #fafafa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

.summary_header h3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 15px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

.summary_content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.summary_content li {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.summary_content li span {
    color: #333;
    font-weight: bold;
}

/* Share Section */
.share_wrap {
    margin-top: 20px;
}

.share_wrap span {
    font-size: 1rem;
    color: #555;
    margin-right: 10px;
}

.share_wrap ul {
    list-style: none;
    display: flex;
    gap: 10px;
}

.share_wrap ul li a {
    font-size: 1.2rem;
    color: #555;
    transition: color 0.3s ease;
}

.share_wrap ul li a:hover {
    color: #007bff;
}

/* Buttons and Links */
a, button {
    text-decoration: none;
    color: #fff;
}

.single_wrap a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
}

.single_wrap a:hover {
    text-decoration: underline;
}

button {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
