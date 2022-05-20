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
                  {{-- <div class="d-flex justify-content-end">
                    <div>
                      <button
                        onclick="location.href='createOrder.html'"
                        type="button"
                        class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"
                      >
                        <i class="ti-plus"></i>Add Plan
                      </button>
                    </div>
                  </div> --}}
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
                            <th>Target Day</th>
                            <th>Target Per Day</th>
                            <th>Delivery Date</th>
                            <th>Productio start date</th>
                            <th>Productio End date</th>
                            <th>Section</th>
                            <th>Action name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="orderImg">
                                <img
                                  src="https://media.istockphoto.com/photos/blank-black-tshirt-front-with-clipping-path-picture-id483960103?b=1&k=20&m=483960103&s=170667a&w=0&h=hNKNseCmaThTsh4i7Q3kHETlWo5Zi7Ogw-luVozfP_M="
                                  alt=""
                                />
                              </div>
                            </td>
                            <td>rifat</td>
                            <td>Av85796</td>
                            <td>Ocre</td>
                            <td>Soft Rubber print</td>
                            <td>Front center chest</td>
                            <td>03</td>
                            <td>3,000</td>
                            <td>3,000</td>
                            <td>150</td>
                            <td>3,150</td>
                            <td>2.0</td>
                            <td>1,575</td>
                            <td>9-may-2022</td>
                            <td>9-may-2022</td>
                            <td>9-june-2022</td>
                            <td>Digital</td>
                            <td>
                              <div class="employeeTableIcon">
                              <div class="">
                              <button
                               type="button"
                               class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" data-toggle="modal"
                                  data-target="#editModal"
                                >
                             <i class="ti-plus"></i>Add Plan
                            </button>
                            </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="orderImg">
                                <img
                                  src="https://media.istockphoto.com/photos/blank-black-tshirt-front-with-clipping-path-picture-id483960103?b=1&k=20&m=483960103&s=170667a&w=0&h=hNKNseCmaThTsh4i7Q3kHETlWo5Zi7Ogw-luVozfP_M="
                                  alt=""
                                />
                              </div>
                            </td>
                            <td>685796</td>
                            <td>cxxcc</td>
                            <td>Ocre</td>
                            <td>Soft Rubber print</td>
                            <td>Front center chest</td>
                            <td>03</td>
                            <td>3,000</td>
                            <td>3,000</td>
                            <td>150</td>
                            <td>3,150</td>
                            <td>2.0</td>
                            <td>1,575</td>
                            <td>9-may-2022</td>
                            <td>9-may-2022</td>
                            <td>9-june-2022</td>
                            <td>Digital</td>
                            <td>
                              <div class="employeeTableIcon d-flex">
                                <div
                                  class="Icon1 px-3 py-1 text-white cursor rounded d-flex justify-content-center align-items-center mr-1"
                                  onclick="location.href='profile.html'"
                                  onclick="location.href='profile.html'"
                                >
                                  <i class="ti-eye mr-1"></i>View
                                </div>
                                <div
                                  class="Icon3 px-3 py-1 text-white cursor rounded-3 d-flex justify-content-center align-items-center mr-1"
                                >
                                  <i class="ti-pencil-alt mr-1"></i>Edit
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="orderImg">
                                <img
                                  src="https://media.istockphoto.com/photos/blank-black-tshirt-front-with-clipping-path-picture-id483960103?b=1&k=20&m=483960103&s=170667a&w=0&h=hNKNseCmaThTsh4i7Q3kHETlWo5Zi7Ogw-luVozfP_M="
                                  alt=""
                                />
                              </div>
                            </td>
                            <td>685796</td>
                            <td>Av85796</td>
                            <td>Ocre</td>
                            <td>Soft Rubber print</td>
                            <td>Front center chest</td>
                            <td>03</td>
                            <td>3,000</td>
                            <td>3,000</td>
                            <td>150</td>
                            <td>3,150</td>
                            <td>2.0</td>
                            <td>1,575</td>
                            <td>9-may-2022</td>
                            <td>9-may-2022</td>
                            <td>9-june-2022</td>
                            <td>Digital</td>
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

    <!------- Delete-Modal------>
    <div
      class="modal fade"
      id="deleteModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog rounded" role="document">
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
    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog rounded" role="document">
        <div class="modal-content py-5">
          <div class="text-center">
            <h5 class="">Edit</h5>
          </div>
          <div class="modal-body d-flex justify-content-center">
            <form action="">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Enter email"
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Enter email"
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
  </body>
</html>
