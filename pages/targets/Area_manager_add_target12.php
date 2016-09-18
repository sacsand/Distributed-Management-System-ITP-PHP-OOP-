      <?php require_once('_header.php') ?>

      <?php

      $productid=URL::getParam('product_id');
      $product_name=URL::getParam('product_name');
      $username=URL::getParam('username');
      //$status_id=URL::getParam('id');


      $TerPlanObj = new TERRITORY();



      $Teratory=$TerPlanObj->Get_Sales_rep_teratory($username);



      $today = date("m/d/Y");
      $yesterday = date('m/d/Y',strtotime("-1 days"));

      $first_date_of_this_month = date('m/Y');

      $RouteCount=$TerPlanObj->CountRoot($Teratory);
    //  echo "is ".$RouteCount;

      $DaysPlanCount=$TerPlanObj->CountDaysPlanRows($productid,$Teratory);

     // echo $DaysPlanCount;

      $target=$TerPlanObj->GetTarget($Teratory,$productid);


      ?>

      <?php

      $res = $TerPlanObj->GetQuantityByRoot($productid,$Teratory);
      ?>


      <?php
      //if already inserted --then update
      if($RouteCount==$DaysPlanCount){

          $sum=0;

          if(isset($_POST['save_mul']))
          {
              $total = $_POST['lname4'];
             // echo $total;
              for($i=1; $i<=$total; $i++) {

                  $daysplan = $_POST["lname1$i"];
                  $sum= $sum+$daysplan;
              }
              if($sum==$target) {
                  for ($i = 1; $i <= $total; $i++) {
                      $daysplan = $_POST["lname1$i"];
                      $produtid = $_POST["lname2$i"];
                      $routeid = $_POST["lname3$i"];

                      $TerPlanObj->Update_DayasPlan($produtid, $daysplan, $routeid);

                  }
                  unset($_POST["save_mul"]);

              }
              else{  ?>

                  <script>
                      alert('error while inserting , TRY AGAIN');
                  </script>

              <?php
              }



          }


          ?>

      <?php
      }

      else{
          $sum=0;

          if(isset($_POST['save_mul']))
          {
              $total = $_POST['lname4'];
             // echo $total;
              for($i=1; $i<=$total; $i++) {

                  $daysplan = $_POST["lname1$i"];
                  $sum= $sum+$daysplan;
              }
              if($sum==$target) {
                  for ($i = 1; $i <= $total; $i++) {
                      $daysplan = $_POST["lname1$i"];
                      $produtid = $_POST["lname2$i"];
                      $routeid = $_POST["lname3$i"];

                      $TerPlanObj->Insert_DayasPlan($produtid, $daysplan, $routeid);

                  }
                  unset($_POST["save_mul"]);
                  header("Refresh:0");
              }
              else{  ?>

                  <script>
                      alert('error while inserting , TRY AGAIN');
                  </script>

              <?php
              }


          }
      }
      ?>








      <?php require_once('_sidebar.php')?>



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4> <a href="/?page=targets/Area_manager_add_target"><i class="fa  fa-angle-left"></i> Back</a></h4>
           <h1>Plan Your Targets for <?php echo $product_name  ?></h1>



            <small><?php echo $today;?>


                </small>


        </section>

        <!-- Main content -->
        <section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>
                        <h3 class="box-title">last Month sales According to Territory</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="chart-responsive">


                        <canvas id="chart-area"  height="300" ></canvas>
                        <div id="legendDiv"></div>


                    </div><!-- ./chart-responsive -->
                <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            $res = $TerPlanObj->GetQuantityByRoot($productid,$Teratory);
                            while($r1 = mysql_fetch_array($res))
                            {

                            ?>
                            <li><a href="#"><?php echo $r1['TeretoryName'];  ?> <span class="pull-right text-blue"> <?php echo $r1['sum']; ?></span></a></li>
                      <!--      <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                            <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li> -->

                           <?php } ?>
                        </ul>
                </div><!-- /.footer -->
              </div><!-- /.box -->
            </diV>
            <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Add Territory</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>



                    <h3>&nbsp;&nbsp;&nbsp;This Month Target  <?php if($target==0){

                            echo "--#Still Not Received" ;

                        } else
                             echo $target;
                        ?>

                    </h3> <h4><b>&nbsp;&nbsp;&nbsp;&nbsp;</b></h4>
                    <div class="col-md-12">


                        <?php
                        if($RouteCount==$DaysPlanCount) {

                           echo '<h4>Your Current Target</h4>' ;

                            $res3 = $TerPlanObj->GetThisMonthDaysPlan($productid,$Teratory); ?>
                        <table class='table table-bordered table-responsive'>
                            <tr>

                                <th>Route Name</th>
                                <th>Target</th>
                                <th> percentage</th>
                                <th> percentage</th>

                            </tr>
                            <?php

                            while($r2 = mysql_fetch_array($res3))
                            {
                                $dayPlan=$r2['Target'];
                                ?>

                                <tr>
                                    <?php $percentage= $TerPlanObj->CalculatePrecentage($dayPlan,$target) ;  ?>
                                    <td><?php echo $r2['TeretoryName'];  ?></td>
                                    <td><?php echo $r2['Target'] ?></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $percentage ;?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-red"><?php echo $percentage ; ?>%</span></td>




                                </tr>




                            <?php    }  ?>


                    </table>


                     <?php   } ?>

                    <h5>Note : Insert Your Target.And Total Of the Targets should Equal to Your Monthly Target  <?php echo $target ; ?></h5>
                    <h6>Note : Refer the last month sales when Planing your Monthly Target</h6>
                        <br>


                </div>

                <?php
                     if($RouteCount==$DaysPlanCount) {

                   echo '<h4>&nbsp;&nbsp;&nbsp;Feeling Like Need a Change? Update Your Target</h4>';


                  } else {

                    echo '<h4>&nbsp;&nbsp;&nbsp;Insert Your Target</h4>'; ?>


                <?php } ?>




                <form method="post" name="frm" >
                    <table class='table table-bordered table-responsive'>
                        <tr>

                            <th>Territory Name</th>
                            <th>Target</th>

                        </tr>




                        <?php
                        $res2 = $TerPlanObj->GetRootByTeretory($Teratory);
                        $count=0;
                        while($r2 = mysql_fetch_array($res2))
                        {$count++;
                        ?>

                               <tr>

                                    <td><?php echo $r2['TeretoryName'];  ?></td>
                                    <td><input type="number" min="0" name="lname1<?php echo $count; ?>" placeholder="Target" class='form-control' /></td>
                                    <input type="hidden" name="lname2<?php echo $count; ?>" placeholder="Target" value="<?php echo $productid ?>" class='form-control' />
                                    <input type="hidden" name="lname3<?php echo $count; ?>" placeholder="Target" value="<?php echo $r2['TeretoryId'];  ?>" class='form-control' />

                               </tr>
                            <?php
                            }  ?>






                        <input type="hidden" name="lname4" placeholder="last name" value="<?php echo $count;  ?>" class='form-control' />

                        <tr>
                            <td colspan="3">

                                <button type="submit" name="save_mul" class="btn btn-danger btn-block btn-sm" ><i class="glyphicon glyphicon-plus"></i> &nbsp;Add Target</button>

                            </td>
                        </tr>





                    </table>
                </form>



            </div><!-- /.box -->

           </div>

        </div>



