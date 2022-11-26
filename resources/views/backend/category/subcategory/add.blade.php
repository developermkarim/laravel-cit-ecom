@extends('layouts.backendapp')

@section('content')

<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
 Sub Category Management
</h1>

<div class="row">

  <div class="col-lg-8">

    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col">S/L</th>
          <th scope="col">Category Name</th>
          <th scope="col">Sub-Category Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Feature</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

       @php
           error_reporting(0);
       @endphp

       @forelse ($subCategory as $key => $item)
           
      
        <tr>
         <td>{{++$key}}</td>
         <td>{{$item->category->title}}</td>
          <td>{{$item->title}}</td>
           <td>{{$item->slug}}</td>
           <td><img src="{{$item->image_uri}}" width="100" height="100" alt=""> </td>
          <td><a  class="btn btn-primary" class="btn" href="{{route('subCategory.edit',$item->slug)}}"><i class="fas fa-edit"></i></a>
            &nbsp;

            <a  href="{{route('subCategory.delete',$item->slug)}}" id="deleteBtn" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
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
     
      </tbody> 
    </table>
  </div>


<div class="col-lg-4">
  <div class="">

     @if(!isset($editDataToForm))
    <form action="{{route('subCategory.store')}}" enctype="multipart/form-data"  method="POST" class="card-body">
      @csrf 
      
        <h4>Add New Sub Category</h4>
      <input type="text" name="title" id="title" placeholder="SUb Category Name" class="form-control">
      @error('title')
          <span class="text-theme-6">{{$message}}</span>
      @enderror
      <input type="text" name="slug" id="slug" placeholder="Sub Category Slug" class="form-control my-3">
      @error('slug')
      <span class="text-theme-6">{{$message}}</span>
      @enderror

      <select name="categoryTitle" id="" class="form-control my-3">
        <option value="" selected disabled>Select One Category</option>
        
        @foreach($categoryIdTitle as $item)
        <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
       
    </select>
      <input type="file"  name="subCategoryImage" id="" class="form-control my-3">
      @error('subCategoryImage')
      <span class="text-theme-6">{{$message}}</span>
      @enderror
       <button type="submit" class="w-full btn btn-primary">Upload Category</button>
     </form> 
 @else 
<form action="{{route('subCategory.update',$editDataToForm->slug)}}" enctype="multipart/form-data"  method="POST" class="card-body">
    @csrf 
    @method('PUT')
      <h4>Edit Sub Category</h4>
    <input type="text" name="title" id="title" placeholder="SUb Category Name" value="{{$editDataToForm->title}}" class="form-control">
    @error('title')
        <span class="text-theme-6">{{$message}}</span>
    @enderror
    <input type="text" name="slug" value="{{$editDataToForm->slug}}" id="slug" placeholder="Sub Category Slug" class="form-control my-3">
    @error('slug')
    <span class="text-theme-6">{{$message}}</span>
    @enderror
    <select name="categoryTitle" id="" class="form-control my-3">
        <option value="" selected disabled>Select One Category</option>
        
        @foreach($categoryIdTitle as $item)
        <option @selected($editDataToForm->category_id == $item->id)  value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
       
    </select>
    @error('categoryTitle')
    <span class="text-theme-6">{{$message}}</span>
    @enderror
    <input type="file"  name="subCategoryImage" id="" class="form-control my-3">
    @error('subCategoryImage')
    <span class="text-theme-6">{{$message}}</span>
    @enderror

     <button type="submit" class="w-full btn btn-primary">Upload Category</button>
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




    </script>
@endpush



@endsection