<!DOCTYPE html>
<html lang="en">
  <x-header title="Add Order"/>

  <body>
    <x-navigation/>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>Create Order</h1>
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
                    <li class="breadcrumb-item active">Create Order</li>
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
                  <form action="allOrder.html">
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
                          <label>Print Quality</label>
                          <select class="form-control input-default">
                            <option disabled hidden selected>
                              Select Print
                            </option>
                            <option>Soft Rubber print</option>
                            <option>Rubber print</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Parts Name</label>
                          <select class="form-control input-default">
                            <option disabled hidden selected>
                              Select Parts
                            </option>
                            <option>Front center chest</option>
                            <option>Back center</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Print Color</label>
                          <input
                            type="text"
                            class="form-control input-default"
                            placeholder="Print Color"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Color Qty</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Color Qty"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Order Qty</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Order Qty"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Extra 5%</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Extra 5%"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Total Qty</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="Total Qty"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Delivery Date</label>
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
                          <label>Price Dozen</label>
                          <input
                            type="number"
                            class="form-control input-default"
                            placeholder="$"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Merchandiser</label>
                          <input
                            type="text"
                            class="form-control input-default"
                            placeholder="Merchandiser"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Supplier Name</label>
                          <input
                            type="text"
                            class="form-control input-default"
                            placeholder="Supplier Name"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <form>
                          <div class="form-group uploadFile p-4">
                            <label for="exampleFormControlFile1"
                              >Artwork upload</label
                            >
                            <input
                              type="file"
                              class="form-control-file"
                              id="exampleFormControlFile1"
                            />
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-3">
                        <button
                          onclick="location.href='allOrder.html'"
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
