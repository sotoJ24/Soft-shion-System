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
        <title>Softshion</title>
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

        <link rel="icon" href="{{asset('TriskeleIcon.png')}}">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

        <link href="{{asset('resourcesClothingStore/css/animate.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/icomoon.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/themify-icons.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/bootstrap.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/magnific-popup.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/owl.carousel.min.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/owl.theme.default.min.css')}}" rel="stylesheet" />

        <link href="{{asset('resourcesClothingStore/css/style.css')}}" rel="stylesheet" />

        <script src="{{asset('resourcesClothingStore/js/modernizr-2.6.2.min.js')}}"></script>
	</head>
	<body>


	<div class="gtco-loader"></div>

	<div id="page">

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url({{ asset('resourcesClothingStore/images/729757.png') }})" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container" style="margin-top: -150px; margin-right: 145px">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp" >
                            <div class="col-md-8 col-md-push-6 animate-box" data-animate-effect="fadeInRight">
                                {{-- <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span> --}}
                                {{-- <center><h1 class="cursive-font">All in good syle!</h1></center> --}}
                                <img src="{{asset('resourcesClothingStore/images/SOFT-SHION.png')}}" alt="">
                                <br>
                                <br>

                                <div class="form-wrap">
                                    <div class="tab">
                                        <div class="gtco-container">
                                            <div class="row" style="margin-right: 120px">
                                                <div class="col-sm-4 col-xs-12 text-center">
                                                    <div class="col-xs-8 menu-1">
                                                        <ul>
                                                            <form action="{{route('login_route')}}"  method="GET" >
                                                                @csrf
                                                                <button type="submit" class="btn btn-dark" style="margin-left: -40px; background-color: black"><a style="color: #3eb1be">Login</a></button>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-xs-12 text-center">
                                                    <div class="col-xs-8 menu-1">
                                                        <ul>
                                                            <button type="submit" class="btn" style="margin-left: 30px; background-color: black"  ><a style="color: #3eb1be" href="#dilemma">Our dilemma</a></button>
                                                        </ul>
                                                    </div>
                                                </div>


                                                <div class="col-sm-4 col-xs-12 text-center">
                                                    <div class="col-xs-8 menu-1">
                                                        <ul>
                                                            <button type="submit" class="btn btn-dark" style="margin-left: 140px; background-color: black"><a style="color: #3eb1be" href="#gtco-footer">Footer</a></button>
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
			</div>
		</div>
	</header>



    @include('catalogue')


	{{-- <div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2 class="cursive-font">Our Services</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<h3>Happy People</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-thought"></i>
						</span>
						<h3>Creative Culinary</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-truck"></i>
						</span>
						<h3>Food Delivery</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>


			</div>
		</div>
	</div> --}}


	<div class="gtco-cover gtco-cover-sm" id="dilemma" style="background-color: black"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>&ldquo; "Descubre tu estilo único con nuestro sistema de venta de ropa: donde la moda se encuentra con la comodidad, ¡tú brillas!"&rdquo;</h1>
					<p>&mdash; SoftShion.</p>
				</div>
			</div>
		</div>
	</div>

	{{-- <div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2 class="cursive-font primary-color">Fun Facts</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">

				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="5" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Avg. Rating</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="43" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Food Types</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="32" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Chef Cook</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="1985" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Year Started</span>

					</div>
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

