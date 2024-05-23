<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDII-TN</title>
    <meta name="description" content="Our PG Diploma in Entrepreneurship and innovation is designed to match the needs and requirements of industry and commerce and to fulfill the aspirations of future managers." />
    <link rel="canonical" href="index.php" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="index.php" />
    <meta property="og:description" content="Our PG Diploma in Entrepreneurship and innovation programme is designed to match the needs and requirements of industry and commerce and to fulfill the aspirations of future managers." />
    <meta property="og:url" content="index.php" />
    <meta property="og:site_name" content="EDII-TN" />
    <meta property="article:publisher" content="" />
    <meta property="article:modified_time" content="2022-09-06T11:11:06+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="3 minutes" />
    <meta name="theme-color" content="#21337d" />
    <link rel="icon" type="image/ico" href="home/images/icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/css/slick.css">
    <link rel="stylesheet" href="home/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="home/css/global.css">
    <link rel="stylesheet" href="home/css/header-footer.css">
    <link rel="stylesheet" href="home/css/landing-page.css">
    <link rel="stylesheet" href="home/css/form-widget.css">
    <link rel="stylesheet" href="home/css/program.css">
    <link rel="stylesheet" href="home/css/dark-mode-new.css">
    <link rel="stylesheet" href="home/css/custom.css">
</head>

