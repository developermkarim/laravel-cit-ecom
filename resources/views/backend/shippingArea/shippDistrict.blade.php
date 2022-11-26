@extends('layouts.backendapp')

@section('content')

<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
  District Management
</h1>
<div class="row">

   <div class="col-lg-8">


      <table class="table table-responsive">
         <thead>
           <tr>
             <th scope="col">S/L</th>
             <th scope="col">Division</th>
             <th scope="col">Name</th>

             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
          @forelse ($districts as $key => $item)


           <tr>
            <td>{{++$key}}</td>

            <td>{{ $item->division->division_name }}</td>

             <td>{{$item->district_name}}</td> 
              {{-- <td>{{$item->coupon_discount}}</td> --}}
 
             <td><a  class="btn btn-primary" class="btn" href="{{url('shipping/district/edit',$item->id)}}"><i class="fas fa-edit"></i></a>

               &nbsp;

               <a href="{{url('shipping/district/delete', $item->id)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>

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

        @if (!isset($editeddistrict))



         <form action="{{route('ship.district.store')}}" method="POST" class="card-body">
          @csrf

            <h4>Add New District</h4>

       <select name="division_id" id="division_id" class="form-select" aria-label="Default select example">
        <option selected>Select one Division</option>
        @foreach ($divisions as $division)
            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
        @endforeach
       </select>

            <input type="text" name="district_name"  id="district_name" placeholder="District Name" class="form-control">
            @error('district_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror

           <button type="submit" class="w-full btn btn-primary">Upload Coupon</button>
         </form>


         @else

         <form action="{{route('ship.district.update',$editeddistrict->id)}}"  method="POST" class="card-body">
            @csrf

        @method('PUT')

              <h4>Update Divison</h4>

              {{-- Hidden Input --}}
              <input type="hidden" id="" name="update_id" value="{{ $editeddistrict->id }}">

              <select name="division_id" id="division_id" class="form-select" aria-label="Default select example">
                <option selected>Select one Division</option>
                @foreach ($divisions as $division)
                    <option {{ $division->id == $editeddistrict->division_id ? 'selected':'' }} value="{{ $division->id }}">{{ $division->division_name }}</option>
                @endforeach
               </select>

            <input type="text" name="district_name"  value="{{ $editeddistrict->district_name }}" id="district_name" placeholder="Divison Name" class="form-control">
            @error('district_name')
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
