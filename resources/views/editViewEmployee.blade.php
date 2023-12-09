<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('TriskeleIcon.png')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="{{asset('resourcesEditUser/css/styles.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Update Employee</title>
</head>
<body>
    <div class="col-md-4 col-md-offset-4" id="login">
        <section id="inner-wrapper" class="login">
            <article>
                <form action="{{route('update_employee_route',$employee->id)}}" method="POST">
                    @if(Session::has('fail'))
                        <script>
                            toastr.options = {
                                "progressBar" : true,
                                "closeButton": true,
                            }
                            toastr.error("{{ Session::get('fail') }}",{timeout:17000});
                        </script>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Employee Name</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                            <input type="text" value="{{$employee->name}}" name="name" class="form-control" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Employee Last Name</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                            <input type="text" value="{{$employee->last_name}}" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Employee Identifier</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"> </i></span>
                            <input type="text" value="{{$employee->identifier}}" name="identifier" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Employee Phone</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"> </i></span>
                            <input type="text" value="{{$employee->phone}}" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Employee Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" value="{{$employee->address}}" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Employee Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mail-reply-all"> </i></span>
                            <input type="email" value="{{$employee->email}}" name="email" class="form-control" required>
                        </div>
                    </div>
                     <a class="btn btn-danger" href="{{route('employee_route')}}">Cancel</a>
                      <button type="submit" class="btn btn-success">Update</button>
                </form>
            </article>

        </section>
    </div>

</body>
</html>
