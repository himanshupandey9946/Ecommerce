

<h1>Add Category</h1><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <style type="text/css">
        .div_center{
            text-align:left;
            padding-top: 40px;
        }
        
        
    </style>
    
    @include('dashboard.css')
   
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
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
            <h4> <a style="float: right !important"  href="{{url('cancelsubcategory')}}">Back</a></h4>

             <h1>Add Sub Category</h1>
              <div class="row">
              <div class="col-md-12 grid-margin stretch-card form-center">

               



                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title"></h3>
                    <form class="forms-sample" action="{{url('add_sub_category')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group ">
                       <div>

                       <label for="main_category"> Main Category Name</label><br>
                          <select name="main_category" id="main_category" class="form-control" style="color:white">
                          <option value="">Select Main Category</option>
                            @if($main_categories->isNotEmpty( ))
                            @foreach ($main_categories as $main_category)
                             <option value="{{$main_category->id}}">{{$main_category->main_category_name}}</option>
                             @endforeach
                             @endif
                          </select>
                          @if($errors->has('main_category'))
                           <span class="text-danger" >{{ $errors->first('main_category')}}</span>
                        @endif
                       </div>

                       <div class="form-group">
                       <div>
                       <label for="category"> <br/> Category Name</label><br>
                          <select name="category" id="category" class="form-control" style="color:white">
                          <option value="">Select Category</option>

                            @if($categories->isNotEmpty( ))
                            @foreach ($categories as $category)
                             <option value="{{$category->id}}" style="color:white">{{$category->category_name}}</option>
                             @endforeach
                             @endif
                          </select>
                          @if($errors->has('category'))
                           <span class="text-danger" >{{ $errors->first('category')}}</span>
                        @endif
                       </div>

                        <label for="categoryname"><br/>Sub Category Name</label>
                        <input type="text" class="form-control " id="categoryname"  style="color:white" name="name" value="{{old('name')}}" placeholder="Enter Sub Category Name " >
                        @if($errors->has('name'))
                           <span class="text-danger" >{{ $errors->first('name')}}</span>
                        @endif

                      </div>
                      <div class="form-group">
                        <label for="categoryimage">Insert Image</label>
                        <input type="file" class="form-control" id="categoryimage"  name="image" value="{{old('image')}}" >
                        @if($errors->has('image'))
                           <span class="text-danger" >{{ $errors->first('image')}}</span>
                        @endif 
                      </div> 
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

               
               
              
            
            </div>
          </div>
     </div>


      
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('dashboard.script')
   
    <!-- End custom js for this page -->
  </body>
</html>     


