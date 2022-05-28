<!DOCTYPE html>
<html lang="en">
  <x-header title="All Delivery"/>

  <body>
    <x-navigation/>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>User</h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-12">
              @if (Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{Session::get('status')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            </div>
              <div class="col-lg-6">
              <div class="card">
                <form method="POST" action="createuser">
                  @csrf
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control input-default" placeholder="Name" required>
                        </div>
                    </div>
                                        <div class="col-lg-6">
                        <div class="form-group">
                            <label>Role</label>
                           <select class="form-control input-default" name="role">
                            <option disabled hidden selected>
                              Select Role
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">Order Management</option>
                            <option value="3">Planning</option>
                            <option value="4">Production</option>
                            <option value="5">Receive & Delivery</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control input-default" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control input-default @error('password') is-invalid @enderror" placeholder="password" required>
                        </div>
                    </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary btn-block m-b-10">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table
                        id="bootstrap-data-table-export"
                        class="table table-striped table-bordered"
                      >
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($userlist as $item)
                              <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['email']}}</td>
                            <td>
                                <div class="employeeTableIcon d-flex">
                                    
                                    
                                    <button
                                      value="{{$item['id']}}"
                                        class="employeeTableIconDiv border-0 editBtn Icon3 d-flex justify-content-center align-items-center mr-1"
                                      >
                                        <i class="ti-pencil-alt"></i>
                                    </button>
                                    <button 
                                    value="{{$item['id']}}"
                                    class="employeeTableIconDiv border-0 deleteBtn Icon2 d-flex justify-content-center align-items-center mr-1">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                          
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /# card -->
              </div>
              <!-- /# column -->
            </div>
            <!-- /# row -->
          </section>
        </div>
      </div>
            <!-- delete Modal -->
      <div class="modal fade" id="deleteModal" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="py-5">
              <div class=" d-flex justify-content-center mb-3">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
              </div>
              <form action="delete-user" method="POST">
                @csrf
                @method('DELETE')
              <input type="hidden" name="delete_id" id="delete_id">

              <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-secondary px-5 mx-2" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger px-5 mx-2">Yes Delete</button>
              
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form action="update-user" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" id="user_id" />
                <div class="row justify-content-center">
                  <div class="col-lg-12">
                    <h5 class="text-center">Edit User</h5>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control input-default" placeholder="Name" required>
                  </div>
                  </div>
                  {{-- <div class="col-lg-6">
                  <div class="form-group">
                  <input type="text" name="role" id="role" class="form-control input-default" placeholder="Role" required>
                  </div>
                  </div> --}}
                  <div class="col-lg-6">
                  <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-default" placeholder="Email" required>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-default" placeholder="Password" required>
                  </div>
                  </div>
                  
                </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="border-0 px-4 mx-2 py-2 rounded bg-danger text-white" style="cursor: pointer;" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="border-0 px-4 mx-2 py-2 rounded bg-primary text-white" style="cursor: pointer;">Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>

        <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->
    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script>
      $(document).ready(function(){
        $(document).on('click', '.deleteBtn', function(){
          var delete_id = $(this).val();
          console.log(delete_id);
          jQuery.noConflict(); 
          $('#deleteModal').modal('show');
          $('#delete_id').val(delete_id);
          
        });

        $(document).on('click', '.editBtn', function(){
          
          var user_id = $(this).val();
          console.log(user_id);
          jQuery.noConflict(); 
          $('#modalEdit').modal('show');
          
          $.ajax({
            url: '/edit-user' + user_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#name').val(response.user.name);
              $('#email').val(response.user.email);
              $('#role').val(response.user.role);
              $('#password').val(response.user.password);
              $('#user_id').val(user_id);
            }
          });
        });
      });
    </script>
  </body>
</html>