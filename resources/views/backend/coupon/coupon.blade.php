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
             <th scope="col">Value</th>
             <th scope="col">Validity</th>
             <th scope="col">Status</th>

             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
          @forelse ($coupons as $key => $item)


           <tr>
            <td>{{++$key}}</td>
             <td>{{$item->coupon_name}}</td>
              <td>{{$item->coupon_discount}}</td>
              <td>{{$item->coupon_validity}}</td>
         
              <td>

                @if ($item->status == 1)
                <a class="btn btn-outline-primary" href="{{ url('coupon/status') }}/0/{{ $item->id }}">active</a>
                @elseif($item->status == 0)
                <a class="btn btn-outline-danger" href="{{ url('coupon/status') }}/1/{{ $item->id }}">deactivate</a>
              @endif

               {{--  @if($item->status == 0)
                <i class="fas fa-ban"></i>
                @elseif($item->status == 1)
                <i class="fas fa-check-square"></i>
                @endif --}}
              </td>

             <td><a  class="btn btn-primary" class="btn" href="{{route('coupon.edit',$item->id)}}"> <i class="fas fa-edit"></i></a>
               &nbsp;

               <a href="{{url('coupon/delete', $item->id)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
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

        @if (!isset($editedCoupon))



         <form action="{{route('coupon.store')}}" enctype="multipart/form-data"  method="POST" class="card-body">
          @csrf



            <h4>Add New Coupon</h4>
          <input type="text" name="coupon_name" id="coupon_name" placeholder="Coupon Name" class="form-control">
          @error('coupon_name')
              <span class="text-theme-6">{{$message}}</span>
          @enderror
          <input type="text" name="coupon_discount" id="coupon_discount" placeholder="Coupon Discount" class="form-control my-3">
          @error('coupon_discount')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
          <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  name="coupon_validity" id="coupon_validity" class="form-control my-3">
          @error('coupon_validity')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
           <button type="submit" class="w-full btn btn-primary">Upload Coupon</button>
         </form>

         @else


         <form action="{{route('coupon.update',$editedCoupon->id)}}"  method="POST" class="card-body">
            @csrf

        @method('PUT')

              <h4>Update Coupon</h4>

              {{-- Hidden Input --}}
              <input type="hidden" id="" name="update_id" value="{{ $editedCoupon->id }}">

            <input type="text" name="coupon_name"  value="{{ $editedCoupon->coupon_name }}" id="coupon_name" placeholder="Coupon Name" class="form-control">
            @error('coupon_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror
            <input type="text" name="coupon_discount" value="{{ $editedCoupon->coupon_discount }}" id="coupon_discount" placeholder="Coupon Discount" class="form-control my-3">
            @error('coupon_discount')
            <span class="text-theme-6">{{$message}}</span>
            @enderror
            <input type="date" value="{{ $editedCoupon->coupon_validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  name="coupon_validity" id="coupon_validity" class="form-control my-3">
            @error('coupon_validity')
            <span class="text-theme-6">{{$message}}</span>
            @enderror
             <button type="submit" class="w-full btn btn-primary">Update Coupon</button>
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
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
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
