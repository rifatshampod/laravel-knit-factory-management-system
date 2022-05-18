<!DOCTYPE html>
<html lang="en">
  <x-header title="All Order"/>

  <body>
    <x-navigation/>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>All Order</h1>
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
                    <li class="breadcrumb-item active">Order</li>
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
                      <button
                        onclick="location.href='create-order'"
                        type="button"
                        class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"
                      >
                        <i class="ti-plus"></i>Add Order
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
                            <th>Delivery Date</th>
                            <th>Merchandiser</th>
                            <th>Price Dozen</th>
                            <th>Supplier Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($orderlist as $item)
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
                            <td>{{$item['extra_qty']}}</td>
                            <td>{{$item['total_qty']}}</td>
                            <td>{{$item['delivery_date']}}</td>
                            <td>{{$item['merchandiser']}}</td>
                            <td>{{$item['price_dozen']}}</td>
                            <td>{{$item['supplier']}}</td>
                            <td>
                              <div class="employeeTableIcon d-flex">
                                <div
                                  class="employeeTableIconDiv Icon1 d-flex justify-content-center align-items-center mr-1"
                                  onclick="location.href='profile.html'"
                                  onclick="location.href='profile.html'"
                                >
                                  <i class="ti-eye"></i>
                                </div>
                                <div
                                  class="employeeTableIconDiv Icon2 d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-trash"></i>
                                </div>
                                <div
                                  class="employeeTableIconDiv Icon3 d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt"></i>
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
  </body>
</html>
