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

                                        <form method="post" action="order-production-report">
                                            @csrf
                                            <div class="form-group">
                                                <label>Select Order Number From List</label>

                                                <select class="form-control input-default" name="order_no">

                                                    <option disabled hidden selected>
                                                        Select Order Number
                                                    </option>
                                                    @foreach ($orderlist as $item)
                                                    <option>{{$item['order_no']}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="px-4 py-2">Find All Delivery </button></div>
                                        </form>
                                    </div>
                                    {{--
                        <div>
                            <button class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" onclick="printDiv()"><i class="ti-printer"></i>Print
                                REPORT</button>
                        </div> --}}
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
