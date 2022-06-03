<!DOCTYPE html>
<html lang="en">
  <x-header title="Dashboard"/>

  <body>
    <x-navigation/>
    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>Hello, <span>Welcome Here</span></h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="card">
                  <div class="stat-widget-one">
                    <div class="stat-icon dib">
                      <i class="ti-money color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                      <div class="stat-text">Total Order</div>
                      <div class="stat-digit">{{$orderCount}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="stat-widget-one">
                    <div class="stat-icon dib">
                      <i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                      <div class="stat-text">In Planning</div>
                      <div class="stat-digit">{{$planCount}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="stat-widget-one">
                    <div class="stat-icon dib">
                      <i class="ti-layout-grid2 color-pink border-pink"></i>
                    </div>
                    <div class="stat-content dib">
                      <div class="stat-text">Active Production</div>
                      <div class="stat-digit">{{$productionCount}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                  <div class="stat-widget-one">
                    <div class="stat-icon dib">
                      <i class="ti-link color-danger border-danger"></i>
                    </div>
                    <div class="stat-content dib">
                      <div class="stat-text">Due Delivery</div>
                      <div class="stat-digit">{{$deliveryCount}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="year-calendar"></div>
                  </div>
                </div>
                <!-- /# card -->
              </div>
              <!-- /# column -->
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-title pr">
                    <h4>All Exam Result</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table student-data-table m-t-20">
                        <thead>
                          <tr>
                            
                            <th>Artwork</th>
                            <th>Order No</th>
                            <th>Body Color</th>
                            <th>Total Qty</th>
                            <th>Target Per Day</th>
                            <th>Inhand</th>
                            <th>Today Prod</th>
                            <th>Total Prod</th>
                            <th>Without Print Balance</th>
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
                            <td>{{$item['order_no']}}</td>
                            <td>{{$item['body_color']}}</td>
                            <td>{{$item['total_qty']}}</td>
                            <td>{{$item['target_perday']}}</td>
                            <td>{{$item['inhand']}}</td>
                            <td>{{$item['today_production']}}</td>
                            <td>{{$item['total_production']}}</td>
                            <td>{{$item['balance']}}</td>
                          </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
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

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>

    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
  </body>
</html>
