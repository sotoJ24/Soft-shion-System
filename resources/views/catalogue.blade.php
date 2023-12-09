<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
    <div class="gtco-section">

        <div class="gtco-container">
            @if ($articles->isEmpty())
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                        <h2 class="cursive-font primary-color">Our clothes</h2>
                        <img src="{{asset('resourcesClothingStore/images/fix-503-image.jpg')}}">
                    </div>
                </div>
            @else
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2 class="cursive-font primary-color">Our clothes</h2>
                    <p>Nuestros diseños disponibles</p>
                </div>
            </div>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="fh5co-card-item">
                                <a href="/storage/images/{{ $article->image }}" class="image-popup">
                                    <figure>
                                        <div class="overlay"><i class="ti-plus"></i></div>
                                        <center><img src="/storage/images/{{ $article->image }}" alt="Image" class="img img-responsive"></center>
                                    </figure>
                                </a>
                                <div class="fh5co-text" style="background-color: rgb(0, 0, 0)">
                                    <br>
                                    <h1 class="cursive-font" style="color: rgb(255, 255, 255)">{{ $article->article_name }}</h1>
                                    <p>Size: {{ $article->size }}</p>
                                    <p>Quantity Avaible: {{ $article->quantity }}</p>
                                    <form action="{{ route('store_cart_route') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <input type="hidden" name="product_id" value="{{$article->id}}">
                                        <input type="hidden" name="addOrSubtract"  value=1 checked>
                                        <p>Type the desired quantity</p>
                                        <input type="number" name="quantity" min="1" value=1>
                                        <br>
                                        <br>
                                        <button class="btn custom-btn" data-toggle="modal" data-target="#cartModal"><i class="material-icons">🛒</i>Cart</button>
                                    </form>
                                    <p><span class="price cursive-font">{{ $article->article_price }} $</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
          </div>
    </div>
    @endif
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
