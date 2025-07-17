@extends("main2.main")

@section("content")
    <div class="bradcam_area bradcam_bg_1 about-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="bradcam_text">
                        <h1 class="page-title"><font color="white">About BrightBridge.uz</font></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wrapper for spacing -->
    <div class="about-wrapper">
        <section class="about-section section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="about-title">Who We Are</h2>
                    </div>
                    <div class="col-lg-12">
                        <p class="about-text">
                         BrightBridge.uz is an innovative platform bridging knowledge gaps, fostering workforce connectivity, and empowering entrepreneurs in Uzbekistan. Originating from the Business Glossary project, it was the country and category winner of the Creative Spark Big Idea Challenge 2019, sponsored by the British Council Uzbekistan and London Metropolitan University (UK). Providing business glossaries with English and Uzbek translations, BrightBridge.uz also offers tools, mentorship, and resources for young entrepreneurs. Led by Abbos Utkirov, the platform empowers individuals to navigate the business landscape effectively. </p>
                      
                        <!-- About Image -->
                        <div class="text-center my-4">
                            <img src="{{ asset('upl/aboutus.png') }}" alt="About BrightBridge" class="img-fluid rounded shadow">
                        <br> <br>   <h4 class="image-source">
                                Source: <a href="https://www.britishcouncil.uz/en/programmes/education-society/creative-spark/big-idea-challenge" target="_blank">British Council Uzbekistan</a>
                            </h4>
                        </div>

                        <h3 class="section-heading">Our Mission</h3>
                        <p class="about-text">
                           Beyond business glossaries, BrightBridge.uz offers a comprehensive ecosystem for startups, professionals, and students, facilitating networking, training, and career development. It also supports the Incubation Center and Professional Development Centre at MDIS Tashkent, enhancing student employability through internships, job opportunities, and skill-building programs. </p>

                        <h3 class="section-heading"> Why Choose BrightBridge?</h3>
                        <ul class="feature-list">
                            <li><strong>Startup Support:</strong> Incubation, mentorship, and funding opportunities.</li>
                            <li> <strong>Investor Network:</strong> Direct connections to global investors.</li>
                            <li> <strong>Educational Resources:</strong> Business courses, expert-led workshops, and industry insights.</li>
                            <li> <strong>Business Consulting:</strong> Digital transformation, financial modeling, and strategic planning.</li>
                            <li> <strong>Career Development:</strong> CV writing, interview coaching, and job placements.</li>
                        </ul>

                        <h3 class="section-heading">2025 Incubation Centre Plans</h3>
                        <ul class="feature-list">
                            <li> Smart learning programs for students.</li>
                            <li> Short IT & Business courses in partnership with the **School of Business & Management**.</li>
                            <li> Seven structured **Startup Incubation Programs**.</li>
                            <li> Investor Demo Days and Pitch Competitions.</li>
                        </ul>

                        <h3 class="section-heading"> Empowering Uzbekistan’s Future</h3>
                        <p class="about-text">
                            BrightBridge.uz is committed to *fostering entrepreneurship, innovation, and career growth*. Whether you're an entrepreneur, investor, or student, we provide the *tools and opportunities* to accelerate your success.
                        </p>

                        <h3 class="section-heading"> Register Now:</h3>
                        <ul class="feature-list">
                            <li> <strong>Job Seeker Registration:</strong> <a href="https://brightbridge.uz/logup" target="_blank">Sign up here</a></li>
                            <li> <strong>Employer Registration:</strong> <a href="https://brightbridge.uz/postjob" target="_blank">Post a job</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<style>
.about-wrapper {
    margin-top: 50px;
    margin-bottom: 50px;
}

.about-header {
    background: linear-gradient(90deg, #007BFF, #0056b3);
    padding: 80px 0;
    text-align: center;
    color: white;
}

.page-title {
    font-size: 38px;
    font-weight: bold;
    text-transform: uppercase;
}

.about-section {
    background-color: #F9F9F9;
    padding: 80px 0;
    border-radius: 10px;
}

.about-title {
    font-size: 32px;
    font-weight: bold;
    color: #007BFF;
    margin-bottom: 20px;
}

.about-text {
    font-size: 18px;
    line-height: 1.8;
    color: #333;
    text-align: justify;
}

.section-heading {
    font-size: 24px;
    font-weight: bold;
    color: #0088FF;
    margin-top: 30px;
}

.feature-list {
    list-style: none;
    padding-left: 0;
}

.feature-list li {
    font-size: 18px;
    margin-bottom: 10px;
    padding-left: 30px;
    position: relative;
    color: #333;
}

.feature-list li::before {
    content: "🔹";
    position: absolute;
    left: 0;
    color: #00B33F;
    font-size: 20px;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 30px;
    }
    .about-title {
        font-size: 24px;
    }
    .about-text {
        font-size: 16px;
    }
    .section-heading {
        font-size: 20px;
    }
    .feature-list li {
        font-size: 16px;
    }
}
</style>

