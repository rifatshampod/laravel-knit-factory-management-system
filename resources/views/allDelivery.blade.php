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
                  <h1>All Delivery</h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">All Delivery</li>
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
                <div class="card">
                  {{-- <div class="d-flex justify-content-end">
                    <div>
                      <button
                        onclick="location.href='createDelivery.html'"
                        type="button"
                        class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"
                      >
                        <i class="ti-plus"></i>Add Delivery
                      </button>
                    </div>
                  </div> --}}
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table
                        id="bootstrap-data-table-export"
                        class="table table-striped table-bordered"
                      >
                        <thead>
                          <tr>
                            <th>Style Name</th>
                            <th>Order No</th>
                            <th>Body Color</th>
                            <th>First Receive Date</th>
                            <th>To Receive Date</th>
                            <th>Total Receive</th>
                            <th>Receive Balance</th>
                            <th>To Day Delivery</th>
                            <th>Total Delivery</th>
                            <th>Delivery Balance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($deliverylist as $item)
                              <tr>
                            <td>{{$item['style']}}</td>
                            <td>{{$item['order_no']}}</td>
                            <td>{{$item['body_color']}}</td>
                            <td>{{$item['first_receive']}}</td>
                            <td>{{$item['today_receive']}}</td>
                            <td>{{$item['total_receive']}}</td>
                            <td>{{$item['receive_balance']}}</td>
                            <td>{{$item['today_delivery']}}</td>
                            <td>{{$item['total_delivery']}}</td>
                            <td>{{$item['delivery_balance']}}</td>
                            <td>
                              @if($item['status']==0)
                                <div class="employeeTableIcon d-flex">
                                  <button
                                    onclick="location.href='createDelivery.html'"
                                    type="button"
                                    class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"
                                  >
                                    <i class="ti-plus"></i>Add Delivery
                                  </button>
                                </div>
                              @else
                                <div class="employeeTableIcon d-flex">
                                <div
                                  class="Icon1 px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                  onclick="location.href='profile.html'"
                                  onclick="location.href='profile.html'"
                                >
                                  <i class="ti-eye mr-1"></i> Receive
                                </div>
                                @if($item['delivery_status']==1)
                                <div
                                  class="Icon3 px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt mr-1"></i> Deliver
                                </div>

                                @endif
                              </div>
                              @endif
                              
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

        <!-------edit-Modal------>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="add-receive" method="POST">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="plan_id" />

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="target_day">Target Day</label>
                    <input
                      type="number"
                      name="target_day"
                      class="form-control"
                      id="target_day"
                      placeholder="Enter number of days"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="target_perday">Target Per Day</label>
                    <input
                      type="number"
                      name="target_perday"
                      class="form-control"
                      id="target_perday"
                      placeholder="Target Per Day"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="production_start">Production Start</label>
                    <input
                      type="date"
                      name="production_start"
                      class="form-control"
                      id="production_start"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="production_end">Production End</label>
                    <input
                      type="date"
                      name="production_end"
                      class="form-control"
                      id="production_end"
                    />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="section">Section</label>
                    <input
                      type="text"
                      name="section"
                      class="form-control"
                      id="section"
                      placeholder="Section"
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
          
          var plan_id = $(this).val();
          console.log(plan_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-plan' + plan_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#target_day').val(response.plan.target_day);
              $('#target_perday').val(response.plan.target_perday);
              $('#production_start').val(response.plan.production_start);
              $('#production_end').val(response.plan.production_end);
              $('#section').val(response.plan.section);
              $('#plan_id').val(plan_id);
            }
          });
        });
      });
    </script>


  </body>
</html>
