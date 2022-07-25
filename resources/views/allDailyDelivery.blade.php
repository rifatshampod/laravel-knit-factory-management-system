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
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Style Name</th>
                          <th>Order No</th>
                          <th>Body Color</th>
                          <th>Parts Name</th>
                          <th>Today Delivery</th>
                          <th>Total Delivery</th>
                          <th>Delivery Balance</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($deliverylist as $item)
                        <tr>
                          @if($item['delivery_date']==null)
                          <td> - </td>
                          @else
                          <td>{{\Carbon\Carbon::parse($item['delivery_date'])->format('d-M-y')}}</td>
                          @endif
                          <td>{{$item['style']}}</td>
                          <td>{{$item['order_no']}}</td>
                          <td>{{$item['body_color']}}</td>
                          <td>{{$item['parts_name']}}</td>
                          <td>{{$item['delivery_today']}}</td>
                          <td>{{$item['delivery_total']}}</td>
                          <td>{{$item['delivery_balance']}}</td>
                          <td>

                            <div class="employeeTableIcon d-flex">
                              <button value="{{$item['id']}}"
                                class="Icon3 editBtn px-3 py-1 text-white cursor border-none rounded d-flex justify-content-center align-items-center mr-1">
                                <i class="ti-pencil-alt mr-1"></i>Edit
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

  <!-------edit-Modal------>
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="edit-daily-delivery" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="daily_id" />
            <input type="hidden" id="delivery_parent" name="delivery_parent">

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="delivery_date_before">Entry Date: </label>
                  <input class="form-control" type="date" id="delivery_date_before" name="delivery_date">
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_delivery_before">Today Before</label>
                  <input type="number" name="today_before" class="form-control" id="today_delivery_before"
                     readonly />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_now">Today Now</label>
                  <input type="number" name="today_now" class="form-control" id="today_now" onblur="findBalanceDaily()" required/>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_delivery_before">Total Before</label>
                  <input type="number" name="total_delivery_before" class="form-control" id="total_delivery_before" placeholder="Enter target amount"
                    readonly />
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_now">Total Now</label>
                  <input type="number" name="total_now" class="form-control" id="total_now"
                     placeholder="Total delivery" readonly />
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="balance_before">Balance Before </label>
                  <input type="number" name="balance_before" class="form-control" id="balance_before" readonly />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="balance_now">Balance Now </label>
                  <input type="number" name="balance_now" class="form-control" id="balance_now" readonly />
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
          
          var delivery_id = $(this).val();
          console.log(delivery_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-single-delivery' + delivery_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#today_delivery_before').val(response.delivery.delivery_today);
              $('#total_delivery_before').val(response.delivery.delivery_total);
              $('#balance_before').val(response.delivery.delivery_balance);
              $('#delivery_parent').val(response.delivery.delivery_id);
              $('#delivery_date_before').val(response.delivery.delivery_date);
              $('#daily_id').val(delivery_id);
            }
          });
        });
      });

  </script>

    <script>
        //---find balance daily
      function findBalanceDaily(){
        console.log(document.getElementById("today_delivery_before").value);
        const todayBefore = parseInt(document.getElementById("today_delivery_before").value);
        const totalBefore = parseInt(document.getElementById("total_delivery_before").value);
        const balanceBefore = parseInt(document.getElementById("balance_before").value);
        const todayNow = parseInt(document.getElementById("today_now").value);
        const balance = balanceBefore + todayBefore - todayNow;
        const totalYet = totalBefore - todayBefore + todayNow;
        document.getElementById("total_now").value = totalYet;
        document.getElementById("balance_now").value = balance;
      }
  </script>


</body>

</html>