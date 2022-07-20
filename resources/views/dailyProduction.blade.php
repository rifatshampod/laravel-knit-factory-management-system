<!DOCTYPE html>
<html lang="en">
<x-header title="Production Report" />

<body>
  <x-navigation />

  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Production Report</h1>
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
                  <li class="breadcrumb-item active">Production Report</li>
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
                  {{-- <div>
                    <button id="btnExport" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"
                      onclick="exportReportToExcel(this)"><i class="ti-download"></i>EXPORT REPORT</button>
                  </div> --}}
                  <div>
                    <button id="btnExport" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" onclick="printDiv()"><i
                        class="ti-download"></i>Print REPORT</button>
                  </div>
                </div>
                <div class="bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="Table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Style Name</th>
                          <th>Order No</th>
                          <th>Body Color</th>
                          <th>Parts Name</th>
                          <th>Target Per Day</th>
                          <th>Today Prod</th>
                          <th>Total Prod</th>
                          <th>Without Print Balance</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dailylist as $item)
                        <tr>
                          @if($item['production_date']==null)
                          <td> - </td>
                          @else
                          <td>{{\Carbon\Carbon::parse($item['production_date'])->format('d-m-Y')}}</td>
                          @endif
                          <td>{{$item['style']}}</td>
                          <td>{{$item['order_no']}}</td>
                          <td>{{$item['body_color']}}</td>
                          <td>{{$item['parts_name']}}</td>
                          <td>{{$item['targetPerDay']}}</td>
                          <td>{{$item['today_production']}}</td>
                          <td>{{$item['total_production']}}</td>
                          <td>{{$item['balance']}}</td>
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
          <form action="edit-daily-production" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="daily_id" />
            <input type="hidden" id="production_parent" name="production_parent">

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="production_date_before">Entry Date: </label>
                  <input class="form-control" type="date" id="production_date_before" name="production_date">
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_production_before">Today Before</label>
                  <input type="number" name="today_before" class="form-control" id="today_production_before"
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
                  <label for="total_production_before">Total Before</label>
                  <input type="number" name="total_production_before" class="form-control" id="total_production_before" placeholder="Enter target amount"
                    readonly />
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_now">Total Now</label>
                  <input type="number" name="total_now" class="form-control" id="total_now"
                     placeholder="Total Production" readonly />
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
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

  <script>
    function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `daily-production.xlsx`, // fileName you could use any name
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
          
          var prod_daily_id = $(this).val();
          console.log(prod_daily_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-daily' + prod_daily_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#today_production_before').val(response.production2.today_production);
              $('#total_production_before').val(response.production2.total_production);
              $('#balance_before').val(response.production2.balance);
              $('#production_parent').val(response.production2.production_id);
              $('#production_date_before').val(response.production2.production_date);
              $('#daily_id').val(prod_daily_id);
            }
          });
        });
      });
  </script>

  <script>  
      function printDiv(){
          var divToPrint = document.getElementById("Table");
          var htmlToPrint ="" +'<style type="text/css">' +"table th, table td {"+"border:1px solid #000;"+"padding;0.5em;"+"}"+" img{"+"height:50px;"+" width:50px;"+"}"+"</style>";
          htmlToPrint += divToPrint.outerHTML;
          newWin = window.open("");
          newWin.document.write(htmlToPrint);
          newWin.print();
          newWin.close();
          }

          //---find balance daily
      function findBalanceDaily(){
        console.log(document.getElementById("today_production_before").value);
        const todayBefore = parseInt(document.getElementById("today_production_before").value);
        const totalBefore = parseInt(document.getElementById("total_production_before").value);
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