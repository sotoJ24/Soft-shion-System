<div id="deleteSupplierModal{{$supplier->id}}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="{{route('delete_supplier_route',$supplier->id)}}" method="POST">
                @csrf
                @method('DELETE')
				<div class="modal-header">
					<h4 class="modal-title">Delete Supplier</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
