<!DOCTYPE html>
<html lang="en">
<x-header title="All Order" />

<body>
  <x-navigation />

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
                    <button id="btnExport" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"
                      onclick="exportReportToExcel(this)"><i class="ti-download"></i>EXPORT REPORT</button>
                  </div>
                  <div>
                    <button onclick="location.href='create-order'" type="button"
                      class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">
                      <i class="ti-plus"></i>ADD ORDER
                    </button>
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
                          <td>{{round($item['extra_qty'],2)}}</td>
                          <td>{{$item['total_qty']}}</td>
                          <td>{{$item['delivery_date']}}</td>
                          <td>{{$item['merchandiser']}}</td>
                          <td>{{$item['price_dozen']}}</td>
                          <td>{{$item['supplier']}}</td>
                          <td>
                            <div class="employeeTableIcon d-flex">
                              <button value="{{$item['id']}}"
                                class="employeeTableIconDiv bg-success colorBtn Icon3 border-none d-flex justify-content-center align-items-center mr-1"
                                data-toggle="tooltip" data-placement="top" title="New Body Color/ Color Quantity">
                                <i class="ti-palette"></i>
                              </button>
                              <button value="{{$item['id']}}"
                                class="employeeTableIconDiv bg-warning editBtn Icon3 border-none d-flex justify-content-center align-items-center mr-1"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="ti-pencil"></i>
                              </button>
                              <button value="{{$item['id']}}"
                                class="employeeTableIconDiv bg-danger deleteBtn Icon3 border-none d-flex justify-content-center align-items-center mr-1"
                                data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="ti-trash"></i>
                              </button>
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

  <!-------edit-Modal------>
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update-order" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="order_id" id="order_id_previous" />

            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="style_name">Style Name</label>
                  <input type="text" name="style" class="form-control" id="style_name" placeholder="style name" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="order_no">Order No</label>
                  <input type="text" name="orderNo" class="form-control" id="order_no" placeholder="Order No" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="body_color">Body Color</label>
                  <select class="form-control input-default" id="body_color" name="bodyColor"
                    onchange="showfield(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Color
                    </option>
                    @foreach ($bodycolorlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div1"></div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="print_quality">Print Quality</label>
                  <select class="form-control input-default" id="print_quality" name="printQuality"
                    onchange="showfield2(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Print Quality
                    </option>
                    @foreach ($qualitylist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div2"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="parts_name">Parts Name</label>
                  <select class="form-control input-default" id="parts_name" name="partsName"
                    onchange="showfield3(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Parts Name
                    </option>
                    @foreach ($partslist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div3"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="print_color">Print Color</label>
                  <input type="text" name="printColor" class="form-control" id="print_color" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="color_qty">Color Qty</label>
                  <input type="number" name="colorQty" class="form-control" id="color_qty" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="order_qty">Order Qty</label>
                  <input type="number" name="orderQty" class="form-control" id="order_qty" onchange="totalQtyCal()" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="extra_qty">Extra 5%</label>
                  <input type="number" name="extraQty" class="form-control" id="extra_qty" readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="total_qty">Total Qty</label>
                  <input type="number" name="totalQty" class="form-control" id="total_qty" readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="delivery_date">Delivery Date</label>
                  <input type="date" name="deliveryDate" class="form-control" id="delivery_date" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="merchandiser">Merchandiser</label>
                  <select class="form-control input-default" id="merchandiser" name="merchandiser"
                    onchange="showfield4(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Merchandiser
                    </option>
                    @foreach ($merchandiserlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div4"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select class="form-control input-default" id="supplier" name="supplier"
                    onchange="showfield5(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Supplier
                    </option>
                    @foreach ($supplierlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div5"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="price_dozen">Price Dozen</label>
                  <input type="number" name="priceDozen" step="0.01" class="form-control" id="price_dozen" />
                </div>
              </div>

              <div class="col-lg-4">
                <div class="d-flex">
                  <label for="hide">Hide From Report</label>
                  {{-- <input type="checkbox" name="hide" class="form-control" id="hide" value="1" /> --}}
                  <select class="form-control input-default bg-primary" name="hide" id="hide">
                    <option value="1">Active</option>
                    <option value="0">Hidden</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="artwork">Change Artwork</label>
                  <input type="file" name="artwork" class="form-control-file" id="artwork" />
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

  <!-------color-quantity-Modal------>
  <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="add-order" method="POST" enctype="multipart/form-data">
            @csrf


            <input type="hidden" name="order_id" id="order_id_previous_color" />

            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="style_name">Style Name</label>
                  <input type="text" name="style" class="form-control" id="style_name_color" placeholder="style name"
                    readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="order_no">Order No</label>
                  <input type="text" name="orderNo" class="form-control" id="order_no_color" placeholder="Order No"
                    readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="body_color">Body Color</label>
                  <select class="form-control input-default" id="body_color_color" name="bodyColor"
                    onchange="showfield(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Color
                    </option>
                    @foreach ($bodycolorlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div1"></div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="print_quality">Print Quality</label>
                  <select class="form-control input-default" id="print_quality_color" name="printQuality"
                    onchange="showfield2(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Print Quality
                    </option>
                    @foreach ($qualitylist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div2"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="parts_name">Parts Name</label>
                  <select class="form-control input-default" id="parts_name_color" name="partsName"
                    onchange="showfield3(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Parts Name
                    </option>
                    @foreach ($partslist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div3"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="print_color">Print Color</label>
                  <input type="text" name="printColor" class="form-control" id="print_color_color" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="color_qty">Color Qty</label>
                  <input type="number" name="colorQty" class="form-control" id="color_qty_color" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="order_qty">Order Qty</label>
                  <input type="number" name="orderQty" class="form-control" id="order_qty_color"
                    onchange="totalQtyCal()" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="extra_qty">Extra 5%</label>
                  <input type="number" name="extraQty" class="form-control" id="extra_qty_color" readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="total_qty">Total Qty</label>
                  <input type="number" name="totalQty" class="form-control" id="total_qty_color" readonly />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="delivery_date">Delivery Date</label>
                  <input type="date" name="deliveryDate" class="form-control" id="delivery_date_color" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="merchandiser">Merchandiser</label>
                  <select class="form-control input-default" id="merchandiser_color" name="merchandiser"
                    onchange="showfield4(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Merchandiser
                    </option>
                    @foreach ($merchandiserlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div4"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select class="form-control input-default" id="supplier_color" name="supplier"
                    onchange="showfield5(this.options[this.selectedIndex].value)">
                    <option disabled hidden selected>
                      Select Supplier
                    </option>
                    @foreach ($supplierlist as $item)
                    <option>{{$item['name']}}</option>
                    @endforeach
                    <option style="color:violet" value="other">Other, Please Specify</option>
                  </select>
                  <div id="div5"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="price_dozen">Price Dozen</label>
                  <input type="number" name="priceDozen" step="0.01" class="form-control" id="price_dozen_color" />
                </div>
              </div>

              <div class="col-lg-4">
                <div class="d-flex">
                  <label for="hide">Hide From Report</label>
                  {{-- <input type="checkbox" name="hide" class="form-control" id="hide" value="1" /> --}}
                  <select class="form-control input-default bg-primary" name="hide" id="hide_color">
                    <option value="1">Active</option>
                    <option value="0">Hidden</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="artwork">Change Artwork</label>
                  <input type="file" name="artwork" class="form-control-file" id="artwork" />
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

  <!-- delete modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?
        </div>
        <div class="modal-footer">
          <form action="delete-order" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="order_id" id="order_id_delete_modal">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
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
  <!---- export table -->
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

  <!-- Edit Modal functions -->
  <script>
    // $(document).ready(function(){
    //       $('[data-toggle="tooltip"]').tooltip();
    //       });

    $(document).ready(function(){

        $(document).on('click', '.editBtn', function(){ 
          var order_id_main = $(this).val();
          console.log(order_id_main);
          jQuery.noConflict(); 
          $('#editModal').modal('show');
          $.ajax({
            url: '/edit-order' + order_id_main,
            type: "GET",
            success:function(response){
              console.log(response);
              $('#style_name').val(response.order.style);
              $('#order_no').val(response.order.order_no);
              $('#body_color').val(response.order.body_color);
              $('#print_quality').val(response.order.print_quality);
              $('#parts_name').val(response.order.parts_name);
              $('#print_color').val(response.order.print_color);
              $('#color_qty').val(response.order.color_qty);
              $('#order_qty').val(response.order.order_qty);
              $('#extra_qty').val(response.order.extra_qty);
              $('#total_qty').val(response.order.total_qty);
              $('#delivery_date').val(response.order.delivery_date);
              $('#merchandiser').val(response.order.merchandiser);
              $('#supplier').val(response.order.supplier);
              $('#price_dozen').val(response.order.price_dozen);
              $('#hide').val(response.order.status);
              $('#order_id_previous').val(order_id_main);
            }
          });
        });

        //body color
        $(document).on('click', '.colorBtn', function(){
        var order_id_color = $(this).val();
        console.log(order_id_color);
        jQuery.noConflict();
        $('#colorModal').modal('show');
        $.ajax({
        url: '/edit-order' + order_id_color,
        type: "GET",
        success:function(response){
        console.log(response);
        $('#style_name_color').val(response.order.style);
        $('#order_no_color').val(response.order.order_no);
        $('#body_color_color').val(response.order.body_color);
        $('#print_quality_color').val(response.order.print_quality);
        $('#parts_name_color').val(response.order.parts_name);
        $('#print_color_color').val(response.order.print_color);
        $('#color_qty_color').val(response.order.color_qty);
        $('#order_qty_color').val(response.order.order_qty);
        $('#extra_qty_color').val(response.order.extra_qty);
        $('#total_qty_color').val(response.order.total_qty);
        $('#delivery_date_color').val(response.order.delivery_date);
        $('#merchandiser_color').val(response.order.merchandiser);
        $('#supplier_color').val(response.order.supplier);
        $('#price_dozen_color').val(response.order.price_dozen);
        $('#hide_color').val(response.order.status);
        $('#order_id_previous_color').val(order_id_main_color);
        }
        });
        });

        //delete modal
        $(document).on('click', '.deleteBtn', function(){
        var order_id_delete = $(this).val();
        console.log(order_id_delete);
        jQuery.noConflict();
        $('#deleteModal').modal('show');
        $('#order_id_delete_modal').val(order_id_delete);
        });
      });
    
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: 'all-order.csv', // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }

      function totalQtyCal()
      {
          const orderQty = document.getElementById("order_qty").value;
          const orderExtra = document.getElementById("extra_qty").value =
              (parseInt(orderQty) / 100) * 5;
          const Equation = parseInt(orderQty) + orderExtra;
          document.getElementById("total_qty").value = Equation;
      }

      function showfield(name){
        if(name == 'other') {
          document.getElementById('div1').innerHTML = 'Other Bodycolor: <input class="form-control input-default" type="text" name="otherBodycolor" />';
        }
        else {
          document.getElementById('div1').innerHTML='';
        }	
      }
      function showfield2(name){
        if(name == 'other') {
          document.getElementById('div2').innerHTML = 'Other Print Quality: <input class="form-control input-default" type="text" name="otherPrintquality" />';
        }
        else {
          document.getElementById('div2').innerHTML='';
        }	
      }
      function showfield3(name){
        if(name == 'other') {
          document.getElementById('div3').innerHTML = 'Other Parts Name: <input class="form-control input-default" type="text" name="otherPartsname" />';
        }
        else {
          document.getElementById('div3').innerHTML='';
        }	
      }
      function showfield4(name){
        if(name == 'other') {
          document.getElementById('div4').innerHTML = 'Other Merchandiser: <input class="form-control input-default" type="text" name="otherMerchandiser" />';
        }
        else {
          document.getElementById('div4').innerHTML='';
        }	
      }
      function showfield5(name){
        if(name == 'other') {
          document.getElementById('div5').innerHTML = 'Other Supplier: <input class="form-control input-default" type="text" name="otherSupplier" />';
        }
        else {
          document.getElementById('div5').innerHTML='';
        }	
      }
  </script>
</body>

</html>