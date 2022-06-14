<!DOCTYPE html>
<html lang="en">
<x-header title="All Plan" />

<body>
  <x-navigation />

  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>All Allocation</h1>
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
                  <li class="breadcrumb-item active">Plan</li>
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
                    <div class="mr-2">
                      <span>Sort By Each Section</span>
                    </div>
                    <div class="dropdown">
                      <button class="btn dropDownBtn dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Section From List
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($sectionlist as $item)
                        <a class="dropdown-item"
                          href="allocation-report&&section={{$item['name']}}">{{$item['name']}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
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
                          <th>Artwork</th>
                          <th>Style Name</th>
                          <th>Order No</th>
                          <th>Body Color</th>
                          <th>Print Quality</th>
                          <th>Parts Name</th>
                          <th>Print Color</th>
                          <th>Color Qty</th>
                          <th>Order Qty</th>
                          <th>Extra 5%</th>
                          <th>Total Qty</th>
                          <th>Target Day</th>
                          <th>Target Per Day</th>
                          <th>Delivery Date</th>
                          <th>Productio start date</th>
                          <th>Productio End date</th>
                          <th>Allocation</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($planlist as $item)
                        <tr>
                          <td>
                            <div class="orderImg">
                              <img src="{{$item['artwork']}}" alt="" />
                            </div>
                          </td>
                          <td>{{$item['style']}}</td>
                          <td>{{$item['order_no']}}</td>
                          <td>{{$item['body_color']}}</td>
                          <td>{{$item['print_quality']}}</td>
                          <td>{{$item['parts_name']}}</td>
                          <td>{{$item['print_color']}}</td>
                          <td>{{$item['color_qty']}}</td>
                          <td>{{$item['order_qty']}}</td>
                          <td>{{$item['extra_qty']}}</td>
                          <td>{{$item['total_qty']}}</td>
                          <td>{{$item['target_day']}}</td>
                          <td>{{$item['target_perday']}}</td>
                          <td>{{$item['delivery_date']}}</td>
                          <td>{{$item['production_start']}}</td>
                          <td>{{$item['production_end']}}</td>
                          <td>{{$item['section']}}</td>
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
          name: `all-plan.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
  </script>
</body>

</html>