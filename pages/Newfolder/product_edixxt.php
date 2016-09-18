<?php

$crud = new CRUD();
if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM product WHERE auto=".$_GET['edt_id']);
    $row=mysql_fetch_array($res);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>php oops crud tutorial part-2 by cleartuts</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<div id="header">
    <label>php oops crud tutorial part-2 by cleartuts</label>
</div>

<center>
    <form method="post" action="/?page=dbcrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>">
        <table id="dataview">
            <tr><td><input type="text" name="productId" placeholder="first name" value="<?php echo $row['productId'] ?>" /><br /></td></tr>
            <tr><td><input type="text" name="pname" placeholder="last name" value="<?php echo $row['pname'] ?>" /></td></tr>
            <tr><td><input type="text" name="weight" placeholder="city" value="<?php echo $row['weight'] ?>" /></td></tr>
            <tr><td><input type="text" name="caseMakeup" placeholder="first name" value="<?php echo $row['caseMakeup'] ?>" /><br /></td></tr>
            <tr><td><input type="text" name="unitPrice_ws" placeholder="last name" value="<?php echo $row['unitPrice_ws'] ?>" /></td></tr>
            <tr><td><input type="text" name="casePrice_ws" placeholder="city" value="<?php echo $row['casePrice_ws'] ?>" /></td></tr>
            <tr><td><input type="text" name="unitPrice_tf" placeholder="first name" value="<?php echo $row['unitPrice_tf'] ?>" /><br /></td></tr>
            <tr><td><input type="text" name="casePrice_tf" placeholder="last name" value="<?php echo $row['casePrice_tf'] ?>" /></td></tr>
            <tr><td><input type="text" name="priceConsumer" placeholder="city" value="<?php echo $row['priceConsumer'] ?>" /></td></tr>
            <tr><td><input type="text" name="category" placeholder="first name" value="<?php echo $row['category'] ?>" /><br /></td></tr>

            <tr><td><button type="submit" name="update">update</button></td></tr>
        </table>
    </form>
    </table>
</center>
</body>
</html>