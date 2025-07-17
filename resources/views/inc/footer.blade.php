  <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                <a href="mailto:info@jobcare.uz">info@jobcare.uz</a> <br>
                            <a href="tel:+998334334707">+998 33 443-47-07</a> <br>
                            <a href="https://maps.app.goo.gl/kJ52JNhGrdRKdGpF8">28, Bunyodkor Ave, Chilanzar</a>
                        
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <!--<li>-->
                                    <!--    <a href="#">-->
                                    <!--        <i class="ti-facebook"></i>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                
                                    <li>
                                        <a href="http://t.me/jobcare.uz/">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/jobcare.uz/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>    <li>
                                        <a href="https://www.linkedin.com/company/jobcareuz">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Quick links
                            </h3>
                            <ul>
                                            <li><a href="{{route('main')}}">Home</a></li>
                                            <li><a href="{{route('jobs')}}">Browse Job</a></li>
                                            <li><a href="{{route('candidate')}}">Candidates </a></li>
                                            <li><a href="{{route('blogpost')}}">Blog</a></li>
                                            <li><a href="{{route('contact')}}">Contact</a></li>
                                            <li><a href="{{route('logup')}}">Candidate Log up</a></li>
                                            <li><a href="{{route('postjob')}}">Company Log up</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Category
                            </h3>
                            <ul>
                                <?php foreach($category as $cat) { ?>
                                <li><a href="{{route('category',['id'=>$cat->id])}}"><?=$cat->title ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Subscribe to get up-to-date news</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                           
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made  by <a href="https://t.me//uzweb_team" target="_blank">uzweb_team</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
