@extends('layouts.backendapp')

@section('content')

<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
  Coupon Management
</h1>
<div class="row">

   <div class="col-lg-8">


      <table class="table table-responsive">
         <thead>
           <tr>
             <th scope="col">S/L</th>
             <th scope="col">Name</th>

             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
          @forelse ($divisions as $key => $item)


           <tr>
            <td>{{++$key}}</td>
             <td>{{$item->division_name}}</td>
              {{-- <td>{{$item->coupon_discount}}</td> --}}
 
             <td><a  class="btn btn-primary" class="btn" href="{{url('shipping/edit',$item->id)}}"><i class="fas fa-edit"></i></a>

               &nbsp;

               <a href="{{url('shipping/delete', $item->id)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>

               {{-- <form action="{{route('coupon.delete', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                </form> --}}

            
            
               
              </td>



           </tr>
           @empty
              <tr>
                <td>
                  No Data Found
                </td>
              </tr>
           @endforelse
         </tbody>
       </table>



   </div>

   <div class="col-lg-4">
      <div class="">

        @if (!isset($editeddivision))



         <form action="{{route('ship.division.store')}}" method="POST" class="card-body">
          @csrf



            <h4>Add New Division</h4>
            <input type="text" name="division_name"  id="division_name" placeholder="Divison Name" class="form-control">
            @error('division_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror

           <button type="submit" class="w-full btn btn-primary">Upload Coupon</button>
         </form>

         @else


         <form action="{{route('ship.division.update',$editeddivision->id)}}"  method="POST" class="card-body">
            @csrf

        @method('PUT')

              <h4>Update Divison</h4>

              {{-- Hidden Input --}}
              <input type="hidden" id="" name="update_id" value="{{ $editeddivision->id }}">

            <input type="text" name="division_name"  value="{{ $editeddivision->division_name }}" id="division_name" placeholder="Divison Name" class="form-control">
            @error('division_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror
          
             <button type="submit" class="w-full btn btn-primary">Update Divison</button>
           </form>


         @endif
       </div>
   </div>

</div>



@push('customJs')

    <script>
      let title = $('input[name="title"]');
      let slug = $('input[name="slug"]');
      title.keyup(function(){

        let titleValue = $(this).val().toLowerCase().split(' ').join('-');
        slug.val(titleValue);

      });


      /* Delete Button With Sweet Alert */

$(function(){


  $(document).on('click','#deleteBtn', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",/* F */
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#1C3FAA',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

    window.location.href = link;
    swal.fire( 'Deleted!',
                        'Your file has been deleted.',
                        'success')

  }
})
 })
})
    </script>
@endpush



@endsection
