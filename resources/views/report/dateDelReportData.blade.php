<!DOCTYPE html>
<html lang="en">
<x-header title="All Delivery" />

<body>
    <x-navigation />

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Order Wise Delivery</h1>
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
                                    <li class="breadcrumb-item active">Order Wise Delivery</li>
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

                                        <form method="post" action="date-delivery-report">

                                            @csrf
                                            <div class="form-group">
                                                <label>Date From</label>
                                                <input type="date" name="start" />

                                                <label>Date To</label>
                                                <input type="date" name="end" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="px-4 py-2">Find All Delivery </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div>
                                        <button class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" onclick="printDiv()"><i class="ti-printer"></i>Print
                                            REPORT</button>
                                    </div>

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">

                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Artwork</th>
                                                    <th>Style Name</th>
                                                    <th>Order No</th>
                                                    <th>Body Color</th>
                                                    <th>Print Quality</th>
                                                    <th>Parts Name</th>
                                                    <th>P.C</th>
                                                    <th>Total Qty</th>
                                                    <th>Today Del</th>
                                                    <th>Total Del</th>
                                                    <th>Del Bal</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deliverylist as $item)

                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($item['delivery_date'])->format('d-M-y')}}</td>

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
                                                    <td>{{round($item['total_qty'])}}</td>
                                                    <td>{{$item['delivery_today']}}</td>
                                                    <td>{{$item['delivery_total']}}</td>
                                                    <td>{{$item['delivery_balance']}}</td>
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

    <!-- Edit Modal functions -->
    <script>

        function printDiv() {
            var divToPrint = document.getElementById("bootstrap-data-table-export");
            var htmlToPrint = "" + '<style type="text/css">' + "table th, table td {" + "border:1px solid #000;" +
                "padding;0.5em;" + "}" + " img{" + "height:50px;" + " width:50px;" + "}" + "</style>";
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
        }

    </script>

</body>

</html>
