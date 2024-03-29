<!DOCTYPE html>
<html lang="en">
  <x-header title="All Plan"/>

  <body>
    <x-navigation/>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>All Plan</h1>
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
                            <th>Artwork</th>
                            <th>Style Name</th>
                            <th>Order No</th>
                            <th>Body Color</th>
                            <th>Print Quality</th>
                            <th>Parts Name</th>
                            <th>P.C.</th>
                            <th>Color Qty</th>
                            <th>Order Qty</th>
                            <th>Extra 5%</th>
                            <th>Total Qty</th>
                            <th>Target Day</th>
                            <th>Target Per Day</th>
                            <th>Delivery Date</th>
                            <th>Production start date</th>
                            <th>Production End date</th>
                            <th>Section</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($planlist as $item)
                              <tr>
                            <td>
                              <div class="orderImg">
                                <img
                                  src="{{$item['artwork']}}"
                                  alt=""
                                />
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
                            <td>{{round($item['extra_qty'])}}</td>
                            <td>{{round($item['total_qty'])}}</td>
                            <td>{{$item['target_day']}}</td>
                            <td>{{$item['target_perday']}}</td>
                            <td>{{\Carbon\Carbon::parse($item['delivery_date'])->format('d-M-y')}}</td>
                            <td>{{\Carbon\Carbon::parse($item['production_start'])->format('d-M-y')}}</td>
                            <td>{{\Carbon\Carbon::parse($item['production_end'])->format('d-M-y')}}</td>
                            <td>{{$item['section']}}</td>
                            <td>
                              @if($item['status']==0)
                                <div class="employeeTableIcon">
                                  <div class="">
                                    <button
                                    value="{{$item['id']}}"
                                    class="btn startBtn btn-primary btn-flat btn-addon m-b-10 m-l-5">
                                      <i class="ti-plus"></i>Add Plan
                                    </button>
                                  </div>
                                </div>
                              @else
                                <div class="employeeTableIcon d-flex">
                                <button
                                value="{{$item['id']}}"
                                  class="Icon3 editBtn px-3 py-1 text-white cursor border-none rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt mr-1"></i>Edit
                              </button>
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

    <!------- Delete-Modal------>
    <div
      class="modal fade"
      id="deleteModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog rounded">
        <div class="modal-content py-5">
          <div class="text-center">
            <h5 class="">Are You Sure want to delete?</h5>
          </div>
          <div class="modal-body d-flex justify-content-center">
            <button
              type="button"
              class="btn btn-danger mx-1"
              data-dismiss="modal"
            >
              Yes
            </button>
            <button type="button" class="btn btn-success mx-1" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>

    <!-------edit-Modal------>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
            <form action="update-plan" method="POST">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="plan_id" />
              <input type="hidden" name="order_id" id="order_id" />

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="section">Total Order Quantity</label>
                    <input
                      type="text"
                      name="total_qty"
                      class="form-control"
                      id="total_qty"
                      placeholder="Section"
                      readonly
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
                      placeholder="Target Per Day" onblur="targetDay()"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="target_day">Target Days</label>
                    <input
                      type="number"
                      name="target_day"
                      class="form-control"
                      id="target_day"
                      placeholder="Enter number of days"
                      readonly
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
                    <select class="form-control input-default" name="section">
                            <option disabled hidden selected>
                              Select Section
                            </option>
                            @foreach ($sectionlist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach   
                          </select>
                    {{-- <input
                      type="text"
                      
                      class="form-control"
                      id="section"
                      placeholder="Section"
                    /> --}}
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
          name: `all-plan.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

    <!-- Edit Modal functions -->
    <script>
      $(document).ready(function(){
        $(document).on('click', '.startBtn', function(){ 
          var plan_id = $(this).val();
          console.log(plan_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-plan' + plan_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#total_qty').val(response.plan.total_qty);
              $('#order_id').val(response.plan.order_id);
              $('#plan_id').val(plan_id);
            }
          });
        });

        $(document).on('click', '.editBtn', function(){ 
          var plan_id2 = $(this).val();
          console.log(plan_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-plan' + plan_id2,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#total_qty').val(response.plan.total_qty);
              $('#target_perday').val(response.plan.target_perday);
              $('#target_day').val(response.plan.target_day);
              $('#production_start').val(response.plan.production_start);
              $('#production_end').val(response.plan.production_end);
              $('#plan_id').val(plan_id2);
            }
          });
        });
      });


      function targetDay(){
        const totalQty = document.getElementById("total_qty").value;
        const targetPerDay = document.getElementById("target_perday").value;
        const targetDay = totalQty / targetPerDay ;
        document.getElementById("target_day").value = Math.ceil(targetDay) ;
      }

      //---------date calculation
      /*
        function add_bus_days(date, busDays) { // add business days to a date
                var wkdy = date.getDay(); // get weekday number
                var addDays = wkdy >= 3 ? (busDays + 2) : busDays; // if it's wednesday or later set add days to 5 instead of 3 to account for the weekend
                date.setDate(date.getDate() + addDays); // add days to current date
                return date
            }
        // usage
        var dt = new Date(); // get date
        newDate = add_bus_days(dt, 3) // add 3 business days
        */
      //---------date calculation ends
    </script>

   
  </body>
</html>
