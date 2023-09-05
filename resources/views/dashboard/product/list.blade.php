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

          <button type="button" class="close" data-dismiss="alert" arera-hidden="true"></button>
            {{session()->get('message')}}
          </div>
        @endif
          
           
            <h4> <a style="float: right !important"  href="{{url('product_add')}}">Add New Product</a></h4>
            <div class="page-header">
              <h1 class="page-title">Product List </h1>
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
                           <th>Name</th>
                           <th>Status</th>
                           <th>Created Date</th>
                           <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $value)
                           <tr>
                            <td>{{$value->title}}</td>
                            <td>{{($value->status==1) ? 'Active' : 'Inactive'}}</td>
                            <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                             <td >
                              <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger"  href="{{url('product_delete',$value->id)}}">Delete</a>
                              <a  class="btn btn-success" href="{{url('product_edit',$value->id)}}">Edit</a>
                            </td>
                           </tr>
                          @endforeach 
                        </tbody>
                      </table><br><br>
                      <div class="d-flex justify-content-center" style="color:white">
                          {!! $data->links() !!}
                         </div>
                      <style>
                        .w-5{
                          display:none;
                        }
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