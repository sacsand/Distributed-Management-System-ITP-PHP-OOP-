    <div class="wrapper">
        <?php require_once('_header.php')?>
        <?php require_once('_sidebar.php')?>




        <?php
            $invoice = new INVOICE();
            $teretoryId = $invoice -> Get_Sales_rep_teratory($rep);
        ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>



        <!-- Main content -->
        <section class="content">

            <h1>Create An Invoice</h1>
            <hr/>

                <form action="/?page=invoice/dbcrud&area=<?php echo $area; ?>"  method="post" name="create_invoice_form" class="form-horizontal">


                      <div class="form-group" id="root">
                         <label for="inputEmail3" class="col-sm-2 control-label">Route</label>
                          <div class="col-sm-10">


                            <select id="selected_root" name="selected_root" class="form-control">
                                <option value="please select" style="color: red">--Please Select--</option>

                                  <?php
                                    $res = $invoice->roots_show($teretoryId);

                                    while($r1 = mysql_fetch_array($res))
                                    {
                                    ?>
                                      <option value="<?php echo $r1['RouteId']; ?>"> <?php echo $r1['RouteName'];  ?> </option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            
                            <input type="hidden" id="repId" name="repId" value="<?php echo $rep; ?>"> 
                              
                          </div>
                      </div>

                      <div class="form-group" id="shops_colombo_root_1">
                        <label for="inputEmail3" class="col-sm-2 control-label">Shop Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="shops" name="shops">

                                </select>
                            </div>
                      </div>

                </form>


        </section>

        <section class="content">
            <h1>Products List</h1>

            <section class="content">
                   <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="jumbo" id="jumbo">Jumbo Peanut</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="wafers" id="wafers">Wafers</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="jelly" id="jelly">Jelly</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="milkPudding" id="milkPudding">Milk Pudding</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="chikChok" id="chikChok">Chik Chok</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="bg" id="bg">B/G</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="macho" id="macho">Macho</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="cof" id="cof">Cof</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="pen" id="pen">Pen</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="td" id="td">T/D</button></div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"><button class="btn btn-block btn-primary btn-lg" name="lolyPoP" id="lolyPoP">Loly PoP</button></div>
                        </div>
                   </div>


                   <div class="row">
                        <div id="jumbo_window" name="jumbo_window" style="display:none">
                                <?php
                                $res = $invoice->sub_product_show('Jumbo Peanut');
                                while($r1 = mysql_fetch_array($res))
                                {
                                ?>
                                    <form id="form" name="form" method="post" action="">
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box">
                                            <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                        </div>
                                    </div>
                                    </form>
                                 <?php
                                 }
                                 ?>
                        </div>
                        <div id="wafers_window" name="wafers_window" style="display:none">
                                        <?php
                                        $res = $invoice->sub_product_show('Wafers');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="jelly_window" name="jelly_window" style="display:none">
                                <?php
                                        $res = $invoice->sub_product_show('Jelly');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                       </div>
                       <div id="milkPudding_window" name="milkPudding_window" style="display:none">
                                <?php
                                        $res = $invoice->sub_product_show('Milk Pudding');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="chikChok_window" name="chikChok_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('Chik Chok');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="bg_window" name="bg_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('B/G');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="macho_window" name="macho_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('Macho');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="cof_window" name="cof_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('Cof');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="pen_window" name="pen_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('Pen');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="td_window" name="td_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('T/D');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>
                        <div id="lolyPoP_window" name="lolyPoP_window" style="display:none">
                            <?php
                                        $res = $invoice->sub_product_show('Loly PoP');
                                        while($r1 = mysql_fetch_array($res))
                                        {
                                        ?>
                                            <form id="form" name="form" method="post" action="">
                                                <div class="col-lg-3 col-xs-6">
                                                    <div class="small-box">
                                                        <input type="button" class="btn btn-block btn-info btn-lg" value="<?php echo $r1['name'];  ?>">
                                                    </div>
                                                </div>
                                            </form>
                                         <?php
                                         }
                                         ?>
                        </div>


                 </div>


                 <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Added Products</h3>
                                        <div class="box-tools">
                                        </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="table1" name="table1">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                            <input type="button" value="submit" class="btn btn-primary" id="save" name="save">
                       </div>
                 </div>

            </section>
        </section>





      </div>

      <!--footer php-->
    <?php require_once('_footer.php')?>

    <div class='control-sidebar-bg'></div>
    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- jQuery 2.1.4
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function (){


            //Select roots and coming shops part

            $("#selected_root").change(function() {

                var route = $("#selected_root").val();
                var sendRoute = JSON.stringify(route);
                var sho = new Array();

                $.ajax({
                    url: "/?page=invoice/invoice_ajax_shop",
                    type: "post",
                    dataType: "json",
                    data: {route : sendRoute },
                    success : function(data){
                        $('#shops').html($('<option>', { value: 1, text: '---Please Select---' }));
                        data.forEach(function(shop) {
                            $('#shops').append($('<option>', {
                                value: shop,
                                text: shop
                            }));
                        });
                    }

                });

            });


            //prodcuts

            $("#jumbo").click(function() {
                $("#jumbo_window").show();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
            });

            $("#wafers").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").show();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#jelly").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").show();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
            });

            $("#milkPudding").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").show();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#chikChok").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").show();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#bg").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").show();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#macho").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").show();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#cof").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").show();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#pen").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").show();
                $("#td_window").hide();
                $("#lolyPoP_window").hide();
             });

            $("#td").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").show();
                $("#lolyPoP_window").hide();
             });

            $("#lolyPoP").click(function() {
                $("#jumbo_window").hide();
                $("#wafers_window").hide();
                $("#jelly_window").hide();
                $("#milkPudding_window").hide();
                $("#chikChok_window").hide();
                $("#bg_window").hide();
                $("#macho_window").hide();
                $("#cof_window").hide();
                $("#pen_window").hide();
                $("#td_window").hide();
                $("#lolyPoP_window").show();
             });












            var id = 1;

            $(function() {
                $("#form input[type=button]").click(function(){

                    var pName = $(this).val();
                    var sendName = JSON.stringify(pName);

                    $.ajax({
                        url: "/?page=invoice/invoice_ajax_products",
                        type: "post",
                        data:{name : sendName},
                        success : function(data){
                           // console.log(data);
                            var temp = data;    // alerts the response from php.
                            //alert(temp);
                        }
                    });


                    var newid = id++;
                    $("#table1").append(
                        '<tr valign="top" id="'+newid+'">\n\
                            <td>' + newid + '</td>\n\
                            <td class="name'+newid+'">' + $(this).val() + '</td>\n\
                            <td><input type="text" value="" id="quantity'+newid+'" name="quantity'+newid+'" class=""></td>\n\
                            <td><a href="javascript:void(0);" class="plus badge bg-green">+</a></td>\n\
                            <td><a href="javascript:void(0);" class="minus badge bg-green">-</a></td>\n\
                            <td><a href="javascript:void(0);" class="remCF badge bg-red">Remove</a></td>\n\
                         </tr>'
                    );
                });
            });




            $("#table1").on('click', '.remCF', function() {
                    $(this).parent().parent().remove();
            });

            /*
            $("#table1").on('click', '.plus', function() {
                    //var c = $("#amo").val().parent();
                    //alert(c);
                    //$("#sname").val()
            });

            */
            
            //$("#table1").on('click', '.minus', function() {
            //        alert("-");
            //});

            



             $("#save").click(function(){
                 
                var lastRowId = $('#table1 tr:last').attr("id"); //finds id of the last row inside table


                var selectedRoute =  $("#selected_root").val();
                var selectedShop = $("#shops").val();
                var repId = $("#repId").val();


                var aname = new Array();
                var aquantity = new Array();

                //Push Quantities
                var temp;
                for ( var j = 1; j <= lastRowId; j++){
                    temp = $("#quantity"+j).val();
                        if(temp != 'undefined'){
                            aquantity.push(temp);
                        }
                }

                //Push Names
                for ( var i = 1; i <= lastRowId; i++) {
                        aname.push($("#"+i+" .name"+i).html());
                }

                var asendName = JSON.stringify(aname);
                var asendQuantity = JSON.stringify(aquantity);



                $.ajax({
                    url: "/?page=invoice/invoice_ajax_add_products",
                    type: "post",
                    dataType: "json",
                    data: {names : asendName , quantitys : asendQuantity , route: selectedRoute , shop:selectedShop , rep:repId },
                    success : function(data){
                          
                        
                            if( data[0] == 1)
                            {    
                                var invoiceNo = data[1];
                                alert("Sucessfully Created!");
                                
                                window.location = "/?page=invoice/invoice&InvoiceNo="+invoiceNo;
                        //window.location.href = "Home/MyActionResult?Page=data&PostData=" + PostData;
                            }
                            else if ( data[0] == 2)
                            {
                                alert("Please add Quantities Correctly!");
                            }
                            else
                            {
                                var message=" ";
                                data.forEach(function(ans) {
                                    message = message + ans;
                                    message = message + ",";
                                });    
                                
                                alert(message);
                            }
                    }
                });
            });



        });
    </script>

  </body>
</html>
