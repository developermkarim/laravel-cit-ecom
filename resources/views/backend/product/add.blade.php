@extends('layouts.backendapp')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add New Product</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
        </ol>
      </nav>
    </div>
     
  </div>
  <!--end breadcrumb-->

<div class="card">
<div class="card-body p-4">
<h5 class="card-title">Add New Product</h5>
<hr/>

<form id="myForm" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" >
@csrf
 <div class="form-body mt-4">
<div class="row">
 <div class="col-lg-8">
     <div class="border border-3 p-4 rounded">


<div class="form-group mb-3">
  <label for="inputProductTitle" class="form-label">Product Name</label>
  <input type="text" name="title" class="form-control" id="inputProductTitle" placeholder="Enter product title">
  </div>

<div class="form-group mb-3">
  <label for="inputProductTitle" class="form-label">Product Slug</label>
  <input type="text" name="slug" class="form-control" id="inputProductTitle" placeholder="Enter product Slug">
  </div>

      <div class="mb-3">
  <label for="inputProductTitle" class="form-label">Product Tags</label>
  <input type="text" name="product_tags" class="form-control visually-hidden" data-role="tagsinput" value="new product,top product">
  </div>

  <div class="mb-3">
  <label for="inputProductTitle" class="form-label">Product Size</label>
  <input type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="Small,Midium,Large">
  </div>

  <div class="mb-3">
  <label for="inputProductTitle" class="form-label">Product Color</label>
  <input type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput" value="Red,Green,Blue,Black">
  </div>



  <div class="form-group mb-3">
  <label for="inputProductDescription" class="form-label">Short Description</label>
  <textarea name="short_detail" class="form-control" id="inputProductDescription" rows="3"></textarea>
  </div>

   <div class="mb-3">
  <label for="inputProductDescription" class="form-label">Long Description</label>
  <textarea id="mytextarea" name="long_detail"></textarea>
  </div>

   <div class="mb-3">
  <label for="">Product Youtube
   Video</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="video_uri" placeholder="Product Video Link">
  </div>



<div class="form-group mb-3">
  <label for="inputProductTitle" class="form-label">Main Thambnail</label>
  <input name="thumbnail_name" class="form-control" type="file" id="thumbnail_name" onChange="thunmbnail_Url(this)" >

  <img src="" id="mainThmb" />
  </div>



<div class="form-group mb-3">
  <label for="inputProductTitle" class="form-label">Multiple Image</label>
  <input class="form-control" name="product_gallery_images[]" type="file" id="product_gallery_images" multiple="">

<div class="row" id="preview_img"></div>

  </div>


 
      </div>
 </div>
 <div class="col-lg-4">
<div class="border border-3 p-4 rounded">
        <div class="row g-3">

  <div class="form-group col-md-6">
    <label for="inputPrice" class="form-label">Product Price</label>
    <input type="text" name="price" class="form-control" id="inputPrice" placeholder="00.00">
    </div>
    <div class="col-md-6">
    <label for="inputCompareatprice" class="form-label">Discount Price </label>
    <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
    </div>

    <div class="col-md-6">
      <label for="inputCompareatprice" class="form-label">Start Date </label>
      <input type="date" name="start_date" class="form-control" id="inputCompareatprice" >
      </div>
  
     
  
      <div class="col-md-6">
      <label for="inputCompareatprice" class="form-label">End Date </label>
      <input type="date"  name="end_date" class="form-control"  id="inputCompareatprice">
      </div>

    <div class="form-group col-md-6">
    <label for="inputCostPerPrice" class="form-label">Product Code</label>
    <input type="text" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00">
    </div>
    <div class="form-group col-md-6">
    <label for="inputStarPoints" class="form-label">Product Quantity</label>
    <input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00">
    </div>


    <div class="form-group col-12">
    {{-- <label for="inputProductType" class="form-label">Product Brand</label> --}}
    <select name="brand" class="form-select" id="inputProductType">
      <option class="form-select" >Select Brand</option>
      @foreach($brands as $brand)
      <option value="{{ $brand->id }}">{{ $brand->title }}</option>
       @endforeach
      </select>
    </div>

    <div class="form-group col-12">
    {{-- <label for="inputVendor" class="form-label">Product Category</label> --}}
    <select class="form-select" name="category" id="category">
      <option class="form-select">Select Category</option>
      @foreach($categories as $cat)
      <option value="{{ $cat->id }}">{{ $cat->title }}</option>
       @endforeach
      </select>
    </div>

    <div class="form-group col-12">
    {{-- <label for="inputCollection" class="form-label">Product SubCategory</label> --}}
    <select name="subCategory"  class="form-select" id="subCategory">
      <option class="form-select"  value="NO">Select Sub-Category</option>
       
      </select>
    </div>

    <div class="form-group col-12">
    {{-- <label for="inputCollection" class="form-label">Product Sub SubCategory</label> --}}
    <select  class="form-select"  name="subSubCategory" id="subSubCategory">
      <option class="form-select"  value="NO">Select Sub Sub-Category</option>
       
      </select>
    </div>

    <div class="form-group col-12">
    <label for="inputCollection" class="form-label">Select Stock Status</label>
    <select  class="form-select"  name="stock" id="">
      <option class="form-control"  value="{{ true }}">Yes</option>
      <option class="form-control"  value="{{ false }}">No</option>
      </select>
    </div>


   {{--  <div class="col-12">
    <label for="inputCollection" class="form-label">Select Vendor</label>
    <select name="vendor_id" class="form-select" id="inputCollection">
      <option></option>
    @foreach($activeVendor as $vendor)
      <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
       @endforeach
      </select>
    </div> --}}


    <div class="col-12">

