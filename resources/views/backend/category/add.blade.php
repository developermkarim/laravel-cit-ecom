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
          <td><a  class="btn btn-primary" class="btn" href="{{route('category.edit',$item->slug)}}"><i class="fas fa-edit"></i></a>
            &nbsp;

            <a  href="{{route('category.delete',$item->slug)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
         {{--  <form action="" method="POST">
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


      $(function(){


$(document).on('click','#deleteBtn',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete This Data?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Approve it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Approved!',
                      'Your file has been Deleted.',
                      'success'
                    )
                  }
                }) 

  });
});

    </script>
@endpush



@endsection