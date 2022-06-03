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
                      <div class="stat-text">Total Profit</div>
                      <div class="stat-digit">1,012</div>
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
                      <div class="stat-text">New Customer</div>
                      <div class="stat-digit">961</div>
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
                      <div class="stat-text">Active Projects</div>
                      <div class="stat-digit">770</div>
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
                      <div class="stat-text">Referral</div>
                      <div class="stat-digit">2,781</div>
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
                            <th>
                              <label><input type="checkbox" value="" /></label
                              >Exam Name
                            </th>
                            <th>Subject</th>
                            <th>Grade Point</th>
                            <th>Percent Form</th>
                            <th>Percent Upto</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Class Test</td>
                            <td>Mathmatics</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>Mathmatics</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>English</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>Bangla</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>Mathmatics</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>English</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
                          <tr>
                            <td>Class Test</td>
                            <td>Mathmatics</td>
                            <td>4.00</td>
                            <td>95.00</td>
                            <td>100</td>
                            <td>20/04/2017</td>
                          </tr>
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
