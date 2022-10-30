@extends('layouts.backendapp')

@section('content')

<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
  Brand Management
</h1>
<div class="row">

   <div class="col-lg-8">


      <table class="table table-responsive">
         <thead>
           <tr>
             <th scope="col">S/L</th>
             <th scope="col">Name</th>
             <th scope="col">Slug</th>
             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>
          @forelse ($brands as $key => $item)
              
         
           <tr>
            <td>{{++$key}}</td>
             <td>{{$item->title}}</td>
              <td>{{$item->slug}}</td>
             <td><img src="{{$item->image_uri}}" alt="{{$item->image_uri}}" width="100" height="100"></td>

             <td><a  class="btn btn-primary" class="btn" href="{{route('brand.edit',$item->slug)}}">Edit</a>
               &nbsp;

               <button  id="deleteBtn" class="btn btn-danger">Delete</button>
               <form action="{{route('brand.delete', $item->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                </form>
              </td><br>
              
          
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

        @if (!isset($editedBrand))
            
        

         <form action="{{route('brand.store')}}" enctype="multipart/form-data"  method="POST" class="card-body">
          @csrf 
          {{-- @method('GET') --}}
            <h4>Add New Brand</h4>
          <input type="text" name="title" id="title" placeholder="Brand Name" class="form-control">
          @error('title')
              <span class="text-theme-6">{{$message}}</span>
          @enderror
          <input type="text" name="slug" id="slug" placeholder="Brand Slug" class="form-control my-3">
          @error('slug')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
          <input type="file"  name="brandImage" id="" class="form-control my-3">
          @error('brandImage')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
           <button type="submit" class="w-full btn btn-primary">Upload Brand</button>
         </form>

         @else
            
       
         <form action="{{route('brand.update',$editedBrand->slug)}}" enctype="multipart/form-data"  method="POST" class="card-body">
          @csrf 
          @method('PUT')
            <h4>Edit the Brand</h4>
          <input type="text" name="title" id="title" placeholder="Brand Name" value=" {{$editedBrand->title}}" class="form-control">
          @error('title')
              <span class="text-theme-6">{{$message}}</span>
          @enderror
          <input type="text" value="{{$editedBrand->slug}}" name="slug" id="slug" placeholder="Brand Slug" class="form-control my-3">
          @error('slug')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
          <img src="{{$editedBrand->image_uri}}" alt="" width="50" height="50">
          <input type="file"  name="brandImage" id="" class="form-control my-3" value="{{$editedBrand->image_uri}}">
          @error('brandImage')
          <span class="text-theme-6">{{$message}}</span>
          @enderror
           <button type="submit" class="w-full btn btn-primary">Update Brand</button>
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


  $('#deleteBtn').on('click', function(){

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
   
    $(this).next('form').submit()
  }
})
 })

    </script>
@endpush



@endsection