<div class="row g-3">

<div class="col-md-6">	
<div class="form-check">
<input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault"> Hot Deals</label>
</div>
</div>

<div class="col-md-6">	
<div class="form-check">
<input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault">Featured</label>
</div>
</div>




<div class="col-md-6">	
<div class="form-check">
<input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault">Special Offer</label>
</div>
</div>


<div class="col-md-6">	
<div class="form-check">
<input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault">Special Deals</label>
</div>
</div>



</div> <!-- // end row  -->
     
    </div>

<hr>


    <div class="col-12">
      <div class="d-grid">
        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    
      </div>
    </div>
  </div> 
</div>
</div>
</div><!--end row-->
</div>
</div>

</form>

</div>

</div>


@push('customJs')

{{-- 
   "price" => null
  "product_qty" => null
  "product_tags" => "new product,top product"
  "product_size" => "XXL,XL,L,M"
  "product_color" => "Red,Green,Blue,Black"
  "discount_price" => null
  "category" => null
  "subCategory" => "NO"
  "subSubCategory" => "NO"
  "stock" => null
  "start_date" => null
  "end_date" => null
  "product_code" => null
  "brand" => null
  "short_detail" => null
  "long_detail" => null
  "video_uri" => null --}}
{{-- This is For live validation of Form --}}
<script type="text/javascript">
  $(document).ready(function (){
      $('#myForm').validate({
          rules: {
              title: {
                  required : true,
              }, 
              long_detail: {
                  required : true,
              }, 
              thumbnail_name: {
                  required : true,
              }, 
              product_gallery_images: {
                  required : true,
              }, 
               price: {
                  required : true,
              },                   
               brand: {
                  required : true,
              },                   
               category: {
                  required : true,
              },                   
               product_code: {
                  required : true,
              }, 
               product_qty: {
                  required : true,
              },  
              brand: {
                  required : true,
              }, 
              category: {
                  required : true,
              }, 
              subSubCategory: {
                  required : true,
              }, 
          },
          messages :{
              title: {
                  required : 'Please Enter Product Name',
              },
              long_detail: {
                  required : 'Please Enter long Description',
              },
              thumbnail_name: {
                  required : 'Please Select Product Thambnail Image',
              },
              product_gallery_images: {
                  required : 'Please Select Product Multi Image',
              },
              price: {
                  required : 'Please Enter Selling Price',
              }, 
              brand: {
                  required : 'Please Select a product brand',
              }, 
              category: {
                  required : 'Please Select a product Category',
              }, 
            
              product_code: {
                  required : 'Please Enter Product Code',
              },
               product_qty: {
                  required : 'Please Enter Product Quantity',
              },
              brand: {
                  required : 'Please Enter Selling Price',
              }, 
              category: {
                  required : 'Please select Categroy',
              }, 
              subSubCategory: {
                  required : 'Please select Sub-Categroy',
              }, 

          },
          errorElement : 'span', 
          errorPlacement: function (error,element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight : function(element, errorClass, validClass){
              $(element).addClass('is-invalid');
          },
          unhighlight : function(element, errorClass, validClass){
              $(element).removeClass('is-invalid');
          },
      });
  });
  
</script>

{{-- This is for Image SHowing after uploading --}}

<script type="text/javascript">
function thunmbnail_Url(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      $('#mainThmb').attr('src',e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>


{{-- This is for showing multiple image after uploading --}}
<script> 

$(document).ready(function(){
 $('#product_gallery_images').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                .height(80); //create image element 
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
}
 });
});
 
</script>


<script>
/* title.keyup(function(){
        
        let titleValue = $(this).val().toLowerCase().split(' ').join('-');
        slug.val(titleValue); */
  var title = $('input[name="title"]');
  var slug  = $('input[name="slug"]');
  title.keyup(function(){
    slug.val(title.val().toLowerCase().split(' ').join('-'));
  })
</script>

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

       $(function(){
        $(document).on('change','#subCategory',function(){
          var subSubCategory = $(this).val();

          $.ajax({
            url:"{{ route('product.fetch.sub.subCategory') }}",
            type:'get',
            data:{subSubCategory:subSubCategory},
            success:(response)=>{
              var option = "<option value=''>Select Sub Sub-Category</option>";

              $.each(response, function(key,value){
                option += `<option value='${value.id}'>${value.title}</option>`;
              })

              $('#subSubCategory').html('');
              $('#subSubCategory').html(option);

            },
            error:(err)=>{

              let option = `<option selected value=''>${err.responseText}</option>`;
              if(err){
                $('#subSubCategory').html('');
                alert(err.responseText);
                $('#subSubCategory').html(option);

              }

            }
          })
        })
       })
   
    </script>
    
@endpush


@endsection

