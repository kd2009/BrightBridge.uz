@extends("main2.main2")

@section("content")
    <!-- Bradcam Area Start -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3 class="text-white">Application Result</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bradcam Area End -->

    <!-- Job Details Area Start -->
    <div class="job_details_area pt-5 pb-5">
        <div class="container text-center">
            <!-- Success Message -->
            <div class="alert congrats-alert">
                <h1 class="display-4 congrats-title">Congratulations!</h1>
                <p>Your application has been submitted successfully.</p>
            </div>

            <!-- Call to Action Link -->
            <div class="mt-4">
                <h3><a href="{{route('myapplications',['id'=>$_SESSION['candidate_id']])}}" class="btn btn-primary py-2 px-4">Click here to check your application status</a></h3>
            </div>
        </div>
    </div>
    <!-- Job Details Area End -->

    <!-- Additional CSS for Mobile Responsiveness -->
    <style>
        @media (max-width: 767px) {
            /* Make the alert and title smaller on mobile */
            .congrats-alert {
                padding: 20px;
            }
            .congrats-title {
                font-size: 2rem;
            }
            .mt-4 h3 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            /* Further adjustments for very small screens */
            .congrats-alert {
                padding: 15px;
            }
            .congrats-title {
                font-size: 1.75rem;
            }
            .mt-4 h3 {
                font-size: 1rem;
            }
        }
    </style>
@endsection