</div>
    </div>


            




    </section>

</div>
</diV>




      <?php require_once('_footer.php')?>


  <!-- ./wrapper -->

    <script>

        var pieData = [
            <?php
               $res = $TerPlanObj->GetQuantityByRoot($productid,$Teratory);
                while($r1 = mysql_fetch_array($res))
                {

                    ?>
            {
                value:<?php echo $r1['sum']; ?>,
                color:"<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
                highlight: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
                label: "<?php echo $r1['RouteName'];  ?>"
            },
            <?php  }  ?>
            {
                value: <?php echo 0; ?>,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Red"
            }


        ];

        window.onload = function(){
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);

            new Chart(ctx).Doughnut(data, {
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

            });
        };




    </script>


    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>


    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>

    <script src="../plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="../plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>




    <script type="text/javascript">

        $(function () {
            /*
             * DONUT CHART
             * -----------
             */


            var donutData = [
                <?php
               $res = $TerPlanObj->GetQuantityByRoot($productid,$Teratory);
                while($r1 = mysql_fetch_array($res))
                {

                    ?>


                {label: "<?php echo $r1['routeId'];  ?>", data:<?php echo $r1['sum']; ?>, color: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>"},
                <?php  } ?>
                {label: "S", data: 0, color: "#01c0ef"}
            ];
            $.plot("#donut-chart", donutData, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.5,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }

                    }
                },
                legend: {
                    show: false
                }
            });
            /*
             * END DONUT CHART
             */

        });

        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
        }
    </script>


    <script type="text/javascript">

        $(function () {
            /*
             * DONUT CHART
             * -----------
             */


            var donutData = [
                <?php
               $res = $TerPlanObj->GetQuantityByRoot($productid,$Teratory);
                while($r1 = mysql_fetch_array($res))
                {

                    ?>


                {label: "<?php echo $r1['RouteName'];  ?>", data:<?php echo $r1['sum']; ?>, color: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>"},
                <?php  } ?>
                {label: "S", data: 0, color: "#01c0ef"}
            ];
            $.plot("#donut-chart", donutData, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.5,
                        label: {
                            show: false,
                            radius: 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }

                    }
                },
                legend: {
                    show: true
                }
            });
            /*
             * END DONUT CHART
             */

        });

        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
        }
    </script>










  </body>
</html>
