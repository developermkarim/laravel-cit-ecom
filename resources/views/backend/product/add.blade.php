@extends('layouts.backendapp')

@section('content')


<div class="intro-y d-flex align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto">
        Form Layout
    </h2>
</div>
<div class="container">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="mb-3 col-lg-6">
   
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Product Title">
          </div>
        
        <div class="mb-3 col-lg-6">
            <input type="text" class="form-control" name="slug" placeholder="Product Slug">
          </div>

        <div class="mb-3 col-lg-6">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="price" placeholder="Product Price">
          </div>
        
        <div class="mb-3 col-lg-6">
           
            <input type="text" class="form-control" name="discount_price" placeholder="Discount Price">
          </div>

          {{-- Product Category Here --}}
          <div class="mb-3 col-lg-6"> 
            <select class="form-control"  name="category" id="category">
           <option class="form-control"  value="">Select Category </option>
           @foreach ($categories as $item)
           
            <option class="form-control"  value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
         </select>
             </div>

          <div class="mb-3 col-lg-6"> 
            <select class="form-control"  name="subCategory" id="subCategory">
          
           
           <option class="form-control"  value="NO">Select Sub Category</option>
         </select>
             </div>


              {{-- Product Category End Here --}}
        <div class="mb-3 col-lg-4">
           
         <select class="form-control"  name="stock" id="">
           <option class="form-control"  value="">Select Stock Status</option>
            <option class="form-control"  value="{{ true }}">Yes</option>
            <option class="form-control"  value="{{ false }}">No</option>
         </select>
          </div>

        <div class="mb-3 col-lg-4"> 
         <input class="form-control"  type="date" name="start_date" id="">
          </div>
          <div class="mb-3 col-lg-4"> 
            <input class="form-control"  type="date" name="end_date" id="">
             </div>

          <div class="mb-3 col-lg-4"> 
            <input class="form-control"  type="text" name="product_code" placeholder="product Code" id="">
             </div>

          <div class="mb-3 col-lg-4"> 
            
            <select class="form-control"  name="brand" id="">
           <option class="form-control"  value="">Select Brand </option>
           @foreach ($brands as $item)
           <option class="form-control"  value="{{ $item->id }}">{{ $item->title }}</option>
           @endforeach
         </select>

             </div>


<div class="mb-3 col-lg-10"> 
    <textarea class="form-control" name="short_detail" id="" cols="110" rows="5" placeholder="Short Description"></textarea>
</div>

<div class="mb-3 col-lg-10"> 
    <textarea class="form-control" name="long_detail" id="" cols="110" rows="5" placeholder="Long Description"></textarea>
</div>

<div class="mb-3 col-lg-6">
   <label for="">Product Thumbnail</label>
    <input type="file" class="form-control" id="exampleFormControlInput1" name="thumbnail_name" placeholder="Product Title">
  </div>
  <div class="mb-3 col-lg-6">
   <label for="">Product Gallery Image</label>
    <input type="file" multiple class="form-control" id="exampleFormControlInput1" name="product_gallery_images[]" placeholder="Product Title">
  </div>

  <div class="mb-3 col-lg-10">
   <label for="">Product Youtube
   Video</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="video_uri" placeholder="Product Video Link">
  </div>
  <button  style="background-color: #1C3FAA;color:white" class="btn tex-light col-3" type="submit">Upload Product</button>
    </div>
</form>
</div>

@push('customJs')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> --}}
    <script>
       let categorySelect = $('select[name="category"]');
       let subCategory = $('select[name="subCategory"]');
       categorySelect.on('change',function(){
        let id = $(this).val();
        
        let rawUrl = `{{ route('product.fetch.subCategory', ':id') }}`;
        let newUrl = rawUrl.replace(':id',id);
        

        $.ajax({
            url:  newUrl,
            type:'GET',
            dataType:'json',
            success:(response)=>{
            let options = [];
            response.map(data=>{
              let option = `<option value="${data.id}">${data.title}</option>`
              options.push(option);
            })
            subCategory.html('');
            subCategory.html(options);
            },
            error:(err)=>{
              let option = `<option selected disabled>${err.responseText}</option>`
              if(err){
                subCategory.html('')
                alert(err.responseText)
               subCategory.html(option)
              }
               
            }
        })
       })

   
    </script>
@endpush


@endsection

