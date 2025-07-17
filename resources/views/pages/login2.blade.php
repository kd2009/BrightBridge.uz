@extends("main2.main")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Company holder log in</h3>
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
                

               <div class="contact-form">
    <div id="success"></div>
    <form method="POST" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="control-group">
            <input type="email" class="form-control" name="email" placeholder="Your email"
                required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
            <input type="password" class="form-control" name="password" placeholder="Password"
                required="required" data-validation-required-message="Please enter your password" />
            <p class="help-block text-danger"></p>
        </div>

        <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Submit</button>
        </div>
    </form>
    <br>
    <h3 style="color: #007bff;">Don't have a company account?</h3>
    <p><a href="{{route('postjob')}}">Click here to log up</a></p>
</div>

<style type="text/css">
    
    .contact-form {
    margin: auto;
    width: 60%; /* Default for desktop */
    padding: 20px; /* Optional: Adds spacing inside */
    border-radius: 8px; /* Optional: Rounds the corners */
}

/* Mobile View (screens smaller than 768px) */
@media (max-width: 768px) {
    .contact-form {
        width: 90%;
    }
}

</style>


            </div>         
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->



  @endsection