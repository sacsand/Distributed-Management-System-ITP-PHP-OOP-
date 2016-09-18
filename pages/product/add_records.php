    <?php $crud = new CRUD();

    $count=URL::getParam('count');
    //echo $count;



    ?>

    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <form action="/?page=product/dbcrud" method="post" class="form-horizontal" name="frm">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ProductID:</label>
                    <div class="col-sm-10">
                        <input type="text" name="productId"  ng-model="user.name" maxlength="4"  required class="form-control"/>
                        <?php  if($count==1){
                            echo "product ID is already in the database";
                        }?>

                        <span ng-show="frm.productId.$error.required"> </span>
                        <span ng-show="frm.productId.$error.maxlength"></span>


                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3"  class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">

                        <input type="text" name="name" ng-model="user1.name" maxlength="25" class="form-control" required />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Weight</label>
                    <div class="col-sm-10">
                        <input type="number" name="weight" ng-model="weight.value" max="10000" min="0" required class="form-control"   />


                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Makeup</label>
                    <div class="col-sm-10">
                        <input type="number" name="caseMakeup"  ng-model="caseMakeup.name" max="10000" min="0"  class="form-control" required  />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit Price W/S</label>
                    <div class="col-sm-10">

                        <input type="number" name="unitPrice_ws"   ng-model="unitPrice_ws" max="10000" min="0"  class="form-control" required  />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Price W/S</label>
                    <div class="col-sm-10">
                        <input type="number" name="casePrice_ws"  ng-model="casePrice_ws" max="100000" min="0"  class="form-control" required   />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit Price T/F</label>
                    <div class="col-sm-10">
                        <input type="number" name="unitPrice_tf"  ng-model="unitPrice_tf" max="10000" min="0"  class="form-control" required   />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Price T/F</label>
                    <div class="col-sm-10">
                        <input type="number" name="casePrice_tf"   ng-model="casePrice_tf" max="100000" min="0"  class="form-control"  required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Price Consumer</label>
                    <div class="col-sm-10">
                        <input type="number" name="priceConsumer"  ng-model="priceConsumer" max="10000" min="0"  class="form-control" required  />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">

                        <select  name="category" class="form-control select2" required >
                         <?php   $res=$crud->get_catergory();

                         while($row = mysql_fetch_array($res))
                         { ?>
                            <option><?php echo $row['name']; ?></option>

                        <?php  }?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Free Issue Rate</label>
                    <div class="col-sm-10">
                        <input type="number" name="Free_Issue_Rate" min="1" max="100" placeholder="FreeIssue" class="form-control" value="<?php echo $row['freeIssueRate'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="save" class="btn btn-danger" >save </button>

                    </div>
                </div>




            </form>




        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>






</body>
</html>