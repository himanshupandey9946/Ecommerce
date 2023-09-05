<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    
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
          @if(session()->has('message'))
          <div class="alert alert-success ">

          <button type="button" class="close" data-dismiss="alert" arera-hidden="true">x</button>
            {{session()->get('message')}}
          </div>
        @endif
           
            <h5> <a style="float: right !important"  href="{{url('addcategory')}}"> Add Category</a></h5>
            <div class="page-header">
              <h3 class="page-title">  Category List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
              
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    </p>
                    <div class="table-responsive">
                      <table class="table" >
                        <thead>
                          <tr>
                            <th>Category_Name</th>
                            <th>Main_Category_Name</th>
                            
                            <th>Category_Image</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)
                          <tr>
                            <td>{{$data->category_name}}</td>
                            <td>
                              
                            {{$data->Main_Category_Name}}   
                            </td>
                            
                            <td><img style="height:100px;width:100px" src="uploads/categoryimage/{{$data->category_image}}" ></td>
                            <td >
                              <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger"  href="{{url('delete_category',$data->id)}}">Delete</a>
                              <a  class="btn btn-success" href="{{url('update_category',$data->id)}}">Edit</a>
                            </td>
                          </tr>

                          @endforeach
                          
                          
                             
                         
                        
                          
                         
                        </tbody>
                      </table>
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