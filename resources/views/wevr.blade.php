<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/wevr.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/landingpage/pics/sec-logo.png')}}" type="image/x-icon">
    <title>Wevr</title>
</head>

<body>

    <!-- navbar and header section -->
    <section class="header">
        <div class="container">
            <div class="header-nav">
                <div class="logo">
                    <a href="wevr.html">
                        <img class="logo-1" src="{{asset('assets/landingpage/pics/white logo-01 1.png')}}" alt="">
                        <img class="logo-2" src="{{asset('assets/landingpage/pics/sec-logo.png')}}" alt="">
                    </a>
                </div>


                <ul class="links">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#our-work">Our work</a>
                    </li>
                    <li>
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a href="#our-team">Our team</a>
                    </li>
                    <li class="contact">
                        <a href="#contact-us">Contact us</a>
                    </li>

                    <li class="side-icon">
                        <img src="{{asset('assets/landingpage/pics/menu.png')}}" alt="" onclick="open_side()">
                    </li>
                </ul>
            </div>


            <div class="side-bar" id="side">
                <div class="side-cover">
                    <div class="close-btn" onclick="close_side()">
                        <i class="bi bi-x-lg"></i>
                    </div>

                    <div class="side-content">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('assets/landingpage/pics/white logo-01 1.png')}}" alt="">
                            </a>
                        </div>


                        <ul class="links">
                            <li>
                                <a href="#about" onclick="close_side()">About</a>
                            </li>
                            <li>
                                <a href="#services" onclick="close_side()">Services</a>
                            </li>
                            <li>
                                <a href="#our-work" onclick="close_side()">Our work</a>
                            </li>
                            <li>
                                <a href="#portfolio" onclick="close_side()">Portfolio</a>
                            </li>
                            <li>
                                <a href="#our-team" onclick="close_side()">Our team</a>
                            </li>
                            <li class="contact">
                                <a href="#contact-us" onclick="close_side()">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="header-content" id="about">
                <div class="title">
                    <h1>What is WEVR?</h1>
                </div>

                <div class="desc">
                    <p>It is an environment to sreve the customer by failitating the process of buying and renting
                        apartment. Where the environment works as a broker, through a mobile application</p>
                </div>


                <div class="offer">
                    <div class="input-offer">
                        <input class="email" type="email" name="" id="" placeholder="Type your email">
                        <input class="submit" type="submit" value="Get Offer">
                    </div>
                    <div class="little">
                        <span>*Let us contact you</span>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- navbar and header section -->




    <!-- services section  -->

    <section class="services" id="services">
        <div class="container">

            <div class="head-title">
                <h2>Our services</h2>
            </div>

            <div class="row">
                <div class="colom col-11 col-md-6 col-lg-5">
                    <div class="col-info">
                        <h4>Explore homes</h4>
                        <img src="{{asset('assets/landingpage/pics/pngwing.png')}}" alt="">

                        <div class="desc">
                            <p>Easily search for any home and select</p>
                            <p>your own search</p>
                            <p>options</p>
                        </div>
                    </div>
                </div>

                <div class="colom col-11 col-md-6 col-lg-5">
                    <div class="col-info">
                        <h4>Virtual tour</h4>
                        <img src="{{asset('assets/landingpage/pics/pngwing-1.png')}}" alt="">

                        <div class="desc">
                            <p>Virtual tour for each house to give</p>
                            <p>a clear view of</p>
                            <p>all details</p>
                        </div>
                    </div>
                </div>

                <div class="colom col-11 col-md-6 col-lg-5">
                    <div class="col-info">
                        <h4>Online auction</h4>
                        <img src="{{asset('assets/landingpage/pics/pngwing-3.png')}}" alt="">

                        <div class="desc">
                            <p>Ease in participating in real estate</p>
                            <p>auctions as a bidder or buyer</p>
                        </div>
                    </div>
                </div>

                <div class="colom col-11 col-md-6 col-lg-5">
                    <div class="col-info">
                        <h4>Property owner</h4>
                        <img src="{{asset('assets/landingpage/pics/pngwing-2.png')}}" alt="">

                        <div class="desc">
                            <p>Sell your property</p>
                            <p>easily</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- services section  -->



    <!-- our work section -->


    <section class="our-work" id="our-work">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="col-img">
                    <img src="{{asset('assets/landingpage/pics/Group 1000004664.png')}}" alt="">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="col-data">
                    <h3>Our work</h3>

                    <p>Building a mobile application includes the following</p>
                    <ul>
                        <li>Providing search filters based on the specifications given by the clien</li>
                        <li>Providing a virtual tour of the apartment Providing a high-quality pictures of the apartment
                        </li>
                        <li>Providing a near-by service</li>
                        <li>Providing a secure Online auction</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- our work section -->


    <!-- portfolio section -->


    <section class="portfolio" id="portfolio">
        <div class="row">
            <div class="colom col-12 col-lg-5">
                <div class="port-info">
                    <h3>Portfolio</h3>
                    <p>Designing a moblie app that is compatible with all devices using flutter and with design trends
                        to
                        facilitate use and ease of communication with the team to solve any problem</p>

                    <div class="imgs">
                        <a href="#">
                            <img src="{{asset('assets/landingpage/pics/googleplay.png')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('assets/landingpage/pics/appstore.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-5 col-lg-4">
                <div class="col-img col-img-1">
                    <img class="img-1" src="{{asset('assets/landingpage/pics/OWINJ61 copy.png')}}" alt="">
                </div>
            </div>

            <div class="col-4 col-md-4 col-lg-3">
                <div class="col-img col-img-2">
                    <img class="img-2" src="{{asset('assets/landingpage/pics/s89-pm-0083-03-card-mockup copy.png')}}" alt="">
                </div>
            </div>
        </div>

    </section>

    <!-- portfolio section -->


    <!-- team section -->

    <section class="team" id="our-team">
        <div class="container">

            <div class="head-title">
                <h2>Our Team</h2>
            </div>

            <div class="row">
                <div class="response col-0 col-xxl-1"></div>
                <div class="colom col-11 col-sm-9 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">

                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/gad.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Ahmed Gad</h4>
                            <p>Flutter developer</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="colom col-11 col-sm-9 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/amany.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Amany Ashraf</h4>
                            <p>Penetration tester</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="colom col-11 col-sm-9 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/amir.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Amir Nagy</h4>
                            <p>Back-End developer</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="response col-0 col-xxl-1"></div>
                <div class="colom col-11 col-sm-9 col-md-6 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/safwa.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Safwa Fady</h4>
                            <p>UI/UX designer</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="colom col-11 col-sm-9 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/mawada.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Mawada Awad</h4>
                            <p>Flutter develop</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="colom col-11 col-sm-9 col-md-6 col-lg-5 col-xl-3">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{asset('assets/landingpage/pics/abo4.jpg')}}" alt="">
                        </div>

                        <div class="item-data">
                            <h4>Mohamed Ayman</h4>
                            <p>System analyst</p>

                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- team section -->


    <!-- contact section -->

    <section class="contact-sec" id="contact-us">
        <div class="contact-cover">
            <div class="container">
                <div class="row">
                    <div class="col-10 col-md-7 col-lg-5 col-xl-4">
                        <div class="col-info">
                            <div class="title">
                                <h2>want to</h2>
                                <h2>contact?</h2>
                            </div>

                            <div class="desc">
                                <p>let your email</p>
                                <p>and we will contact you soon.</p>
                            </div>

                            <div class="email">
                                <input type="text" placeholder="your email">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact section -->



    <!-- footer section -->


    <footer>
        <div class="container">
            <div class="footer-cover">
                <div class="row">
                    <div class="colom col-6 col-lg-4">
                        <div class="logo">
                            <a href="wevr.html">
                                <img src="{{asset('assets/landingpage/pics/sec-logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="colom col-6 col-lg-4">
                        <div class="contact-us">
                            <h3>contact us</h3>
                            <p>support@wevr.tech</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-2">
                        <div class="footer-links">
                            <ul>
                                <li>
                                    <a href="#about">
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="#services">
                                        Services
                                    </a>
                                </li>
                                <li>
                                    <a href="#our-work">
                                        Our Work
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-lg-2">
                        <div class="footer-links">
                            <ul>
                                <li>
                                    <a href="#portfolio">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#our-team">
                                        Team
                                    </a>
                                </li>
                                <li>
                                    <a href="#contact-us">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="footer-bottom">
                <ul class="bottom-ul">
                    <li>Copyright © 2023 WD. All rights reserved.</li>
                    <li>Terms</li>
                    <li>Privacy</li>
                    <li>Accessibility Statement</li>
                </ul>

                <ul class="sec-ul">
                    <li>
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- footer section -->



    <div class="scroll-to-up">
        <i class="bi bi-arrow-up"></i>
    </div>

    <script src="{{asset('assets/landingpage/js/wevr.js')}}"></script>
</body>

</html>
