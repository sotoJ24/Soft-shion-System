<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('TriskeleIcon.png')}}"> 
    <title>Soft-Shion | ADMI Productos</title>
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
						<h2>Gestión  de<b> Productos</b></h2>
					</div>

                        <form action="{{route('article_filter_route')}}" method="POST" >
                            @csrf 
                            <div class="form-search" style="margin-left: -115px">
                                <input type="search" id="form1" class="form-control" name="search"/>
                                <label class="form-label" for="form1">Buscar</label>
                                <button style="margin-top: -33px; margin-right: -55px" type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>

						<a href="#addEmployeeModal" class="btn btn-success" style="height: 33px; margin-left: 114px;" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ingresar Producto</span></a>
                        <form action="{{route('admin_route')}}" method="GET">
                            @csrf
                            <button  class="btn btn-primary" data-toggle="modal" ><i class="material-icons">↺</i>Volver </button>
                        </form>

				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Código Producto</th>
						<th>Nombre Producto</th>
						<th>Precio Producto</th>
                        <th>Cantidad</th>
						<th>Talla</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Proveedor</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ( $articles  as $article )
					<tr>
						<td>{{$article->id}}</td>
						<td>{{$article->product_code}}</td>
						<td>{{$article->product_name}}</td>
						<td>{{$article->product_price}} $</td>
                        <td>{{$article->quantity}}</td>
						<td>{{$article->size}}</td>
                        <td>{{$article->description}}</td>
                        <td><img src="/storage/images/{{$article->image}}" width="80" height="80" class="img img-responsive"> </td>
                        <td>{{$article->supplier->company_name}}</td>
                        <td>
                            <a href="{{route('edit_article_route',$article->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal{{$article->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>

					</tr>
                        @include('modalDeleteArticle')
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
            <form action="{{route('store_articles_route')}}"  method="POST" enctype="multipart/form-data">
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
					<h4 class="modal-title">Ingresar Producto </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Código producto </label>
						<input type="text" class="form-control" name="product_code" required>
					</div>
					<div class="form-group">
						<label>Nombre del producto</label>
						<input type="text" class="form-control" name="product_name" required>
					</div>
                    <div class="form-group">
                        <label for="categories">Categorías</label>
                        <select name="categories[]" id="categories" class="form-control" multiple data-style="btn-primary" required>
                            @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
					</div>
					<div class="form-group">
						<label>Precio</label>
                        <input type="number" min="0" step="0.01" class="form-control" name="product_price" required>
					</div>
                    <div class="form-group">
						<label>Cantidad</label>
                        <input type="number" min="0"  class="form-control" name="quantity" required>
					</div>
					<div class="form-group">
						<label>Talla</label>
						<input type="text" class="form-control" name="size" required>
					</div>
                    <div class="form-group">
						<label>Descripción</label>
                        <input type="text" class="form-control" name="description" required>
					</div>
                    <div class="form-group">
						<label>Imagen</label>
                        <input type="file" class="form-control-file" name="image" accept="image/*" required>
					</div>
                    <div class="form-group">
						<label>Seleccionar Proveedor</label>
                        <select name="suppliers" id="suppliers" class="form-control" multiple data-style="btn-primary" required>
                            @foreach ($suppliers as $supplier)
                                <option >{{$supplier->company_name}}</option>
                            @endforeach
                        </select>
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
