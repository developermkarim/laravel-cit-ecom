@extends('layouts.backendapp')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h1 class="text-3xl font-bold underline">
  <h2 class="text-center">
    <x:notify-messages />
  </h2>
 Sub Sub-Category Management
</h1>

<div class="row">

  <div class="col-lg-8">

    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col">S/L</th>
          <th scope="col">Category Name</th>
          <th scope="col">Sub-Category Name</th>
          <th scope="col">Sub Sub-Category Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Feature</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

       @php
           error_reporting(0);
       @endphp

       @forelse ($allSubCategories as $key => $item)


        <tr>
         <td>{{++$key}}</td>
         <td>{{$item->subCategory->category->title}}</td>
         <td>{{$item->subCategory->title}}</td>
         
           <td>{{$item->title}}</td>
           <td><img src="{{$item->subSubCategory_image_uri}}" width="100" height="100" alt=""> </td>
          <td><a  class="btn btn-primary" class="btn" href="{{route('subSubCategory.edit',$item->slug)}}">Edit</a>
            &nbsp;

           
          <a id="deleteBtn" href="{{route('subSubCategory.delete',$item->slug)}}">
            Delete
          </a>
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
    <form action="{{route('subSubCategory.store')}}" enctype="multipart/form-data"  method="POST" class="card-body">
      @csrf

        <h4>Add New Sub Sub-Category</h4>
      <input type="text" name="title" id="title" placeholder="SUb Sub Category Name" class="form-control">
      @error('title')
          <span class="text-theme-6">{{$message}}</span>
      @enderror
      <input type="text" name="slug" id="slug" placeholder="Sub Sub Category Slug" class="form-control my-3">
      @error('slug')
      <span class="text-theme-6">{{$message}}</span>
      @enderror

      <select name="category_id" id="category_id" class="form-control my-3">
        <option value="" selected disabled>Select One Category</option>

        @foreach($allCategories as $item)
        <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach

    </select>

      <select name="sub_category_id" id="sub_category_id" class="form-control my-3">
        <option value="" selected disabled>Select One Sub-Category</option>

    

    </select>

    <input type="file"  name="subSubCategory_image" id="" class="form-control my-3">
    @error('subSubCategory_image')
    <span class="text-theme-6">{{$message}}</span>
    @enderror
       <button type="submit" class="w-full btn btn-primary">Upload sub-SubCategory</button>
     </form>

 @else

<form action="{{route('subSubCategory.update',$editDataToForm->slug)}}" enctype="multipart/form-data"  method="POST" class="card-body">
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

    {{--     "id" => 3
        "title" => "Readmi"
        "slug" => "readmi"
        "sub_category_id" => 3
        "subSubCategory_image" => "readmi1669214782.jpg"
        "subSubCategory_image_uri" => "http://127.0.0.1:8000/storage/subSubCategory//readmi1669214782.jpg"
        "created_at" => "2022-11-23 14:46:22"
        "updated_at" => "2022-11-23 14:46:22" --}}
    @enderror

    <select name="categoryTitle" id="" class="form-control my-3">
        <option value="" selected disabled>Select One Category</option>

        @foreach($allCategories as $item)

        <option @selected($editDataToForm->subCategory->category_id == $item->id)  value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
    </select>

    @error('categoryTitle')
    <span class="text-theme-6">{{$message}}</span>
    @enderror



    <select name="subCategoryTitle" id="" class="form-control my-3">
      <option value=""  disabled>Select One sub-Category</option>

      @foreach($allSubCategories as $item)
      <option @selected($editDataToForm->sub_category_id == $item->id)  value="{{$item->id}}">{{$item->title}}</option>
      @endforeach

  </select>
  @error('subCategoryTitle')
  <span class="text-theme-6">{{$message}}</span>
  @enderror
   {{--  <select name="SubcategoryTitle" id="" class="form-control my-3">
        <option value="" selected disabled>Select One Category</option>

        @foreach($SubcategoryTitle as $item)
        <option @selected($editSubDataToForm->subCategory_id == $item->id)  value="{{$item->id}}">{{$item->title}}</option>
        @endforeach

    </select> --}}
    <input type="file"  name="subSubCategoryImage" id="" class="form-control my-3">
    @error('subSubCategoryImage')
    <span class="text-theme-6">{{$message}}</span>
    @enderror

     <button type="submit" class="w-full btn btn-primary">Update sub-SubCategory</button>
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

    <script>
      $(function(){
        $(document).on('change','#category_id',function(){
          var category_id = $(this).val();

          $.ajax({
            url:"{{ route('subSubCategory.get.data') }}",
            type:'get',
            datatype:'json',
            data:{category_id:category_id},
            success:(response)=>{
              console.log(response);
              var option = "<option value=''>select One Sub Subcategory</option>";
              $.each(response,function(key,value){
            option+= `<option value="${value.id}">${value.title}</option>`
              })
              $('#sub_category_id').html(option)
            }
          })
        })
      })
    </script>
@endpush



@endsection
