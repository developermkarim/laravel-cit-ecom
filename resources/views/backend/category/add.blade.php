@extends('layouts.backendapp')

@section('content')

<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
  Category Management
</h1>

<div class="row">

  <div class="col-lg-8">

    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col">S/L</th>
          <th scope="col">Category Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Feature</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($category)
       @forelse ($category as $key => $item)
           
      
        <tr>
         <td>{{++$key}}</td>
          <td>{{$item->title}}</td>
           <td>{{$item->slug}}</td>
           <td>
            @if($item->image_uri)
            <img src="{{$item->image_uri}}" width="100" height="100" alt=""> 
            @else
            <img src="placeholder-category-img.jpg" width="100" height="100" alt=""> 
           @endif
          </td>
          <td><a  class="btn btn-primary" class="btn" href="{{route('category.edit',$item->slug)}}">Edit</a>
            &nbsp;

            <button  id="deleteBtn" class="btn btn-danger">Delete</button>
          <form action="{{route('category.delete',$item->slug)}}" method="POST">
            @csrf
            @method('DELETE')
          </form>
          </td>
        </tr> 
        @empty 
        <tr>
          <td>
            No Data Found
          </td>
        </tr>
       @endforelse
      @endif 
      </tbody>
    </table>
  </div>


<div class="col-lg-4">
  <div class="">

    @if(!isset($editedCategory))
    <form action="{{route('category.store')}}" enctype="multipart/form-data"  method="POST" class="card-body">
      @csrf 
      
        <h4>Add New Category</h4>
      <input type="text" name="title" id="title" placeholder="Category Name" class="form-control">
      @error('title')
          <span class="text-theme-6">{{$message}}</span>
      @enderror
      <input type="text" name="slug" id="slug" placeholder="Category Slug" class="form-control my-3">
      @error('slug')
      <span class="text-theme-6">{{$message}}</span>
      @enderror
      <input type="file"  name="categoryImage" id="" class="form-control my-3">
      @error('categoryImage')
      <span class="text-theme-6">{{$message}}</span>
      @enderror
       <button type="submit" class="w-full btn btn-primary">Upload Category</button>
     </form>
@else
    <form action="{{route('category.update',$editedCategory->slug)}}" enctype="multipart/form-data"  method="POST" class="card-body">
      @csrf 
      @method('PUT')
        <h4>Edit The selected Category</h4>
      <input type="text" name="title" id="title" value="{{$editedCategory->title}}" placeholder="Category Name" class="form-control">
      @error('title')
          <span class="text-theme-6">{{$message}}</span>
      @enderror
      <input type="text" name="slug" id="slug" value="{{$editedCategory->title}}" placeholder="Category Slug" class="form-control my-3">
      @error('slug')
      <span class="text-theme-6">{{$message}}</span>
      @enderror
      <img src="{{$editedCategory->image_uri}}" alt="" width="100" height="100">
      <input type="file"  name="categoryImage" value="{{$editedCategory->image_uri}}" id="" class="form-control my-3">
      @error('categoryImage')
      <span class="text-theme-6">{{$message}}</span>
      @enderror
       <button type="submit" class="w-full btn btn-primary">Update Category</button>
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