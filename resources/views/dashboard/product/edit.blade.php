<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <base href="/public">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Corona Admin</title>
      <!-- plugins:css -->
      <style type="text/css">
         .div_center{
         text-align:left;
         padding-top: 40px;
         }
         #table-css{
         border: 1px solid ;
         }
      </style>
      @include('dashboard.css')
      <!-- End layout styles -->
      <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
   <body>
      <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('dashboard.sidebar')
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('dashboard.navbar')
      <!-- partial -->
      <div class="main-panel">
         <div class="content-wrapper">
            <div class="div_center">
               <h4> <a style="float: right !important"  href="{{url('product_list')}}">Back</a></h4>
               <h1>Edit Product</h1>
               <form class="forms-sample" action="{{url('product_update',$product->id)}}" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-12 grid-margin stretch-card form-center">
                        <div class="card">
                           <div class="card-body">
                              @csrf
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Product Title</label>
                                       <input type="text" class="form-control " style="color:white" name="title" value="{{old('title',$product->title)}}" placeholder="Enter Product Title " >
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Main Category</label>
                                       <select name="maincategory"  class="form-control" style="color:white">
                                       @foreach ($main_categories as $main_category)
                                       <option {{($main_category->id == $product->maincategory_id) ? 'selected' : '' }} value="{{$main_category->id}}">{{$main_category->main_category_name}}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Category</label>
                                       <select name="category"  class="form-control" style="color:white">
                                       @foreach ($categories as $category)
                                       <option {{($category->id == $product->category_id) ? 'selected' : '' }}  value="{{$category->id}}">{{$category->category_name}}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Sub Category</label>
                                       <select name="subcategory"  class="form-control" style="color:white">
                                       <@foreach ($sub_categories as $subcategory)
                                       <option {{($subcategory->id == $product->subcategory_id) ? 'selected' : '' }} value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Price</label><br> 
                                       <input type="text" class="form-control " style="color:white" name="price" value="{{old('price',$product->price)}}" placeholder="Enter Price " >
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >SKU</label><br> 
                                       <input type="text" class="form-control " style="color:white" name="sku" value="{{old('sku',$product->sku)}}" placeholder="Enter SKU " >
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Is Dicount</label><br> 
                                       <select class="form-control" name="isdiscount" style="color:white" required>
                                       <option {{($product->isdiscount == 1) ? 'selected' : '' }} value="1">Yes</option>
                                       <option  {{($product->isdiscount == 0) ? 'selected' : '' }} value="0">No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label >Discount Price </label><br> 
                                       <input type="text" class="form-control " style="color:white" name="discount_price" value="{{old('discount_price',$product->discount_price)}}" placeholder="Enter Discount Price " >
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label >Total Price</label>
                                       <input type="text" class="form-control " style="color:white" name="total_price" value="{{old('total_price',$product->total_price)}}" placeholder="Enter Total Price " >
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label >Status</label><br> 
                                       <select class="form-control" name="status" style="color:white" required>
                                          <!--  <option {{ (old('status') == 1)   ? 'selected' : null }} value="1">Active</option>
                                             <option {{ (old('status') == 0) ? 'selected' : null }} value="0">InActive</option> -->
                                          <option  {{($product->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                          <option {{($product->status == 0) ? 'selected' : '' }} value="0">InActive</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label >Short Description</label>
                                       <textarea  class="form-control " style="color:white" name="short_description" placeholder="Enter Short Description " >{{$product->short_description}}</textarea> 
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label >Description</label>
                                       <textarea  class="form-control" id="summernote" style="color:white" name="description" placeholder="Enter Description " >{{$product->description}}</textarea> 
                                    </div>
                                 </div>
                              </div>
                              <hr>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <h4>Product Image</h4>
                     <div class="col-md-12 grid-margin stretch-card form-center">
                        <div class="card">
                           <div class="card-body">
                              <?php if(count($productImage) == 0){ ?>  
                              <label for="productimage">Insert Image</label>
                              <input type="file" class="form-control" id="productimage"  name="image[]" multiple value="{{old('image')}}" >
                              @if($errors->has('image'))
                              <span class="text-danger" >{{ $errors->first('image')}}</span>
                              @endif 
                              <?php } else  { ?>
                              <label for="productimage">Update Image</label>
                              <input type="file" class="form-control" id="productimage"  name="image[]" multiple value="{{old('image')}}" ><br>
                              @if($errors->has('image'))
                              <span class="text-danger" >{{ $errors->first('image')}}</span>
                              @endif
                              @foreach($productImage as $key => $value)
                              <span class="col-md-4">
                                  <img src="uploads/productimage/{{$value->image_name}}" height="100px" widht="100px" alt="">
                              
                                  <a onclick="return confirm('Are You Sure To Delete This')" class="remove text-danger removerow" href="productimage_delete/{{$value->id}}/{{$product->id}}" ><span class="far fa-2x fa-times-circle"></span>
                                  </a>
                              </span>
                              
                              @endforeach
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <legend>Product Attribute</legend>
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-bordered" id="table-css">
                                    <thead>
                                       <tr>
                                          <th>Size</th>
                                          <th>Color</th>
                                          <th>Price</th>
                                          <!--   <th>SKU</th> -->
                                          <th>Qty</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php if(count($productAttrArr) == 0){ ?>  
                                       <tr class="hh">
                                          <td>
                                             <select name="size_id[]" id="size_id"  class="form-control" style="color:white">
                                                <option value="">Select</option>
                                                @foreach($size as $sizes)
                                                <option value="{{$sizes->id}}">{{$sizes->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <select name="color_id[]"  id="color_id" class="form-control" style="color:white">
                                                <option value="">Select</option>
                                                @foreach ($color as $colors)
                                                <option value="{{$colors->id}}">{{$colors->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td><input type="text" class="form-control " style="color:white" name="attr_price[]" value="" placeholder=" Enter Price " ></td>
                                          <!-- <td><input type="text" class="form-control " style="color:white" name="sku[]" value="" placeholder=" Enter SKU " ></td> -->
                                          <td><input type="text" class="form-control " style="color:white" name="qty[]" value="" placeholder=" Enter Quantity " ></td>
                                          <td class="remove text-center"></td>
                                       </tr>
                                       <?php } else{ ?>
                                       <?php foreach( $productAttrArr as $key => $value ) { ?>
                                       <?php if( $key == 0 ) { ?>
                                       <tr class="hh">
                                          <?php } else { ?>
                                       <tr class="hh copy<?php echo $key; ?>">
                                          <?php } ?>
                                          <td>
                                             <select name="size_id[]" id="size_id"  class="form-control" style="color:white">
                                                @foreach($size as $sizes)
                                                <option <?php if($sizes->id == $value->size_id){ echo ' selected '; } ?> value="{{$sizes->id}}">{{$sizes->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <select name="color_id[]"  id="color_id" class="form-control" style="color:white">
                                                @foreach ($color as $colors)
                                                <option  <?php if($colors->id == $value->color_id){ echo ' selected '; } ?> value="{{$colors->id}}">{{$colors->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td><input type="text" class="form-control " style="color:white" name="attr_price[]" value="{{$value->attr_price}}" placeholder=" Enter Price " ></td>
                                         
                                          <td><input type="text" class="form-control " style="color:white" name="qty[]" value="{{$value->qty}}" placeholder=" Enter Quantity " ></td>
                                          <td class="remove text-center">
                                             <?php if( $key != 0 ) { ?>
                                             <!--  <a class="remove text-danger removerow" href="productattr_delete" onclick="$(this).parent().slideUp(function(){ $(this).parent().remove() }); return false"><span class="far fa-2x fa-times-circle"></span></a>-->
                                             <a onclick="return confirm('Are You Sure To Delete This')" class="remove text-danger removerow" href="productattr_delete/{{$value->id}}/{{$product->id}}" ><span class="far fa-2x fa-times-circle"></span></a>
                                             <?php } ?>
                                          </td>
                                       </tr>
                                       <?php } ?>
                                       <?php } ?>
                                    </tbody>
                                 </table>
                                 <br>
                                 <a href="#" class="add btn btn-success" rel=".hh"><strong> Add More </strong></a>
                                 <!-- 
                                    <a href="#" class="add fa fa-plus" rel=".hh"><strong> Add More </strong></a>
                                    
                                    -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                 
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="admin/assets/vendors/js/recopy.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      @include('dashboard.script')
      <!-- End custom js for this page -->
      <!-- Summernote link-->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
      <script>
         $('#summernote').summernote({
           placeholder: 'Enter Description',
           tabsize: 2,
           height: 200
         });
         
      </script>
      <script>
         $(document).ready(function(){
         
            var removeLink = '<a class="remove text-danger" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><span class="fa fa-times"></span> Remove</a>';
            $('a.add').relCopy();
         
            $.validator.addMethod("isEqualZero", function(value, element, param) {
               return this.optional(element) || value == 0;
            }, "Please Check Value");  
         });
      </script>
      <!-- Summernote link end-->
      <!--<script>
         var loop_count=1;
          function add_more(){
         
         
                           loop_count++; 
                             
                             var html='<div id="_attr_'+loop_count+'" class="card product_attr_box" ><div class="card-body"><div class="row">';
         
                            var size_id_html=jQuery('#size_id').html();
         
                             html+='<div class="col-md-2"><div class="form-group"><label >Size</label> <select name="size_id[]" id="size_id"  class="form-control" style="color:white">'+size_id_html+'</select></div></div>';
         
                            var color_id_html=jQuery('#color_id').html();
         
                            html+='<tr><td></td></tr>';
         
                 
                             jQuery('.product_attr_box').append(html) ;
                             
                             
                          }
         
                function remove_more(loop_count){
                   jQuery('#product_attr_'+loop_count).remove();
         
                }
         
                      
         
         </script>-->
   </body>
</html>