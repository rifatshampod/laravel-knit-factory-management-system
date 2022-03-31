<!DOCTYPE html>
<html lang="en">
  <x-header title="Add Delivery"/>

  <body>
    <x-navigation/>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>Create Delivery</h1>
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
                    <li class="breadcrumb-item active">Create Delivery</li>
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
                  <form action="allDelivery.html">
                    <div class="row justify-content-center">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Style Name</label>
                          <input
                            type="text"
                            class="form-control input-default"
                            placeholder="Style Name"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Order No</label>
                          <input
                            type="text"
                            class="form-control input-default"
                            placeholder="Order No"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Body Color</label>
                          <select class="form-control input-default">
                            <option disabled hidden selected>
                              Select Color
                            </option>
                            <option>Red</option>
                            <option>Blue</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>First Receive Date</label>
                          <input
                            type="date"
                            class="form-control input-default"
                            placeholder=""
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>To Receive Date</label>
                          <input
                            type="date"
                            class="form-control input-default"
                            placeholder=""
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>To Day Delivery</label>
                          <input
                            type="date"
                            class="form-control input-default"
                            placeholder="To Day Delivery"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Total Receive</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Total Receive"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Receive Balance</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Receive Balance"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Total Delivery</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Total Delivery"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Delivery Balance</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Delivery Balance"
                            required
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-3">
                        <button
                          onclick="location.href='allDelivery.html'"
                          type="button"
                          class="btn btn-danger btn-block m-b-10"
                        >
                          Cancel
                        </button>
                      </div>
                      <div class="col-lg-3">
                        <button
                          type="submit"
                          class="btn btn-primary btn-block m-b-10"
                        >
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
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

    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <!-- <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/buttons.flash.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/jszip.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/pdfmake.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/vfs_fonts.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/buttons.html5.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/buttons.print.min.js"></script> -->
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
  </body>
</html>
