<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('TriskeleIcon.png')}}">
    <title>Manage Employee</title>  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('resourcesSections/css/styles.css')}}"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>CRUD<b> Employee</b></h2>
					</div>

                        <form action="{{route('employee_filter_route')}}" method="POST" >
                            @csrf
                            <div class="form-search" style="margin-left: -115px">
                                <input type="search" id="form1" class="form-control" name="search"/>
                                <label class="form-label" for="form1">Search</label>
                                <button style="margin-top: -33px; margin-right: -55px" type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form> 

						<a href="#addEmployeeModal" class="btn btn-success" style="height: 33px; margin-left: 114px;" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <form action="{{route('admin_route')}}" method="GET">
                            @csrf
                            <button  class="btn btn-primary" data-toggle="modal" ><i class="material-icons">↺</i>Back </button>
                        </form> 
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Employee Name</th>
						<th>Employee LastName</th>
						<th>Employee Identifier</th>
                        <th>Employee Phone</th>
						<th>Employee Address</th>
                        <th>Employee Email</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($employees  as $employee)
					<tr>
						<td>{{$employee->name}}</td>
						<td>{{$employee->last_name}}</td>
						<td>{{$employee->identifier}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->email}}</td>
                        <td>
                            <a href="{{route('edit_employee_route',$employee->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal{{$employee->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>

					</tr>
                        @include('modalDeleteEmployee')
                    @endforeach
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>1</b> out of <b>1</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li> 
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Store Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="{{route('store_employee_route')}}"  method="POST">
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
                <div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Employee Name</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Employee Last Name</label>
						<input type="text" class="form-control" name="last_name" required>
					</div>
                    <div class="form-group">
						<label>Employee Identifier</label>
                        <input type="text" class="form-control" name="identifier" required>
					</div>
                    <div class="form-group">
						<label>Employee Phone</label>
                        <input type="text" class="form-control" name="phone" required>
					</div>
                    <div class="form-group">
						<label>Employee Address</label>
                        <input type="text" class="form-control" name="address" required>
					</div>
                    <div class="form-group">
						<label>Employee Email</label>
                        <input type="email" class="form-control" name="email" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>


<script>
    $(document).ready(function(){
	$('.multi_select').selectpicker();
})
</script>
    <link rel="stylesheet" href="dist/virtual-select.min.css" />
    <script src="dist/virtual-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{asset('resourcesSections/js/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    @if(Session::has('success'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('success') }}",{timeout:17000});
        </script>
    @endif
</body>
</html>
