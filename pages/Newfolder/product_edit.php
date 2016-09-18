<?php

$crud = new CRUD();
if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM product WHERE auto=".$_GET['edt_id']);
    $row=mysql_fetch_array($res);
}
?>


    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Edit Product Details

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Invoice</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=dbcrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>&amp;productId=<?php echo $row['productId'] ?>" method="post" class="form-horizontal" id="register-form">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ProductID:</label>
                    <div class="col-sm-10">
                        <input type="text" name="productId" placeholder="product id" value="<?php echo $row['productId'] ?>" class="form-control"/>

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">

                        <input type="text" name="name" placeholder="last name" class="form-control" value="<?php echo $row['name'] ?>" />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Weight</label>
                    <div class="col-sm-10">
                        <input type="text" name="weight" placeholder="city" class="form-control" value="<?php echo $row['weight'] ?>" />


                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Makeup</label>
                    <div class="col-sm-10">
                        <input type="text" name="caseMakeup" placeholder="first name" class="form-control" value="<?php echo $row['caseMakeup'] ?>" />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit price W/S</label>
                    <div class="col-sm-10">

                        <input type="text" name="unitPrice_ws" placeholder="last name" class="form-control" value="<?php echo $row['unitPrice_ws'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Price W/S</label>
                    <div class="col-sm-10">
                        <input type="text" name="casePrice_ws" placeholder="city" class="form-control" value="<?php echo $row['casePrice_ws'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit price T/F</label>
                    <div class="col-sm-10">
                        <input type="text" name="unitPrice_tf" placeholder="first name" class="form-control" value="<?php echo $row['unitPrice_tf'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Case Price T/F</label>
                    <div class="col-sm-10">
                        <input type="text" name="casePrice_tf" placeholder="last name" class="form-control" value="<?php echo $row['casePrice_tf'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Price Consumer</label>
                    <div class="col-sm-10">
                        <input type="text" name="priceConsumer" placeholder="city" class="form-control" value="<?php echo $row['priceConsumer'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">


                        <select  name="category" class="form-control select2" required >

                            <option selected="selected"><?php echo $row['category'] ?></option>
                            <?php   $res=$crud->get_catergory();

                            while($ro1 = mysql_fetch_array($res))
                            { ?>
                                <option><?php echo $ro1['name']; ?></option>

                            <?php  }?>

                        </select>
                    </div>
                </div>


                    <div class="fieldgroup">
                        <input type="submit" name="update" value="Update" class="btn btn-danger">
                    </div>



              </form>




        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->



    <?php require_once('_footer.php')?>


    <script type="text/javascript" src="jquery.validate.min.js"></script>
    <script type="text/javascript">

        $('document').ready(function()
        {
            $("#register-form").validate({
                rules: {
                    productId: "required",
                    name: "required"

                },
                messages: {
                    productId: "Please enter your firstname",
                    name: "Please enter your lastname"

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>








</body>
</html>