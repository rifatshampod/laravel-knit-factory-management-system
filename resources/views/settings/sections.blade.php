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
                  <h1>All Sections</h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Sections</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <section id="main-content">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="card">
                  <div class="d-flex justify-content-end">
                    <div>
                      <button
                        type="button"
                        class="btn btn-primary addBtn btn-flat btn-addon m-b-10 m-l-5"
                      >
                        <i class="ti-plus"></i>Add Section
                      </button>
                    </div>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table
                        id="bootstrap-data-table-export"
                        class="table table-striped table-bordered"
                      >
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Section Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($sectionslist as $item)
                              <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['name']}}</td>
                            <td>
                              
                                <div class="employeeTableIcon d-flex">
                                  <!--
                                <button
                                value="{{$item['id']}}"
                                  class="Icon1 receiveBtn px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-eye mr-1"></i> Receive
                                </button>  -->
                                
                                <button
                                  value="{{$item['id']}}"
                                  class="Icon3 px-3 py-1 bg-success editBtn text-white cursor border-none
                                  rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt mr-1"></i> Edit
                              </button> 
                              <button
                                value="{{$item['id']}}"
                                  class="Icon3 bg-danger px-3 py-1 deleteBtn text-white cursor border-none
                                   rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-trash mr-1"></i> Delete
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
    </div>

        <!-------Add sections------>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="add-sections" method="POST">
              @csrf
              @method('PUT')

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="name">Sections Name</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Enter sections Name"
                    />
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-4">
                  <button type="button" class="btn btn-danger w-100" data-dismiss="modal">
                    Cancel
                  </button>
                </div>
                <div class="col-lg-4">
                  <button type="submit" class="btn btn-success w-100">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-------Edit sections------>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="edit-sections" method="POST">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="sections_id" />

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="name">Old Section Name</label>
                    <input
                      type="text"
                      name="name_old"
                      class="form-control"
                      id="sections_old"
                      readonly
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="name">New Section Name</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="sections_name"
                    />
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-4">
                  <button type="button" class="btn btn-danger w-100" data-dismiss="modal">
                    Cancel
                  </button>
                </div>
                <div class="col-lg-4">
                  <button type="submit" class="btn btn-success w-100">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-------delete sections------>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="delete-sections" method="POST">
              @csrf
              @method('PUT')
              <div class="text-center pt-4 pb-4">
                <h4>Are you sure you want to delete?</h4>
              </div>

              <input type="hidden" name="id" id="delete_sections_id" />

              <div class="row justify-content-center">
                <div class="col-lg-4">
                  <button type="button" class="btn btn-success w-100" data-dismiss="modal">
                    No, cancel
                  </button>
                </div>
                <div class="col-lg-4">
                  <button type="submit" class="btn btn-danger w-100">
                    Yes, Delete
                  </button>
                </div>
              </div>
            </form>
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

    <!-- Edit Modal functions -->
    <script>
      $(document).ready(function(){
        $(document).on('click', '.editBtn', function(){
          
          var sections_id = $(this).val();
          console.log(sections_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
        
          $.ajax({
            url: '/get-sections' + sections_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#sections_name').val(response.sections.name);
              $('#sections_old').val(response.sections.name);
              $('#sections_id').val(sections_id);
            }
          });
        });
      });

      $(document).ready(function(){
        $(document).on('click', '.addBtn', function(){
          jQuery.noConflict(); 
          $('#addModal').modal('show');
        });
      });

      $(document).ready(function(){
        $(document).on('click', '.deleteBtn', function(){
          var sections_id = $(this).val();
          jQuery.noConflict(); 
          $('#deleteModal').modal('show');
          $('#delete_sections_id').val(sections_id);
        });
      });
    </script>


  </body>
</html>
