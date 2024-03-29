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
                <div class="d-flex justify-content-between mb-4">
                  <div class="d-flex align-items-center">

                                        <form method="post" action="date-production-report">

                                            @csrf
                                            <div class="form-group">
                                                <label>Date From</label>
                                                <input type="date" name="start" />

                                                <label>Date To</label>
                                                <input type="date" name="end" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="px-4 py-2">Find All Production </button></div>
                                        </form>
                                    </div>
                  <div>
                    <button id="btnExport" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" onclick="printDiv()"><i
                        class="ti-download"></i>Print REPORT</button>
                  </div>
                </div>
                <div class="bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Artwork</th>
                          <th>Style Name</th>
                          <th>Order No</th>
                          <th>Body Color</th>
                          <th>Parts Name</th>
                          <th>Total Qty</th>
                          <th>T. P. Day</th>
                          <th>Today Prod</th>
                          <th>Total Prod</th>
                          <th>W. P. Balance</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dailylist as $item)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($item['production_date'])->format('d-M-y')}}</td>
                          <td>
                            <div class="orderImg">
                              <img src="{{$item['artwork']}}" alt="" />
                            </div>
                          </td>
                          <td>{{$item['style']}}</td>
                          <td>{{$item['order_no']}}</td>
                          <td>{{$item['body_color']}}</td>
                          <td>{{$item['parts_name']}}</td>
                          <td>{{$item['total']}}</td>
                          <td>{{$item['targetPerDay']}}</td>
                          <td>{{$item['today_production']}}</td>
                          <td>{{round($item['total_production'])}}</td>
                          <td>{{$item['balance']}}</td>
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
          <form action="update-production" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="production_id" />

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="target_day">Inhand</label>
                  <input type="number" name="inhand" class="form-control" id="inhand"
                    placeholder="Enter inhand amount" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="today_production">Today Production</label>
                  <input type="number" name="today_production" class="form-control" id="today_production"
                    placeholder="Today Production amount" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_production">Total Production</label>
                  <input type="number" name="total_production" class="form-control" id="total_production" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="balance">Without Print Balance</label>
                  <input type="number" name="balance" class="form-control" id="balance" />
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

  <!-------Today Production Modal------>
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="add-production" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="daily_id" />

            <div class="row">

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="today_production">Today Production</label>
                  <input type="number" name="today_production" class="form-control" id="today_production"
                    placeholder="Today Production" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="total_production">Total Production</label>
                  <input type="number" name="total_production" class="form-control" id="total_production" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="balance">Without Print Balance </label>
                  <input type="number" name="balance" class="form-control" id="balance" />
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

  <script>
  
      function printDiv(){
          var divToPrint = document.getElementById("bootstrap-data-table-export");
          var htmlToPrint ="" +'<style type="text/css">' +"table th, table td {"+"border:1px solid #000;"+"padding;0.5em;"+"}"+" img{"+"height:50px;"+" width:50px;"+"}"+"</style>";
          htmlToPrint += divToPrint.outerHTML;
          newWin = window.open("");
          newWin.document.write(htmlToPrint);
          newWin.print();
          newWin.close();
          }
  
  </script>
</body>

</html>