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
            <h4> <a style="float: right !important"  href="{{url('cancelcategory')}}">Back</a></h4>

             <h1>Add New Size</h1>
                <div class="row">
              <div class="col-md-12 grid-margin stretch-card form-center">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title"></h3>
                    <form class="forms-sample" action="{{url('size_insert')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                       <label >Size Name</label><br> 
                        <input type="text" class="form-control" required value="{{old('name')}}" name="name" style="color:white" placeholder="Size Name"> 
                      </div>
                     
                      <div class="form-group">
                       <label >Status</label><br> 
                       <select class="form-control" name="status" style="color:white" required>
                          <option {{ (old('status') == 1) ? 'selected' : ''}} value="1">Active</option>
                          <option {{ (old('status') == 0) ? 'selected' : ''}} value="0">InActive</option>
                       </select>
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