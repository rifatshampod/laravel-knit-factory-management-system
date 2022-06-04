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
                  <div class="d-flex justify-content-end">
                    <div>
                      <button id="btnExport" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" 
                      onclick="exportReportToExcel(this)"><i class="ti-download"></i>EXPORT REPORT</button>
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
                            <th>Date</th>
                            <th>Style Name</th>
                            <th>Order No</th>
                            <th>Body Color</th>
                            <th>Today Receive</th>
                            {{-- <th>Total Receive</th>
                            <th>Receive Balance</th> --}}
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($deliverylist as $item)
                              <tr>
                            <td>{{$item['created_at']->format('Y-m-d')}}</td>
                            <td>{{$item['style']}}</td>
                            <td>{{$item['order_no']}}</td>
                            <td>{{$item['body_color']}}</td>
                            <td>{{$item['receive_today']}}</td>
                            {{-- <td>{{$item['receive_total']}}</td>
                            <td>{{$item['receive_balance']}}</td> --}}
                            <td>
                              
                                <div class="employeeTableIcon d-flex">
                                  <!--
                                <button
                                value="{{$item['id']}}"
                                  class="Icon1 receiveBtn px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-eye mr-1"></i> Receive
                                </button>  -->
                                
                                <div
                                  class="Icon3 px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt mr-1"></i> Edit
                                </div> 
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

        <!-------Start-Modal------>
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="start-receive" method="POST">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="delivery_id" />
              <input type="hidden" name="order_id" id="order_id" />

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="first_receive">First Receive Date</label>
                    <input
                      type="date"
                      name="first_receive"
                      class="form-control"
                      id="first_receive"
                      placeholder="Enter first Receive"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="today_receive">Today Receive</label>
                    <input
                      type="number"
                      name="today_receive"
                      class="form-control"
                      id="today_receive"
                      placeholder="Today Receive"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="total_receive">Total Receive</label>
                    <input
                      type="number"
                      name="total_receive"
                      class="form-control"
                      id="total_receive"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="receive_balance">Receive Balance </label>
                    <input
                      type="number"
                      name="receive_balance"
                      class="form-control"
                      id="receive_balance"
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

        <!-------Receive-Modal------>
    <div class="modal fade" id="receiveModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="add-receive" method="POST">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="receive_id" />

              <div class="row">
                
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="today_receive">Today Receive</label>
                    <input
                      type="number"
                      name="today_receive"
                      class="form-control"
                      id="today_receive"
                      placeholder="Today Receive"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="total_receive">Total Receive</label>
                    <input
                      type="number"
                      name="total_receive"
                      class="form-control"
                      id="total_receive"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="receive_balance">Receive Balance </label>
                    <input
                      type="number"
                      name="receive_balance"
                      class="form-control"
                      id="receive_balance"
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
        <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <script>
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `daily-receive.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

    <!-- Edit Modal functions -->
    <script>
      $(document).ready(function(){
        $(document).on('click', '.editBtn', function(){
          
          var delivery_id = $(this).val();
          console.log(delivery_id);
          jQuery.noConflict(); 
          $('#startModal').modal('show');
          $.ajax({
            url: '/edit-delivery' + delivery_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#first_receive').val(response.delivery.first_receive);
              $('#today_receive').val(response.delivery.today_receive);
              $('#total_receive').val(response.delivery.total_receive);
              $('#receive_balance').val(response.delivery.receive_balance);
              $('#order_id').val(response.delivery.order_id);
              $('#delivery_id').val(delivery_id);
            }
          });
        });
      });

      $(document).ready(function(){
        $(document).on('click', '.receiveBtn', function(){
          
          var receive_id = $(this).val();
          console.log(receive_id);
          jQuery.noConflict(); 
          $('#receiveModal').modal('show');
          $('#receive_id').val(receive_id);
         
        });
      });
    </script>


  </body>
</html>
