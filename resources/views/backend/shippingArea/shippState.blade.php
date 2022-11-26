@extends('layouts.backendapp')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
             <th scope="col">District</th>
             <th scope="col">State</th>

             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
          @forelse ($states as $key => $item)


           <tr>
            <td>{{++$key}}</td>

            <td>{{ $item->division->division_name }}</td>

             <td>{{$item->district ? $item->district->district_name :'No district'}}</td>
             <td>{{$item->state_name}}</td>
              {{-- <td>{{$item->coupon_discount}}</td> --}}

             <td><a  class="btn btn-primary" class="btn" href="{{url('shipping/state/edit',$item->id)}}"><i class="fas fa-edit"></i></a>

               &nbsp;

               <a href="{{url('shipping/state/delete', $item->id)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>

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

        @if (!isset($editedstate))



         <form action="{{route('ship.state.store')}}" method="POST" class="card-body">
          @csrf

            <h4>Add New State</h4>

       <select name="division_id" id="division_id" class="form-select" aria-label="Default select example">
        <option selected>Select one Division</option>
        @foreach ($divisions as $division)
            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
        @endforeach
       </select>

       <select name="district_id" id="district_id" class="form-select" aria-label="Default select example">
        <option selected>Select one District</option>
      {{--   @foreach ($divisions as $division)
            <option {{ $division->id == $editedstate->division_id? 'selected':'' }} value="{{ $division->id }}">{{ $division->division_name }}</option>
        @endforeach --}}
       </select>

            <input type="text" name="state_name"  id="state_name" placeholder= "wriite State name"  class="form-control">
            @error('district_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror

           <button type="submit" class="w-full btn btn-primary">Upload State</button>
         </form>

         @else


         <form action="{{route('ship.district.update',$editedstate->id)}}"  method="POST" class="card-body">
            @csrf

        @method('PUT')

              <h4>Update State</h4>

              {{-- Hidden Input --}}
              <input type="hidden" id="" name="update_id" value="{{ $editedstate->id }}">

              <select name="division_id" id="division_id" class="form-select" aria-label="Default select example">
                <option selected>Select one Division</option>
                @foreach ($divisions as $division)
                    <option {{ $division->id == $editedstate->division_id? 'selected':'' }} value="{{ $division->id }}">{{ $division->division_name }}</option>
                @endforeach
               </select>

              <select name="district_id" id="district_id" class="form-select" aria-label="Default select example">
                <option selected>Select one District</option>
                @foreach ($districts as $district)
                    <option {{ $district->id == $editedstate->district_id? 'selected':'' }} value="{{ $division->id }}">{{ $district->district_name }}</option>
                @endforeach
               </select>

            <input type="text" name="state_name"  value="{{ $editedstate->state_name }}" id="state_name" placeholder="Divison Name" class="form-control">
            @error('district_name')
                <span class="text-theme-6">{{$message}}</span>
            @enderror

             <button type="submit" class="w-full btn btn-primary">Update State</button>
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

    <script>
        $(function(){
            $(document).on('change','#division_id',function(){
                var division_id = $(this).val();

                $.ajax({
                    url:"{{ route('ship.get.district') }}",
                    type:'get',
                    data:{division_id:division_id},
                    success:(response)=>{
                        var option = "<option value=''> Select District</option>";

                        $.each(response,function(key,value){

                            option+= `<option value="${value.id}">${value.district_name}</option>`

                        })

                        $('#district_id').html(option)
                    }
                })
            })
        })
    </script>
@endpush



@endsection
