@extends('layouts.backendapp')

@section('content')
    



<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Product  <span class="badge rounded-pill bg-danger"> {{ count($products) }} </span> </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('product.add') }}" class="btn btn-primary">Add Product</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			 
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>Image </th>
				<th>Product Name </th>
				<th>Price </th>
				<th>QTY </th>
				<th>Discount </th>
				<th>Status </th> 
				<th class="text-center">Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($products as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>				
				<td> <img src="{{ $item->thumbnail_uri }} {{-- {{ asset($item->product_thambnail) }} --}}" style="width: 70px; height:40px;" >  </td>
				<td>{{ $item->title }}</td>
				<td>{{ $item->price }}</td>
				<td>{{ $item->qty }}</td>

				<td>
					
                    @if ($item->discount_price == null)
                    <span class="badge rounded-pill bg-primary text-dark">No Discount</span>
                    @else
                        @php
                            // $totalDiscount = 0;
                            $discountPrice = $item->price - $item->discount_price;
                            $percentageResult = ($discountPrice/$item->price) * 100;
                        @endphp
                  
			
			
		<span style="background-color: red" class="badge rounded-pill bg-danger text-dark">{{ round( $percentageResult) }} %</span>
        @endif
					 </td>

 

				
                    <td class="w-40">
                        @if($item->status == 1)
                        <a href="{{ url('product/status') }}/0/{{ $item->id }}" class="btn btn-primary" title="Active"> <i class="fas fa-toggle-on"></i> </a>
                        @elseif($item->status == 0)
                        <a href="{{ url('product/status') }}/1/{{ $item->id }}" class="btn btn-danger" title="Inactive"> <i class="fas fa-toggle-off"></i> </a>
                        @endif
                </td>
				

                    <td class="table-report__action w-56 text-center">

                        
	{{-- @if(Auth::user()->can('product.edit'))				 --}}
    <a href="{{ route('product.edit',$item->slug) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
{{--     @endif
    @if(Auth::user()->can('product.delete')) --}}	
    <a href="{{ route('product.delete',$item->slug) }}" class="btn btn-danger" id="deleteBtn" title="Delete Data" ><i class="fas fa-trash"></i></a>
    {{-- @endif --}}
    <a href="{{-- {{ route('edit.category',$item->id) }} --}}"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning" title="Details Page"> <i class="fa fa-eye"></i> </a>
    
    

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
    

                     {{--    <div class="d-flex justify-content-center align-items-center">
                            <a class="d-flex align-items-center me-3" href="side-menu-light-crud-data-list.html">  Edit </a>
                            <a id="deleteBtn" class="d-flex align-items-center text-theme-6" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal">  Delete </a>
                        </div> --}}
                    </td>
{{-- 
	@if(Auth::user()->can('product.edit'))				
<a href="{{ route('edit.product',$item->id) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
@endif
@if(Auth::user()->can('product.delete'))	
<a href="{{ route('delete.product',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data" ><i class="fa fa-trash"></i></a>
@endif
<a href="{{ route('edit.category',$item->id) }}" class="btn btn-warning" title="Details Page"> <i class="fa fa-eye"></i> </a>

@if($item->status == 1)
<a href="{{ route('product.inactive',$item->id) }}" class="btn btn-primary" title="Inactive"> <i class="fa-solid fa-thumbs-down"></i> </a>
@else
<a href="{{ route('product.active',$item->id) }}" class="btn btn-primary" title="Active"> <i class="fa-solid fa-thumbs-up"></i> </a>
@endif --}}

				
			</tr>
			@endforeach
			 
		 
		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Image </th>
				<th>Product Name </th>
				<th>Price </th>
				<th>QTY </th>
				<th>Discount </th>
				<th>Status </th> 
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>
 

				 
			</div>


@push('customJs')
<script>
         $(document).ready(function() {
			$('#example').DataTable();
} );

</script>

<script>
$(function(){
$(document).on('click','#deleteBtn',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete This Data?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#1C3FAA',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Deleted!',
                      'Your file has been Deleted.',
                      'success'
                    )
                  }
                }) 
                
  });
})
    </script>
@endpush

@endsection