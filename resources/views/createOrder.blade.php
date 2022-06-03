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
              <form action="add-order" method="post" enctype="multipart/form-data">
              <div class="col-lg-12">
                <div class="card">
                  
                    @csrf
                    <div class="row justify-content-center">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Style Name</label>
                          <input
                            type="text"
                            name="style"
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
                            name="orderNo"
                            class="form-control input-default"
                            placeholder="Order No"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Body Color</label>
                          <select class="form-control input-default" name="bodyColor" onchange="showfield(this.options[this.selectedIndex].value)">
                            <option disabled hidden selected>
                              Select Color
                            </option>
                            @foreach ($bodycolorlist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach 
                            <option value="Other">Other, Please Specify</option>
                          </select>
                          <div id="div1"></div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Print Quality</label>
                          <select class="form-control input-default" name="printQuality">
                            <option disabled hidden selected>
                              Select Print Quality
                            </option>
                            @foreach ($qualitylist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Parts Name</label>
                          <select class="form-control input-default" name="partsName">
                            <option disabled hidden selected>
                              Select Parts Name
                            </option>
                            @foreach ($partslist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Print Color</label>
                          <input
                            type="text"
                            name="printColor"
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
                            name="colorQty"
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
                            id="orderQty"
                            type="number"
                            name="orderQty"
                            class="form-control input-default"
                            placeholder="Order Qty"
                            required
                            onchange="qtyCal()"
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Extra 5%</label>
                          <input
                            id="orderExtra"
                            type="number"
                            name="extraQty"
                            class="form-control input-default"
                            placeholder="Extra 5%"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Total Qty</label>
                          <input
                            id="totalQty"
                            type="number"
                            name="totalQty"
                            class="form-control input-default"
                            placeholder="Total Qty"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Delivery Date</label>
                          <input
                            type="date"
                            name="deliveryDate"
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
                            name="priceDozen"
                            step="0.01"
                            class="form-control input-default"
                            placeholder="$"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Merchandiser</label>
                          <select class="form-control input-default" name="merchandiser">
                            <option disabled hidden selected>
                              Select Merchandiser
                            </option>
                            @foreach ($merchandiserlist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach                        
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Supplier Name</label>
                          <select class="form-control input-default" name="supplier">
                            <option disabled hidden selected>
                              Select Supplier
                            </option>
                            @foreach ($supplierlist as $item)
                                <option>{{$item['name']}}</option>
                            @endforeach   
                          </select>
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
                              name="artwork"
                              class="form-control-file"
                              id="exampleFormControlFile1"
                            />
                          </div>
                        
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

    <script type="text/javascript">
      function showfield(name){
        if(name == 'Other') {
          document.getElementById('div1').innerHTML = 'Other Bodycolor: <input class="form-control input-default" type="text" name="other" />';
        }
        else {
          document.getElementById('div1').innerHTML='';
        }	
      }
  </script>
  </body>
</html>
