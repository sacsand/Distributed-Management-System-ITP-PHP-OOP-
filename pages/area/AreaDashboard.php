    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>
    <?php
    $acrud = new AreaCRUD();
    $username = "Kasun";
    $area_id = $acrud->Get_areamanager_area($username);
    ?>
    <script>
        var myData=[<?php
            while($info=mysql_fetch_array($pieData))
            echo $info['f_data'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        var myLabels=[<?php
            while($info=mysql_fetch_array($data))
            echo '"'.$info['f_name'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
        ?>];
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Area Management
            <small><?php echo $area_id ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!-- Main row -->
          <div class="row col-lg-12">
            <div class="col-xs-6">
                <form action="/?page=area/AreaDBCrud" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sendername" placeholder="Your Name" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                    </div>
                    <div>
                        <textarea class="textarea" name="message" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-right btn btn-success" name="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-xs-6">
              <form action="/?page=area/AreaDBCrud" method="post">
                  <div class="form-group">
                      <input type="text" class="form-control" name="sendername" placeholder="Your Name" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                  </div>
                  <div>
                      <textarea class="textarea" name="message" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                  <div class="box-footer clearfix">
                      <button type="submit" class="pull-right btn btn-success" name="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                  </div>
              </form>
            </div>
          </div>
          <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div>

                </div>
            </section>
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                  <li><a href="#piechart" data-toggle="tab">Sales</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="piechart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
              </div><!-- /.nav-tabs-custom -->

                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" height="230"></canvas>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Quick Email</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                  	<button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="/?page=area/AreaDBCrud" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="sendername" placeholder="Your Name" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required pattern="^[A-Za-z0-9\.\s\,]{2}$"  oninvalid="setCustomValidity('Please insert a name')" oninput="setCustomValidity('')"/>
                    </div>
                    <div>
                      <textarea class="textarea" name="message" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="box-footer clearfix">
	                  <button type="submit" class="pull-right btn btn-success" name="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
	                </div>
                  </form>
                </div>
                <!-- End of email widget -->

            </section><!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">

              <!-- solid sales graph -->
              <div class="box box-solid bg-teal-gradient">
                <div class="box-header">
                  <i class="fa fa-th"></i>
                  <h3 class="box-title">Sales Graph</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                      <div class="knob-label">Mail-Orders</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                      <div class="knob-label">Online</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                      <div class="knob-label">In-Store</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- Sparkline -->

    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jvectormap -->

    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->

    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- daterangepicker -->

    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- datepicker -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->


    <!-- Angular JavaScript Plugin -->
    <script src='plugins/angular/angular.min.js'></script>
    <!-- Angular JavaScript Plugin -->

    <script>

      $(function () {
        $('#piechart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares January, 2015 to May, 2015'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{

                name: "Brands",
                colorByPoint: true,
                data: [{
                    name: "Microsoft Internet Explorer",
                    y: 56.33
                }, {
                    name: "Chrome",
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: "Firefox",
                    y: 10.38
                }, {
                    name: "Safari",
                    y: 4.77
                }, {
                    name: "Opera",
                    y: 0.91
                }, {
                    name: "Proprietary or Undetectable",
                    y: 0.2
                }]
            }]
        });
    });
    </script>



