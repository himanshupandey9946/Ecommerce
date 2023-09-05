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
              <h4>Update Main Category</h4>
            <h4> <a style="float: right !important"  href="{{url('cancelmainupdatecategory')}}">Back</a></h4>

                <div class="row">
              <div class="col-md-12 grid-margin stretch-card form-center">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title"></h3>
                    <form class="forms-sample" action="{{url('edit_main_category',$data->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="categoryname">Main Category Name</label>
                        <input type="text" class="form-control " id="categoryname"  style="color:white" name="name" value="{{$data->main_category_name}}" placeholder="Enter Main Category Name " >
                        @if($errors->has('name'))
                           <span class="text-danger" >{{ $errors->first('name')}}</span>
                        @endif

                      </div>
                      
                      <div class="form-group">
                        <label for="maincategoryimage">Current Image</label>
                        <img src="uploads/maincategoryimage/{{$data->main_category_image}}" height="100px" widht="100px" alt="">

                      </div>

                      <div class="form-group">
                        <label for="maincategoryimage">Change Image</label>
                        <input type="file" class="form-control" id="maincategoryimage"  name="image" value="" >
                        @if($errors->has('image'))
                           <span class="text-danger" >{{ $errors->first('image')}}</span>
                        @endif 
                      </div> 
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                      
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