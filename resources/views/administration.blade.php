<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('TriskeleIcon.png')}}">
	<title>Softshion  Administration section</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

	<!-- Animate.css -->
	{{-- <link rel="stylesheet" href="css/animate.css"> --}}

	<link href="{{asset('resourcesClothingStore/css/animate.css')}}" rel="stylesheet" />

	<!-- Icomoon Icon Fonts-->
	{{-- <link rel="stylesheet" href="css/icomoon.css"> --}}
	<link href="{{asset('resourcesClothingStore/css/icomoon.css')}}" rel="stylesheet" />

	{{-- <!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css"> --}}

	<link href="{{asset('resourcesClothingStore/css/themify-icons.css')}}" rel="stylesheet" />

	<!-- Bootstrap  -->
	{{-- <link rel="stylesheet" href="css/bootstrap.css"> --}}

	<link href="{{asset('resourcesClothingStore/css/bootstrap.css')}}" rel="stylesheet" />


	<!-- Magnific Popup -->
	{{-- <link rel="stylesheet" href="css/magnific-popup.css"> --}}

	<link href="{{asset('resourcesClothingStore/css/magnific-popup.css')}}" rel="stylesheet" />

	<!-- Bootstrap DateTimePicker -->
	{{-- <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css"> --}}
	<link href="{{asset('resourcesClothingStore/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />



	<!-- Owl Carousel  -->
	{{-- <link rel="stylesheet" href="css/owl.carousel.min.css"> --}}
	<link href="{{asset('resourcesClothingStore/css/owl.carousel.min.css')}}" rel="stylesheet" />

	{{-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> --}}
	<link href="{{asset('resourcesClothingStore/css/owl.theme.default.min.css')}}" rel="stylesheet" />

	<!-- Theme style  -->
	{{-- <link rel="stylesheet" href="css/style.css"> --}}

	<link href="{{asset('resourcesClothingStore/css/style.css')}}" rel="stylesheet" />


	<!-- Modernizr JS -->
	{{-- <script src="js/modernizr-2.6.2.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/modernizr-2.6.2.min.js')}}"></script>

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
                    <a href="#gtco-features">Sections</a>
                    @can('user_manage_route')
                        <a href="{{route('user_manage_route')}}">Manage Users</a>
                    @endcan
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
                        <form action="{{route('logout_authentication_route')}}"  method="POST">
                            @csrf
                            <button style="background-color: red"><a>Logout</a></button>
                        </form>
						{{-- <li><a href="menu.html">aaa</a></li>
						<li class="has-dropdown active"> --}}

							{{-- <a href="services.html">Services</a> --}}
							{{-- <ul class="dropdown">
								<li><a href="#">Food Catering</a></li>
								<li><a href="#">Wedding Celebration</a></li>
								<li><a href="#">Birthday's Celebration</a></li>
							</ul> --}}
						{{-- </li> --}}
						{{-- <li><a href="contact.html">Contact</a></li> --}}

                        {{-- <form action="{{route('logout_authentication_route')}}"  method="POST">
                            @csrf
                                <button><a><span>Logout</span></a></li></button>

                        </form> --}}
                    {{-- </ul> --}}
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">

					<div class="row row-mt-15em">

                    <h1 class="cursive-font">Welcome to administration section</h1>
						{{-- <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
						</div> --}}
					</div>

				</div>
			</div>
		</div>

	</header>



	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2 class="cursive-font">Sections</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <a href="{{route('article_route')}}">
                            <span class="icon">
                                <i class="ti-package" ></i>
                            </span>
                        </a>
						<h3>Articles</h3>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <a href="{{route('employee_route')}}">
                            <span class="icon">
                                <i class="ti-user"></i>
                            </span>
                        </a>
						<h3>Employees</h3>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <a href="{{route('customer_route')}}">
                            <span class="icon">
                                <i class="ti-shopping-cart"></i>
                            </span>
                        </a>
						<h3>Customers</h3>
					</div>
				</div>
				{{-- <div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<h3>Happy People</h3>
					</div>
				</div> --}}

				{{-- <div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-truck"></i>
						</span>
						<h3>Food Delivery</h3>
					</div>
				</div> --}}

			</div>
            <div class="row centerDiv">
                <div class="col-md-4 col-sm-6 ">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                      <a href="{{route('category_route')}}">
                        <span class="icon">
                            <i class="ti-layout-grid2-alt"></i>
                        </span>
                     </a>
                        <h3>Categories</h3>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 ">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                      <a href="{{route('supplier_route')}}">
                        <span class="icon">
                            <i class="ti-truck"></i>
                        </span>
                      </a>
                        <h3>Suppliers</h3>
                    </div>
                </div>
            </div>
		</div>
	</div>


	{{-- <div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>&ldquo; Their high quality of service makes me back over and over again!&rdquo;</h1>
					<p>&mdash; John Doe, CEO of XYZ Co.</p>
				</div>
			</div>
		</div>
	</div> --}}

	{{-- <div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font">Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> --}}

    <footer id="gtco-footer" role="contentinfo" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +506 8550 4479</a></li>
							<li><a href="#"><i class="icon-mail2"></i> softshion@gmail.com</a></li>
							<li><a href="#"><i class="icon-chat"></i>Contact Us</a></li>
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-12 text-center copyright">
					<p><small class="block">&copy; 2023 SoftShion System. All Rights Reserved by Equipo U catolica.</small>
						<small class="block">Designed by <a target="_blank">Equipo Ucatolica</a>
				</div>

			</div>

            <center><img src="{{asset('TriskeleIcon.png')}}" width="70px" height="70px"></center>
		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	{{-- <script src="js/jquery.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.min.js')}}"></script>

	<!-- jQuery Easing -->
	{{-- <script src="js/jquery.easing.1.3.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.easing.1.3.js')}}"></script>

	<!-- Bootstrap -->
	{{-- <script src="js/bootstrap.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/bootstrap.min.js')}}"></script>

	<!-- Waypoints -->
	{{-- <script src="js/jquery.waypoints.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.waypoints.min.js')}}"></script>

	<!-- Carousel -->
	{{-- <script src="js/owl.carousel.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/owl.carousel.min.js')}}"></script>

	<!-- countTo -->
	{{-- <script src="js/jquery.countTo.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.countTo.js')}}"></script>

	<!-- Stellar Parallax -->
	{{-- <script src="js/jquery.stellar.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.stellar.min.js')}}"></script>

	<!-- Magnific Popup -->
	{{-- <script src="js/jquery.magnific-popup.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/jquery.magnific-popup.min.js')}}"></script>

	{{-- <script src="js/magnific-popup-options.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/magnific-popup-options.js')}}"></script>

	{{-- <script src="js/moment.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/moment.min.js')}}"></script>


	{{-- <script src="js/bootstrap-datetimepicker.min.js"></script> --}}
	<script src="{{asset('resourcesClothingStore/js/bootstrap-datetimepicker.min.js')}}"></script>


	<!-- Main -->
	{{-- <script src="js/main.js"></script> --}}

	<script src="{{asset('resourcesClothingStore/js/main.js')}}"></script>


	</body>
</html>

