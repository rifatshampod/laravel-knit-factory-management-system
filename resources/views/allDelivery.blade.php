<!DOCTYPE html>
<html lang="en">
  <x-header/>

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
                      <button
                        onclick="location.href='createDelivery.html'"
                        type="button"
                        class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"
                      >
                        <i class="ti-plus"></i>Add Delivery
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
                          <tr>
                            <td>685796</td>
                            <td>Av85796</td>
                            <td>Ocre</td>
                            <td>9-may-2022</td>
                            <td>15-may-2022</td>
                            <td>10</td>
                            <td>3,100</td>
                            <td>10-may-2022</td>
                            <td>175</td>
                            <td>8,000</td>
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
                          <tr>
                            <td>685796</td>
                            <td>Av85796</td>
                            <td>Ocre</td>
                            <td>9-may-2022</td>
                            <td>15-may-2022</td>
                            <td>10</td>
                            <td>3,100</td>
                            <td>10-may-2022</td>
                            <td>175</td>
                            <td>8,000</td>
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
                          <tr>
                            <td>685796</td>
                            <td>Av85796</td>
                            <td>Ocre</td>
                            <td>9-may-2022</td>
                            <td>15-may-2022</td>
                            <td>10</td>
                            <td>3,100</td>
                            <td>10-may-2022</td>
                            <td>175</td>
                            <td>8,000</td>
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