<body>
    <script>
        var siteUserRole = "{{Auth::user() ? Auth::user()->role : 'student'}}";
        var siteURL = "{{env('APP_URL')}}";
        if (document.documentElement) {
            document.documentElement.setAttribute("data-theme", "light");
        }
    </script>
    <header class="header shadow shadow-sm">
        <div class="header__top" style="padding-top: 6px;padding-bottom: 6px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="top-notification-slider" style="line-height: 15px;">
                            <div class="tns-item" style="margin-top: 8px;">
                                <a href="./management/form/admissions/" style="color:white;">
                                    <strong>Apply Now | Online Registration Open <br> </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="header__top--right d-flex justify-content-lg-end justify-content-md-center" style="padding-top: 5px;">
                            <div class="header-social">
                                <a href="" target="_blank" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="" title="linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="" title="instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="" title="youtube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            </div>
                            <div class="header__top--links">
                                <ul class="d-flex justify-content-center list-unstyled m-0 p-0">
                                    <!--  <li>
                                 <a href="..//international">International</a>
                                 </li> -->
                                    <li>
                                        <a href="">Student Corner</a>
                                    </li>
                                    <li>
                                        @if(Auth::user() && Auth::user()->role == 'admin')
                                        <a href="{{ route('admin.dashboard.view') }}">Dashboard</a>
                                        @else
                                        <a href="/login">Admin Login</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="">
                                <a href="javascript:void(0);" id="search-page-mob" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-search ms-4" aria-hidden="true" style="color: #39c5ff;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__center">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="uu-logo">
                    <a href="{{ env('APP_URL') }}" class="uu-pc-logo"><img src="home/images/logo_2.png" alt="TNEDII" title="TNEDII" width="460px"></a>
                    <a href="{{ env('APP_URL') }}" class="d-none uu-pc-logo uu-pc-dark-logo"><img src="home/images/logo_2.png" title="TNEDII" width="250"></a>
                </div>
                <div class="header__center--right d-flex align-items-center justify-content-end">
                    <div class="headerApply d-flex justify-content-center">
                        <div class="headerApply__phones">
                            <a href="tel:044-22252081"><i class="fa fa-phone" aria-hidden="true"> </i>
                                044-22252081/82</a>
                            <a href="tel:044-22252083"><i class="fa fa-phone" aria-hidden="true"> </i>
                                044-22252083/85</a>
                        </div>
                    </div>
                    <div class="headerAccredations ms-5">
                        <img src="home/images/uu-excellance-logo.png" alt="Excellance">
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container">
                    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav d-flex centcon w-100">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item dd-menu">
                                <a class="nav-link" href="javascript:void(0)">About EDII</a>
                                <div class="mega-menu" style="height: 332px; overflow: hidden;">
                                    <div class="container">
                                        <div class="menu-programs-list__style">
                                            <div class="row g-0">
                                                <div class="col-lg-8">
                                                    <div class="pt-4 pb-4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <h5>About Institute</h5>
                                                                <ul class="p-0 m-0 list-unstyled list-icon-2">
                                                                    <li>
                                                                        <a href="about/index.php">About EDII </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="about/vision-mission.php">Vision &
                                                                            Mission</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="about/awards-and-rankings.php">Awards &
                                                                            Rankings</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="about/awards-and-rankings.php">Life of
                                                                            Campus</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h5>Related Links</h5>
                                                                <ul class="p-0 m-0 list-unstyled list-icon-2">
                                                                    <li>
                                                                        <a href="">About Entrepreneurship Program</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">Admissions</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">How to Reach Us?</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 hide-mob" style="background-color: var(--bg-green);">
                                                    <div class="ddMenu-numbers">
                                                        <div class="specialization-thumb br-20 w-100 mb-3" style="background: url('home/images/header-about-img.jpg'); background-size: cover; height: 320px; border-radius: 0;">
                                                            <div class="specialization-thumb__content">
                                                                <h3>
                                                                    <div class="sm">Best</div>
                                                                    <br>
                                                                    <div class="lg">Entrepreneurship</div>
                                                                    <br>
                                                                    <div class="lg">Institute</div>
                                                                    <br>
                                                                    <div class="md">with a Innovation</div>
                                                                    <br>
                                                                    <div class="md">Based Curriculum</div>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dd-menu">
                                <a class="nav-link" href="javascript:void(0)">Admissions</a>
                                <div class="mega-menu" style="height: 286px; overflow: hidden;">
                                    <div class="container">
                                        <div class="menu-programs-list__style">
                                            <div class="row g-0">
                                                <div class="col-lg-12">
                                                    <div class="pt-4 pb-4">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <h5>Admissions</h5>
                                                                <ul class="p-0 m-0 list-unstyled list-icon-2">
                                                                    <li>
                                                                        <a href="javascript:void(0);" onclick="scrollToSection('hoa')">How to
                                                                            Apply</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" onclick="scrollToSection('hoe')">Admission
                                                                            eligibility</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" onclick="scrollToSection('hoe')">Admission
                                                                            procedure</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" onclick="scrollToSection('hoe')">Program
                                                                            Fees Structure</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" onclick="scrollToSection('hoe')">Scholarships</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <h5>Other Links</h5>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <ul class="p-0 m-0 list-unstyled list-icon-2">
                                                                            <li>
                                                                                <a href="javascript:void(0);" onclick="scrollToSection('whyedii')">Why
                                                                                    Entrepreneurship</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="/contact">How to Reach Us?</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dd-menu dd-menu-left position-relative">
                                <a class="nav-link" href="javascript:void(0)">Program Architecture</a>
                                <div class="mega-menu mega-menu-sm" style="height: 404px; width: 600px; overflow: hidden;">
                                    <div class="menu-programs-list__style">
                                        <div class="row g-0">
                                            <div class="col-lg-6">
                                                <div class="pt-4 pb-4 ps-4">
                                                    <h5>Programs</h5>
                                                    <ul class="p-0 m-0 list-unstyled list-icon-2">
                                                        <li>
                                                            <a href="">Semesters Overview</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Internships</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Detailed Project Report</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Business Incubator</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Mentoring and Handholding</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Faculty</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 position-relative hide-mob" style="background: url('home/images/header-academics-img.jpg'); background-size: cover; height: 405px; background-position: right;">
                                                <div class="acc-list">
                                                    <ul class="list-unstyled p-0 m-0">
                                                        <li>Entrepreneurship Based Best System</li>
                                                        <li>Outcome based Education System</li>
                                                        <li>Advanced Technologies & Integration</li>
                                                        <li>Project based & Experiential Learning</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Contact Us</a>
                            </li>
                            @if(Auth::user() && Auth::user()->role == 'student')
                            <div class="headerApply__btn ms-4" style="">
                                <a href="{{ route('student.dashboard.view') }}" class="btn btn-sm btn-primary btn-shadow">
                                    Dashboard <i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></a>
                            </div>
                            @else
                            <div class="headerApply__btn ms-4" style="">
                                <a href="{{ route('student.login') }}" class="btn btn-sm btn-primary btn-shadow">Apply
                                    Now <i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></a>
                            </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="overlay-bg"></div>
    </header>
    <section class="programDetailBanner position-relative d-flex align-items-center" style="background: url('home/images/executive-mba.jpg'); background-size: cover;">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="programDetailBanner__content" style="color:#000">
                        <h2 style="color:#000">PG Diploma Entrepreneurship </h2>
                        <h2 style="color:#000; margin-top:-18px; color: orangered">& Innovation</h2>
                        <p style="color:#000">Explore our EDII-TN has been pioneering entrepreneurship and innovation
                            promotion programs funded by the Government of Tamil Nadu, such as the Innovation Voucher
                            program (Rs. 20 crores). Through this program, EDII-TN identifies and supports innovators
                            with funds to develop new product prototypes.
                        </p>
                        <!-- <a href="../admissions/index.php" class="btn btn-lg btn-primary btn-shadow">Apply Now <i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></a> -->
                    </div>
                    <div class="keyfeatures mt-5">
                        <div class="row g-3">
                            <div class="col-lg-8">
                                <div class="row g-3">
                                    <div class="col-md-4 col-6">
                                        <div class="card h-100 br-10 border-0">
                                            <div class="card-body">
                                                Duration
                                            </div>
                                            <div class="card-footer border-0 bg-transparent pt-0">
                                                <h4>1 Year</h4>
                                                <small>2 semesters</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="card h-100 br-10 border-0" style="background: rgb(33 0 64 / 95%);">
                                            <div class="card-body">
                                                Hours of Dedication
                                            </div>
                                            <div class="card-footer border-0 bg-transparent pt-0">
                                                <h4>Full Time</h4>
                                                <small>Recommended </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="card h-100 br-10 border-0">
                                            <div class="card-body">
                                                Delivery
                                            </div>
                                            <div class="card-footer border-0 bg-transparent pt-0">
                                                <h4>Blended Learning </h4>
                                                <small>Mode</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ee-form-widget" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 7px;">
                        <h2 style="
                        text-align: center;
                        padding-top: 4%;
                        font-size: 25px;
                        "> Apply Now: 2023-24</h2>
                        <h2 style="
                        text-align: center;
                        padding-top: 0%;
                        font-size: 25px;
                        font-weight: bold;
                        ">PG Diploma Entrepreneurship &
                            Innovation Program
                        </h2>
                        <p style="
                        text-align: center;
                        padding-top: 15px;
                        font-size: 13px;
                        padding-bottom: -20px;
                        padding-left: 15px;
                        padding-right: 15px;
                        font-weight: bold;
                        ">Entrepreneurship Development and Innovation Institute (EDII-TN) and Entrepreneurship
                            Development Institute of India
                            (EDII) are jointly dedicated in providing a transformative one-year PG Diploma Programme in
                            Entrepreneurship and Innovation. Through a blend of rigorous academics, practical learning
                            experiences, and mentorship from industry experts
                        </p>
                        <div style="
                        text-align: center;
                        padding-top: -15px;
                        font-size: 13px;
                        padding-left: 15px;
                        padding-right: 15px;
                        "><a href="./management/form/admissions/formenter/entrystart.php" class="btn btn-lg btn-primary btn-shadow mt-4">Registration Now Open</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" id="whyedii">
        <ol class="breadcrumb m-0 pt-3 pb-1">
            <li><a href="{{ env('APP_URL') }}"></a></li>
            <li><a class="bread_crumb" href="{{ env('APP_URL') }}">EDII</a></li>
            <li><a class="bread_crumb" href="{{ env('APP_URL') }}">Entrepreneurship &
                    Innovation</a>
            </li>
        </ol>
    </div>
    <section class="aboutProgram-section pt-8 pb-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="aboutProgram-section__content">
                        <div class="page-heading">
                            <h1>Why Entrepreneurship</h1>
                        </div>
                        <p>Entrepreneurship is the foundation of innovation, job creation, and wealth generation. It
                            goes beyond benefitting the economy and results in greater social and community development.
                            Particularly in India, where a sizable youth population is willing to take a plunge, invest
                            in unconventional routes, and seek solutions to problems, there lays unique opportunities to
                            educate and mentor them on the merits of entrepreneurial pursuits.
                        </p>
                        <p>The outcome is assured economic growth, the emergence of new industries, enhanced
                            productivity, and a more sustainable society. Thus, entrepreneurship has given rise to a new
                            breed of unique knowledge population that banks on innovation, a phenomenon that was not
                            present until recently.
                        </p>
                        <!-- <p><strong>The Programme aims to provide learners with:</strong></p>
                        <ul>
                            <li>An introduction to the study of business and management.</li>
                            <li>A progressively higher level of understanding and critical awareness of the main issues in strategic management.</li>
                            <li>A global holistic perspective of management and business administration.</li>
                            <li>A range of intellectual skill and management competencies required for effective management practice.</li>
                        </ul> -->
                        <div class="page-sub-heading mt-5">
                            <h3>Salient Features : Entrepreneurship &
                                Innovation
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sFeaturesBox">
                                    <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i> Institute
                                        Immersion:
                                    </h5>
                                    <p>A deeper understanding of entrepreneurship and the entrepreneurial landscape in
                                        Tamil Nadu..
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sFeaturesBox">
                                    <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i> Skill Enhancing
                                        Curriculum:
                                    </h5>
                                    <!-- <p>Carefully crafted curriculum in consultation with the industry experts and recruiters to develop the right set of skills required for the industries.</p> -->
                                    <p>Familiarity with India's start-up ecosystem, including key stakeholders,
                                        government initiatives, and success stories..
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sFeaturesBox">
                                    <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i> Conductive
                                        Learning Environment:
                                    </h5>
                                    <p>Practical skills in identifying market segmentation, understanding market
                                        environments, and comprehensive understanding of consumer behaviour and trends.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="page-sub-heading mt-5">
                            <h3>Entrepreneurship &
                                Innovation :
                            </h3>
                        </div>
                        <p>Recognizing the significance of mentorship and personalized guidance, aspiring entrepreneurs
                            receive comprehensive support and inspirational networking opportunities throughout the
                            program, until they attain self-reliance and proficiency in conducting business
                            independently. The program facilitates connections with mentors, industry specialists, and
                            business support providers, while also granting access to EDII-TN's extensive resources,
                            including literature, library facilities, faculty expertise, and innovation hubs for
                            start-up development and expansion.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="specialization-slider pagination-style-1">
                        <div class="specialization-slider__item">
                            <div class="specialization-thumb br-20" style="background: url('home/images/slide1.jpg'); background-size: cover;">
                                <div class="specialization-thumb__content">
                                    <h3>
                                        <div class="sm">Globally</div>
                                        <br>
                                        <div class="lg">Comparable,</div>
                                        <br>
                                        <div class="lg">Flexible</div>
                                        <br>
                                        <div class="md">and Innovation</div>
                                        <br>
                                        <div class="md">Based Academics</div>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="specialization-slider__item">
                            <div class="specialization-thumb br-20" style="background: url('home/images/side2.jpg'); background-size: cover;">
                                <div class="specialization-thumb__content">
                                    <h3>
                                        <div class="sm">Globally</div>
                                        <br>
                                        <div class="lg">Comparable,</div>
                                        <br>
                                        <div class="lg">Flexible</div>
                                        <br>
                                        <div class="md">and Conducive</div>
                                        <br>
                                        <div class="md">Learning Environment</div>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="programVideo position-relative overflow-hidden br-20 mt-4">
                        <img src="home/images/v-thumb.jpg" alt="" class="w-100">
                        <a class="play-btn" data-fancybox href="https://youtu.be/Q_2v3NN4Q1U">
                            <div class="circle pulse"></div>
                            <div class="circle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <polygon points="40,30 65,50 40,70"></polygon>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fees-section pt-8 pb-8" id="hoe">
        <div class="container">
            <div class="page-heading">
                <h2>Eligibility & Fee Details</h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <p class="btn btn-sm btn-primary btn-shadow">
                        <a href=".pdf" target="_blank" style="border:0px; color:#fff; background:none;text-decoration: none;">Download</a>
                    </p>
                    <div class="tabs-style mb-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Fee Structure</button>
                            </li>
                        </ul>
                        <div id="printableArea">
                            <div id="image">
                                <img src="" width="250" height="120" alt="" />
                                <h4>Entrepreneurship &
                                    Innovation
                                </h4>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Regular Fee  -->
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="feeTables">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th valign="top">Details</th>
                                                    <th valign="top">Fee</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td rowspan="3" valign="middle">Fee for PG Diploma in
                                                            Entrepreneurship & Innovation
                                                        </td>
                                                        <td>80,000</td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="1">An additional fee for study material &
                                                            facilitation.
                                                        </td>
                                                        <td>20,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="final">Complete Course Fee with study
                                                            material & facilitation
                                                        </td>
                                                        <td class="final">1,00,000</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <!-- Regular End -->
                                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                    <div class="feeTables">
                                        <h4>One Time Payable Charges in 1st Semester (INR)</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th valign="top">Admission Fee</th>
                                                    <th valign="top">Enrolment Fee</th>
                                                    <th valign="top">Caution Money<br>(Refundable after completion of
                                                        programme)
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10,000</td>
                                                        <td>2,000</td>
                                                        <td>2,000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h4>Other Charges Per Semester (INR)</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th valign="top">Examination Fee</th>
                                                    <th valign="top">Library Fee</th>
                                                    <th valign="top">Student Welfare Fee</th>
                                                    <th valign="top">Online Student Information Fee</th>
                                                    <th valign="top">Professional Fee (Assessment Solutions)</th>
                                                    <th valign="top">Total</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>4,600</td>
                                                        <td>800</td>
                                                        <td>750</td>
                                                        <td>1,500</td>
                                                        <td>531</td>
                                                        <td>8,181</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h4>Optional Fee (INR)</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th valign="top">Hostel & Mess Fee</th>
                                                    <th valign="top">Single Bed</th>
                                                    <th valign="top">Double Bed</th>
                                                    <th valign="top">Triple Bed with Attached Bathroom (Only for Boys)
                                                    </th>
                                                    <th valign="top">Triple Bed</th>
                                                    <th valign="top">Four Bed</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Rent and other Fee per Academic Year </td>
                                                        <td>85,000</td>
                                                        <td>55,000</td>
                                                        <td>65,000</td>
                                                        <td>47,000</td>
                                                        <td>42,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mess Fee per Academic Year </td>
                                                        <td>40,500</td>
                                                        <td>40,500</td>
                                                        <td>40,500</td>
                                                        <td>40,500</td>
                                                        <td>40,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Laundry Fee per Academic Year </td>
                                                        <td>2,500</td>
                                                        <td>2,500</td>
                                                        <td>2,500</td>
                                                        <td>2,500</td>
                                                        <td>2,500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hostel Security Fee (Refundable after completion of the
                                                            session)
                                                        </td>
                                                        <td>2,000</td>
                                                        <td>2,000</td>
                                                        <td>2,000</td>
                                                        <td>2,000</td>
                                                        <td>2,000</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td><b>Total Amount</b></td>
                                                        <td><b>1,30,000</b></td>
                                                        <td><b>1,00,000</b></td>
                                                        <td><b>1,10,000</b></td>
                                                        <td><b>92,000</b></td>
                                                        <td><b>87,000</b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <h4>Optional Fee (INR)</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Transportation Fee for Doiwala/Nepali Farm/Rishikesh/Poanta
                                                            Sahib Routes per Academic Year
                                                        </td>
                                                        <td>24,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transportation Fee for Other Routes per Academic Year</td>
                                                        <td>18,000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Fee Print -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="eligibility-block">
                        <div class="page-sub-heading">
                            <h3>Eligibility</h3>
                        </div>
                        <ul class="list-unstyled p-0 list-icon-3 ps-4">
                            <li>Graduation of any discipline from university recognized by the University Grants
                                Commission (UGC) / Association of Indian Universities (AIU) / (AICTE) with aggregate 50%
                                minimum marks.
                            </li>
                            <li> Final year graduates can also apply for this programme..</li>
                            <li>Age limit: 25 Years (For SC/ST, Women and physically challenged persons, 30 years)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="note-block br-20 shadow-sm border p-4">
                        <div class="page-sub-heading">
                            <h3>Note:</h3>
                        </div>
                        <ul class="list-unstyled p-0 list-icon-3 ps-4">
                            <li>Check your eligibility for 100% scholarship</li>
                        </ul>
                    </div>
                    <div class="note-block br-20 shadow-sm border p-4 mt-3">
                        <div class="page-sub-heading mb-4">
                            <h3>Mentoring and Handholding :</h3>
                        </div>
                        <ul class="list-unstyled p-0 list-icon-3 ps-4">
                            <li>Recognizing the significance of mentorship and personalized guidance, aspiring
                                entrepreneurs receive comprehensive support and inspirational networking opportunities
                                throughout the program, until they attain self-reliance and proficiency in conducting
                                business independently.
                            </li>
                            <li>industry specialists, and business support providers, while also granting access to
                                EDII-TN's extensive resources, including literature, library facilities, faculty
                                expertise, and innovation hubs for start-up development and expansion.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="programmeStructure-section pt-8 pb-8">
        <div class="container">
            <div class="page-heading">
                <h2>Programme Structure</h2>
                <br>
                <h5 style="color: #61b239;">(PG Diploma Entrepreneurship & Innovation )</h5>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="accordion mb-4" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Semester 1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th width="70">Sr. No.</th>
                                                <th>Course Name</th>
                                                <th>Course Cur</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>About Entrepreneurship</td>
                                                    <td>Examine the essence of entrepreneurship in the Indian landscape
                                                        (social, educational, political and economic aspects) with a
                                                        special emphasis on Tamil Nadu.
                                                        Understand some theoretical concepts and explore entrepreneurial
                                                        traits, characteristics, duties, and responsibilities.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Entrepreneurship Support Ecosystem </td>
                                                    <td>Learn about the entrepreneurship ecosystem in Tamil Nadu and
                                                        examine the state government's support initiatives and schemes
                                                        for the entrepreneurs.
                                                        Present a summary of national and state-level entities that
                                                        offer marketing, technological and credit rating assistance to
                                                        entrepreneurs.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Business Opportunity Identification</td>
                                                    <td>Understand the road map navigating the complex process of
                                                        identifying entrepreneurial opportunities and engage in steps
                                                        and methods involved in recognizing, analysing, and selecting
                                                        feasible business options.
                                                        Use practical frameworks, cases, and self-assessment activities
                                                        to engage in the procedures involved in discovering and
                                                        analysing business prospects.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Assessing Market Feasibility</td>
                                                    <td>Learn about identifying market segments, targets and understand
                                                        what is market environment
                                                        Learn to anticipate the demand based on market research and
                                                        leverage the information to generate actionable plans.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Semester 2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th width="70">Sr. No.</th>
                                                <th width="200">Course Name</th>
                                                <th>Course Cur</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Financial Planning & Management</td>
                                                    <td>Understand theoretical concepts of financial management,
                                                        financial planning, financial control, functions of a finance
                                                        manager, etc.
                                                        ,Learn about calculating working capital and budgeting for
                                                        business expenditures and develop a comprehensive operating
                                                        plan.
                                                        ,Explore different funding options available to the start-ups.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>New Venture Marketing Techniques</td>
                                                    <td>Learn about important marketing strategies viz-a-vi product
                                                        development, pricing and product promotion strategies
                                                        Understand the significance of packaging & branding to derive
                                                        customer satisfaction, retention and growth
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Legal Aspects of Starting and Growing A Business</td>
                                                    <td>Understand business laws and regulations including taxation,
                                                        environmental laws, labour laws, etc.
                                                        Learn about IPR (patents, trademarks, copyrights, etc.)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Effective Communication & Business Presentation Skills</td>
                                                    <td>Gain exposure to developing communication skills in different
                                                        contexts and learn strategies for improving verbal and
                                                        non-verbal communication skills
                                                        Learn techniques for structuring and delivering compelling
                                                        pitches and presentations
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mb-4" id="accordionExample2">
                        <h5 style="color: #61b239;">Business Incubator</h5>
                        <br>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree2b">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2b" aria-expanded="false" aria-controls="collapseThree2b">
                                    services to support start-ups.
                                </button>
                            </h2>
                            <div id="collapseThree2b" class="accordion-collapse collapse" aria-labelledby="headingThree2b" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong><u>Nine incubation centers </u></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>EDII - Mettupalayam Agroforestry Business Incubation Forum</td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>EDII - Periyakulam Horticulture Business Incubation Forum.</td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>EDII - Killikulam Agri Business Forum</td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>EDII - Trichy Agri Business Incubation Forum</td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>Annamalai Innovation and Incubation Research Foundation</td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>Periyar University Business Incubation Confederation
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>EDII - Marine Product Business Incubation Forum</td>
                                                </tr>
                                                <tr>
                                                    <td>9.</td>
                                                    <td>
                                                        Veterinary Incubation Forum @ TANUVAS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10.</td>
                                                    <td>
                                                        EDII - Anna Business Incubation and Research Foundation
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>To date, we have incubated 788 start-ups and conducted 1370 training
                                            sessions, workshops, and webinar programs, benefiting a total of 86,856
                                            individuals. The students enrolled with the PGDM will have access to these 9
                                            technology incubators.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="adv-thumb br-20 overflow-hidden" style="background: url('home/images/adv-thumb-uu.png'); background-size: cover;min-height: 600px !important;">
                        <div class="adv-thumb__content" style="width: 205px !important;padding: 20px !important;">
                            <h3>Knowledge at Your Fingertips</h3>
                            <p>Apply today at one of the best institute (EDII), India</p>
                            <a href="" class="btn btn-primary btn-shadow">Know More <i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="otherlinks br-20 shadow-sm border p-4 mt-4">
                        <div class="page-sub-heading mb-3">
                            <h3>Other Links</h3>
                        </div>
                        <ul class="list-unstyled p-0 list-icon-4 ps-4 mb-0">
                            <li><a href="#">Achievements</a></li>
                            <li><a href="#">Patents</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Labs</a></li>
                            <li><a href="#">Workshop</a></li>
                            <li><a href="#">Mentoring System</a></li>
                            <li><a href="#">PEO, SO, PO &amp; PSO</a></li>
                            <li><a href="#">Alumni</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bigInfo-section" style="background-image: url('home/images/middle-banner-uu.png'); background-size: cover; background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="bigInfo-section__content pt-8 pb-8">
                        <div class="page-heading">
                            <h2>Learning outcomes
                            </h2>
                        </div>
                        <p>At the end of the course, the students would have gained.</p>
                        <div class="icon-paragraph">
                            <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></h5>
                            <p>A deeper understanding of entrepreneurship and the entrepreneurial landscape in Tamil
                                Nadu.
                            </p>
                        </div>
                        <div class="icon-paragraph">
                            <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i> </h5>
                            <p>Familiarity with India's start-up ecosystem, including key stakeholders government
                                initiatives, and success stories.
                            </p>
                        </div>
                        <div class="icon-paragraph">
                            <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i> </h5>
                            <p>Practical skills in identifying market segmentation, understanding market environments,
                                and comprehensive understanding of consumer behaviour and trends.
                            </p>
                        </div>
                        <div class="icon-paragraph">
                            <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></h5>
                            <p>Comprehensive knowledge of marketing concepts and practical insights into product
                                promotion, packaging, and branding strategies.
                            </p>
                        </div>
                        <div class="icon-paragraph">
                            <h5><i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></h5>
                            <p>Professional skills in developing Detailed Project Reports (DPR) based on thorough market
                                research and IT applications.
                            </p>
                        </div>
                        <a href="./management/form/admissions/" class="btn btn-lg btn-primary btn-shadow mt-4">Apply
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="howToApply-section pt-8 pb-8" id="hoa">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-heading">
                        <h2 class="mb-3">How to Apply?</h2>
                        <p>Are you thinking of applying for study at UU or supporting someone who is? Please complete
                            the steps to start your journey.
                        </p>
                    </div>
                    <div class="howToApply-steps">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <div class="step-div d-flex align-items-center">
                                                <div class="step-div__icon d-flex align-items-center">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                </div>
                                                <div class="step-div__content">
                                                    <small>Step 1</small>
                                                    Registration
                                                </div>
                                            </div>
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <div class="step-div d-flex align-items-center">
                                                <div class="step-div__icon d-flex align-items-center">
                                                    <i class="fa fa-shield" aria-hidden="true"></i>
                                                </div>
                                                <div class="step-div__content">
                                                    <small>Step 2</small>
                                                    Application form
                                                </div>
                                            </div>
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <div class="step-div d-flex align-items-center">
                                                <div class="step-div__icon d-flex align-items-center">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                                <div class="step-div__content">
                                                    <small>Step 3</small>
                                                    Document verification & Admission
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="steps-thumb p-5 border br-20 shadow-sm">
                                                <small>Step 1</small>
                                                <h4>Registration</h4>
                                                <p>Apply Now and Register.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="steps-thumb p-5 border br-20 shadow-sm">
                                                <small>Step 2</small>
                                                <h4>Application Form</h4>
                                                <p>Fill the details and upload relevant documents</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="steps-thumb p-5 border br-20 shadow-sm">
                                                <small>Step 3</small>
                                                <h4>Document verification & Admission</h4>
                                                <p>Wait for the approval, pay the program fee & Start your journey with
                                                    us.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="adv-thumb br-20 overflow-hidden" style="background: url('home/images/adv-thumb-2.jpg'); background-size: cover;">
                        <div class="adv-thumb__content">
                            <h3 style="font-size:22px">Development With Internship Outlook</h3>
                            <p style="font-size:15px">Following the first semester, students are exposed to gain
                                practical experience through a 5-week internship placement in different organizations
                                within a Small and Medium Enterprise (SME).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Modal -->
    <div class="modal fade searchModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content red-bg border-0">
                <div class="modal-header pb-0 border-bottom-0">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Search the website here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2 text-center">
                    <form class="position-relative d-flex p-0" action="" method="get">
                        <input type="text" class="form-control" placeholder="Enter your search text" value="" name="q">
                        <input type="submit" value="Search" class="btn btn-primary ms-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="footerInfo">
                                <h4>Study Here</h4>
                                <ul class="m-0 p-0 list-unstyled">
                                    <li>
                                        <a href="">About EDII</a>
                                    </li>
                                    <li>
                                        <a href="">Academics</a>
                                    </li>
                                    <li>
                                        <a href="">Admisssions</a>
                                    </li>
                                    <li>
                                        <a href="">Scholarship</a>
                                    </li>
                                    <li>
                                        <a href="">Fee Payment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="footerInfo">
                                <h4>Live Here</h4>
                                <ul class="m-0 p-0 list-unstyled">
                                    <li>
                                        <a href="">Student Services</a>
                                    </li>
                                    <li>
                                        <a href="">Campus Life</a>
                                    </li>
                                    <li>
                                        <a href="">News & Events</a>
                                    </li>
                                    <li>
                                        <a href="">Infrastructure</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="footerInfo">
                                <h4>Grow Here</h4>
                                <ul class="m-0 p-0 list-unstyled">
                                    <li>
                                        <a href="">Placements</a>
                                    </li>
                                    <li>
                                        <a href="">Research</a>
                                    </li>
                                    <li>
                                        <a href="">Startups</a>
                                    </li>
                                    <li>
                                        <a href="">Research & Development Center</a>
                                    </li>
                                    <li>
                                        <a href="">Center of Excellence</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="footerInfo">
                                <h4>Get in Touch</h4>
                                <ul class="m-0 p-0 list-unstyled">
                                    <li>
                                        <a href="">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="">Admission Offices</a>
                                    </li>
                                    <li>
                                        <a href="">EDII Helpline</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="footerInfo">
                                <h4>About</h4>
                                <p class="mt-2 text-muted">EDII-TN has been pioneering entrepreneurship and innovation
                                    promotion programs funded by the Government of Tamil Nadu, such as the Innovation
                                    Voucher program (Rs. 20 crores). Through this program, EDII-TN identifies and
                                    supports innovators with funds to develop new product prototypes. Additionally,
                                    EDII-TN organizes an annual hackathon for school children and higher education
                                    students, such as those studying Engineering, with funding provided by the
                                    Government of Tamil Nadu. Generous cash awards are presented annually to students
                                    who succeed in the hackathon contests. Approximately 600,000 school students and
                                    500,000 higher education students participate in these hackathons each year.
                                    Furthermore, EDII-TN regularly releases case studies and video documentaries
                                    showcasing success stories. (www.youtube.com/editn) Students enrolled in this course
                                    will have access to these programs in various capacities.<a href="about/">Read
                                        More</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footerInfo footerContact">
                                <h4>Contact</h4>
                                <p><span class="text-muted">Address:</span> <br>Entrepreneurship Development and
                                    Innovation Institute, Parthasarathy Koil Street, Ekkaduthangal, Chennai-32
                                    <br>TamilNadu, INDIA
                                </p>
                                <ul class="m-0 p-0 list-unstyled">
                                    <li>
                                        <a href="tel:044-22252081"><span class="text-muted">Phone:</span><br>
                                            044-22252081/ 82/ 83 / 04422252085</a>
                                    </li>
                                    <li>
                                        <a href="mailto:asstd@editn.in "><span class="text-muted">Email:</span><br>
                                            asstd@editn.in </a>
                                    </li>
                                </ul>
                                <div class="footer-social">
                                    <p><span class="text-muted">Get Connected</span></p>
                                    <a href="{{ env('APP_URL') }}" target="_blank" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="" title="linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="" title="instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="" title="youtube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    <a href="" title="GMB" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
                                </div>
                                <div class="uu-varification">
                                    <a href="/admit/admit.php" target="_blank">
                                        Admission Open<br>
                                        <span>Click Here</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row copyrights text-center position-relative">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="ft-logo">
                        <img src="home/images/icon_bg.png" alt="IDEE Logo">
                    </div>
                    <a href="">Privacy Policy</a>
                    <a href="">Disclaimer</a>
                    <p>&copy; IDEE_TN</p>
                </div>
            </div>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="home/js/slider.js"></script>
<script src="home/js/bootstrap.min.js"></script>
<script src="home/js/slick.min.js"></script>
<script src="home/js/jquery.fancybox.min.js"></script>
<script src="home/js/main.js"></script>
<script src="home/js/slider-popup.js"></script>
<script src="home/js/toggle-menu-js.js"></script>
<script src="home/js/custom.js"></script>

</html>