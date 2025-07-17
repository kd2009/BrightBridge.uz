 
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                              <div class="logo-container">
    <a href="{{route('main')}}" class="logo-link">
        <img src="../upl/1111.png" alt="Logo" class="logo-img">
        <span class="logo-text">BrightBridge</span>
    </a>
</div>

                            </div>
                           <div class="col-xl-6 col-lg-7">
    <div class="main-menu d-none d-lg-block">
        <nav>
            <ul id="navigation">
                <li><a href="{{route('main')}}">Home</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('jobs')}}">Jobs</a></li>
                @if(isset($_SESSION['company_id']))
                    <li><a href="{{ route('candidate') }}">Candidates</a></li>
                @endif
                <li><a href="{{route('blogpost')}}">News</a></li>
                <li><a href="{{route('trainings')}}">Trainings</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>

                           <div class="col-xl-3 col-lg-3 d-none d-lg-block">
    <div class="Appointment">
    <?php if (isset($_SESSION['candidate_id'])){?>
        <div class="phone_num d-none d-xl-block">
            <a  class="boxed-btn3" href="{{ route('cab') }}">Profile</a>
        </div>
   <?php } elseif (isset($_SESSION['company_id'])){?>
        <div class="phone_num d-none d-xl-block">
            <a  class="boxed-btn3" href="{{ route('company-profile') }}">Profile</a>
        </div>
   <?php }  else{?>
       <div class="d-none d-lg-block">
            <a class="boxed-btn3" style="margin-right: 10px;" href="{{ route('logup') }}">Want a Job</a>
        </div>
        <div class="d-none d-lg-block">
            <a class="boxed-btn3" href="{{route('postjob')}}">Post a Job</a>
        </div>
    <?php }?>
</div>

</div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none" ></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <style>.logo-container {
    display: flex;
    align-items: center;  /* Aligns items vertically */
    background-color: ;
    padding: 10px;
    
}

.logo-link {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-img {
    width: 75px;  /* Enlarged logo */
    height: auto;
    object-fit: contain;
}

.logo-text {
    font-size: 20px;
    font-weight: bold;
    color: white;
    margin-left: 10px;  /* Adds space between logo and text */
    display: flex;
    align-items: center; /* Ensures text is aligned properly */
}

@media (max-width: 768px) {
    .logo-container {
        padding: 5px;
    }

    .logo-img {
        width: 60px; /* Adjusted size for mobile */
    }

    .logo-text {
        font-size: 18px;
    }
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;  /* Distributes items evenly */
    padding: 10px 20px;
}

.nav-links {
    display: flex;
    gap: 20px;  /* Adds even spacing between links */
}

.profile-btn {
    background-color: green;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    font-weight: bold;
    display: flex;
    align-items: center;
}
/* Fix navbar layout */
.header-area .main-header-area {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
}

/* Adjust main menu */
.main-menu {
    display: flex;
    justify-content: center;
    flex-grow: 1;  /* Ensures menu expands properly */
}

/* Ensure even spacing */
.main-menu ul {
    display: flex;
    gap: 20px;
    padding: 0;
    margin: 0;
    list-style: none;
}

/* Remove yellow background */
.col-xl-6 {
    background-color: transparent !important;
}

/* Profile button */
.profile-btn {
    background-color: green;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}


</style>
    <!-- header-end -->