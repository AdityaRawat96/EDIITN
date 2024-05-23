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
    <link rel="icon" type="image/ico" href="../home/images/icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->


    <link rel="stylesheet" href="../home/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../home/css/slick.css">
    <link rel="stylesheet" href="../home/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../home/css/global.css">
    <link rel="stylesheet" href="../home/css/header-footer.css">
    <link rel="stylesheet" href="../home/css/landing-page.css">
    <link rel="stylesheet" href="../home/css/program.css">
    <link rel="stylesheet" href="../home/css/admission.css">
    <link rel="stylesheet" href="../home/css/dark-mode-new.css">
    <link rel="stylesheet" href="../home/css/custom.css">
    <link rel="stylesheet" href="../home/css/form-widget.css">

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
                                <a href="./management/form/admissions/" style="color:white;"><strong>Apply Now | Online
                                        Registration Open <br> </strong></a>
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
                                        <a href="">Admin Login</a>
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
                    <a href="{{ env('APP_URL') }}" class="uu-pc-logo"><img src="../home/images/logo_2.png" alt="TNEDII" title="TNEDII" width="460px"></a>
                    <a href="{{ env('APP_URL') }}" class="d-none uu-pc-logo uu-pc-dark-logo"><img src="../home/images/logo_2.png" title="TNEDII" width="250"></a>
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
                        <img src="../home/images/uu-excellance-logo.png" alt="Excellance">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="admission-banner position-relative" style="background: url('../../home/images/admission-banner.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;padding-top: 76px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 position-relative order-2 order-lg-0">
                    <div class="admission-banner__content text-white pt-5">
                        <h3 class="text-white text-lg">Break the wall between you <br>and a successful <br>career!</h3>
                        <p class="text-white p-1 text-md mt-2">EDII-TN has been pioneering entrepreneurship and
                            innovation
                            promotion
                            programs funded by the Government of Tamil Nadu, such as the Innovation Voucher program (Rs.
                            20
                            crores).</p>
                        <h5 class="p-1 text-white">Any Query, Ask Us through EDII Admission Help Desk </h5>
                        <p class="text-white" style="padding-top: 5%;"></p>
                    </div>
                    <div class="admission-banner__notification pe-5">
                        <div class="row">
                            <div class="col-sm-4 position-relative">
                            </div>
                            <div class="col-sm-8">
                                <div class="admission-banner__notification--slider">
                                    <div class="adn-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="text-white text-md">Our Admission Department is Open on
                                                    Sundays.</h5>
                                                <ul class="list-unstyled">
                                                    <!-- <li>Click here to Apply Online</li> -->
                                                    <!-- <li>Call Us - <a href="tel:18002124201">18002124201</a></li> -->
                                                </ul>
                                                <a href="tel:18002124201" class="stretched-link">Call Us-
                                                    044-22252081/82 <i class="fa fa-external-link" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-1">
                    <div class="pb-5 admissionForm">
                        <div class="applyForm ms-auto mt-0">
                            <div class="applyForm__header p-3">
                                <h5>TNEDII [PG] Diploma Entrepreneurship Development & Innovation</h5>
                                <h6>APPLICATION FORM 2024-25</h6>
                            </div>
                            <div id="error-message2" style="display: none; color: green; font-size:12px; margin-left: 35px;"></div>
                            <div class="applyForm__fields p-2">
                                <div class="form login">
                                    <div class="form-content">
                                        <form id="applicationForm">
                                            <div class="field input-field">
                                                <input id="userName" type="text" name="name" placeholder="Enter Name *" class="input" required>
                                                <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
                                            </div>
                                            <div class="field input-field">
                                                <input type="email" name="email" id="emailid" placeholder="Enter Email *" class="input" required>
                                                <i class="fas fa-envelope"></i> <!-- Font Awesome envelope icon -->
                                            </div>
                                            <div class="field input-field">
                                                <input type="tel" id="mobileNumber" name="mobile" placeholder="+91 Mobile Number *" class="input">
                                                <div id="verifyButtonRegister" class="verify-button" onclick="sendOTP()">
                                                    Verify</div>
                                                <span id="greenTick" class="greenTick" style="color: green; display: none;">&#10004;</span>
                                                <i class="fas fa-phone"></i> <!-- Font Awesome phone icon -->
                                            </div>
                                            <div id="error-message" style="display: none; color: red; font-size:10px; margin-left: 30px;">
                                            </div>
                                            <div id="otpFields" class="otp" style="display: none;">
                                                <input type="text" id="otp1" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp2').focus()">
                                                <input type="text" id="otp2" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp3').focus()">
                                                <input type="text" id="otp3" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp4').focus()">
                                                <input type="text" id="otp4" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) checkOTP()">
                                            </div>
                                            <div class="field input-field samet state-dropdown">
                                                <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-control" required></select>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <!-- Font Awesome map marker icon -->
                                            </div>
                                            <div class="field input-field samet">
                                                <select id="state" name="city" class="form-control" required></select>
                                                <i class="fas fa-city"></i> <!-- Font Awesome city icon -->
                                            </div>
                                            <div class="field input-field">
                                                <input id="program_field" type="text" placeholder="Select Program *" name="program" readonly value="PG Dip., Enterprenuership Dev & Innovation" class="input">
                                                <i class="fas fa-graduation-cap"></i>
                                                <!-- Font Awesome graduation cap icon -->
                                            </div>
                                            <div class="field">
                                                <button type="submit" id="kt_sign_up_submit" class="btn btn-nf">
                                                    <!--begin::Indicator label-->
                                                    <span class="indicator-label">Register</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </button>
                                            </div>
                                        </form>
                                        <div class="form-link">
                                            <span>Existing User? <a href="#" class="link signup-link">Login</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Signup Form -->
                                <div class="form signup">
                                    <div class="form-content">
                                        <form id="Loginform">
                                            <div class="field input-field">
                                                <input type="tel" name="mobile" id="mobileNumberlog" placeholder="+91 Mobile Number *" class="input">
                                                <div id="verifyButtonLogin" class="verify-button" onclick="authOTP()">
                                                    Verify
                                                </div>
                                                <span id="greenTick" class="greenTick" style="color: green; display: none;">&#10004;</span>
                                                <i class="fas fa-phone"></i> <!-- Font Awesome phone icon -->
                                            </div>
                                            <div id="error-message3" style="display: none; color: red; font-size:10px; margin-left: 30px;">
                                            </div>
                                            <div id="otpFields1" class="otp" style="display: none;">
                                                <input type="number" id="otp11" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp12').focus()">
                                                <input type="number" id="otp12" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp13').focus()">
                                                <input type="number" id="otp13" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) document.getElementById('otp14').focus()">
                                                <input type="number" id="otp14" maxlength="1" class="otp-input" onkeyup="if (this.value.length === this.maxLength) verifyOTP()">
                                            </div>
                                            <div class="field button-field">
                                                <button type="submit" id="kt_sign_in_submit" class="btn btn-nf">
                                                    <!--begin::Indicator label-->
                                                    <span class="indicator-label">Login</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </button>
                                            </div>
                                        </form>
                                        <div class="form-link">
                                            <span>New User <a href="#" class="link login-link">Register</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <img src="../home/images/icon_bg.png" alt="IDEE Logo">
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
<script src="../home/js/slider.js"></script>
<script src="../home/js/bootstrap.min.js"></script>
<script src="../home/js/slick.min.js"></script>
<script src="../home/js/jquery.fancybox.min.js"></script>
<script src="../home/js/main.js"></script>
<script src="../home/js/toggle-menu-js.js"></script>
<script src="../home/js/custom.js"></script>
<script src="../home/js/cities.js"></script>
<script src="../home/js/admission.js"></script>

</html>