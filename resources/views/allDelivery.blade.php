<!DOCTYPE html>
<html lang="en">
<x-header title="All Delivery" />

<body>
  <x-navigation />

  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>All Receive/Delivery</h1>
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
                  <li class="breadcrumb-item active">All Data</li>
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
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Style Name</th>
                          <th>Order No</th>
                          <th>Body Color</th>
                          <th>First Receive Date</th>
                          <th>Today Receive</th>
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
                          <td>{{$item['total_order'] - $item['total_receive']}}</td>
                          <td>{{$item['today_delivery']}}</td>
                          <td>{{$item['total_delivery']}}</td>
                          <td>{{$item['delivery_balance']}}</td>
                          <td>
                            @if($item['status']==0)
                            <div class="employeeTableIcon d-flex">
                              <button value="{{$item['id']}}" type="button"
                                class="btn editBtn btn-primary btn-flat btn-addon m-b-10 m-l-5">
                                <i class="ti-plus"></i>Start Delivery
                              </button>
                            </div>
                            @else
                            <div class="employeeTableIcon d-flex">
                              <button value="{{$item['id']}}"
                                class="Icon1 receiveBtn px-3 py-1 text-white cursor rounded d-flex border-none justify-content-center align-items-center mr-1">
                                <i class="ti-eye mr-1"></i> Receive
                              </button>

                              @if($item['delivery_status']==1)
                              <button value="{{$item['id']}}"
                                class="Icon3 deliveryBtn px-3 py-1 text-white cursor rounded d-flex border-none justify-content-center align-items-center mr-1">
                                <i class="ti-pencil-alt mr-1"></i> Deliver
                              </button>

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
                  <input type="date" name="first_receive" class="form-control" id="first_receive"
                    placeholder="Enter first Receive" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_receive">Today Receive</label>
                  <input type="number" name="today_receive" class="form-control" id="today_receive"
                    placeholder="Today Receive" />
                </div>
              </div>
              {{-- <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_receive">Total Receive</label>
                  <input type="number" name="total_receive" class="form-control" id="total_receive" />
                </div>
              </div> --}}
              {{-- <div class="col-lg-6">
                <div class="form-group">
                  <label for="receive_balance">Receive Balance </label>
                  <input type="number" name="receive_balance" class="form-control" id="receive_balance" />
                </div>
              </div> --}}
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
                  <input type="number" name="today_receive" class="form-control" id="today_receive"
                    placeholder="Today Receive" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="receive_date">Receive Date</label>
                  <input type="date" name="receive_date" class="form-control" id="receive_date" />
                </div>
              </div>
              {{-- <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_receive">Total Receive</label>
                  <input type="number" name="total_receive" class="form-control" id="total_receive" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="receive_balance">Receive Balance </label>
                  <input type="number" name="receive_balance" class="form-control" id="receive_balance" />
                </div>
              </div> --}}
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

  <!-------Deliver-Modal------>
  <div class="modal fade" id="deliveryModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="add-delivery" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="main_delivery_id" />

            <div class="row">

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="total_production">Total Receive</label>
                  <input type="number" name="total_production" class="form-control" id="total_production"
                    placeholder="Total Production" Readonly />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="total_delivery">Total Delivery Before</label>
                  <input type="number" name="total_delivery_before" class="form-control" id="total_delivery_before"
                    placeholder="Total Delivery Before" Readonly />
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_delivery">Today Delivery</label>
                  <input type="number" name="today_delivery" class="form-control" id="today_delivery"
                    placeholder="Today Delivery" onblur="fBalanceDaily()" />
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="total_delivery_completed">Total Delivery</label>
                  <input type="number" name="total_delivery" class="form-control" id="total_delivery_completed"
                    placeholder="Total Delivery" Readonly />
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="delivery_balance">Delivery Balance </label>
                  <input type="number" name="delivery_balance" class="form-control" id="delivery_balance" readonly />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="receive_date">Delivery Date</label>
                  <input type="date" name="delivery_date" class="form-control" id="delivery_date" />
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
          name: `all-receive-delivery.xlsx`, // fileName you could use any name
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

      //receive modal function

      $(document).ready(function(){
        $(document).on('click', '.receiveBtn', function(){
          
          var receive_id = $(this).val();
          console.log(receive_id);
          jQuery.noConflict(); 
          $('#receiveModal').modal('show');
          $('#receive_id').val(receive_id);
         
        });
      });

      //delivery modal function

      $(document).ready(function(){
        $(document).on('click', '.deliveryBtn', function(){
          
          var delivery_id = $(this).val();
          console.log(delivery_id);
          jQuery.noConflict(); 
          $('#deliveryModal').modal('show');
          $.ajax({
            url: '/fetch-delivery' + delivery_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#total_production').val(response.delivery.total_receive); 
              $('#total_delivery_before').val(response.delivery.total_delivery);
              $('#main_delivery_id').val(delivery_id);
            }
          });
          
         
        });
      });

      //---find delivery total & balance 
      function fBalanceDaily(){
        const todayProduction = parseInt(document.getElementById("total_production").value);
        const totalBefore = parseInt(document.getElementById("total_delivery_before").value);
        const today = parseInt(document.getElementById("today_delivery").value);

        const total = totalBefore + today;
        const balance = todayProduction - total;
        document.getElementById("total_delivery_completed").value = total;
        document.getElementById("delivery_balance").value = balance;
        console.log(total);
      }
  </script>


</body>

</html>