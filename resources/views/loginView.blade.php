<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{asset('TriskeleIcon.png')}}">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{asset('resourcesLoginView/css/styles.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>
<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
        <a href="{{route('index_route')}}"><button>Back</button></a>
			<div class="signup">
				<form>
                    <center>
                        <h2 style="color: white">¡For system users and administrators only!</h2>
                        <img src="{{asset('resourcesLoginView/images/pngwing.com.png')}}" alt="">

                    </center>

				</form>
			</div>

			<div class="login">
                <form action="{{route('login_authentication_route')}}"  method="POST" id="login">
                  @if(Session::has('fail'))
                        <script>
                            swal("!Alert¡","{{ Session::get('fail') }}",'error',{
                                button:true,
                            });
                        </script>
                  @endif
                  @csrf
                    <label for="chk" aria-hidden="true">Login</label>
					<input type="username" name="user_name" placeholder="Username" @required(true)>
					<input type="password" name="password" placeholder="Password" @required(true)>
					<button>Authenticate</button>
				</form>
			</div>
	</div>

</body>
</html>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>
</html>
