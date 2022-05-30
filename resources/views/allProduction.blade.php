<!DOCTYPE html>
<html lang="en">
  <x-header title="Production Report"/>

  <body>
    <x-navigation/>

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
                            <th>Print Color</th>
                            <th>Total Qty</th>
                            <th>Target Per Day</th>
                            <th>Inhand</th>
                            <th>Today Prod</th>
                            <th>Total Prod</th>
                            <th>Without Print Balance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($productionlist as $item)
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
                            <td>{{$item['total_qty']}}</td>
                            <td>{{$item['target_perday']}}</td>
                            <td>{{$item['inhand']}}</td>
                            <td>{{$item['today_production']}}</td>
                            <td>{{$item['total_production']}}</td>
                            <td>{{$item['balance']}}</td>
                            <td>
                              @if($item['productionStatus']==0)
                                <div class="employeeTableIcon">
                                  <div class="">
                                    <button
                                    value="{{$item['id']}}"
                                    class="btn editBtn btn-primary btn-flat btn-addon m-b-10 m-l-5">
                                      <i class="ti-plus"></i>Add Production
                                    </button>
                                  </div>
                                </div>
                              @else
                                <div class="employeeTableIcon d-flex">
                                <button
                                value="{{$item['id']}}"
                                  class="Icon1 dailyBtn px-3 py-1 text-white border-none cursor rounded d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-plus mr-1"></i>Add Today
                                </button>
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
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="target_day">Target Per Day</label>
                    <input
                      type="number"
                      name="target"
                      class="form-control"
                      id="target"
                      placeholder="Enter target amount"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="today_production">Today Production</label>
                    <input
                      type="number"
                      name="today_production"
                      class="form-control"
                      id="today_production" onblur="findBalance()"
                      placeholder="Today Production amount"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="balance">Without Print Balance</label>
                    <input
                      type="number"
                      name="balance"
                      class="form-control"
                      id="balance" 
                      readonly
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
                    <input
                      type="number"
                      name="today_production"
                      class="form-control"
                      id="today_production"
                      placeholder="Today Production"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="total_production">Total Production</label>
                    <input
                      type="number"
                      name="total_production"
                      class="form-control"
                      id="total_production"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="balance">Without Print Balance </label>
                    <input
                      type="number"
                      name="balance"
                      class="form-control"
                      id="balance"
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

        //production start
        $(document).on('click', '.editBtn', function(){
          var production_id = $(this).val();
          console.log(production_id);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-production' + production_id,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#target').val(response.production.target_perday);
              $('#today_production').val(response.production.today_production);
              $('#total_production').val(response.production.total_production);
              $('#balance').val(response.production.balance);
              $('#production_id').val(production_id);
            }
          });
        });
      });

      //daily production
      $(document).ready(function(){
        $(document).on('click', '.dailyBtn', function(){
          var daily_id = $(this).val();
          console.log(daily_id);
          jQuery.noConflict(); 
          $('#addModal').modal('show');
          $('#daily_id').val(daily_id);
         
        });
      });

      //---find balance
      function findBalance(){
        const todayProduction = document.getElementById("today_production").value;
        const target = document.getElementById("target").value;
        const balance = todayProduction - target;
        document.getElementById("balance").value = balance;
      }
    </script>
  </body>
</html>
