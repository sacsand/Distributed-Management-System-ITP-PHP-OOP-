<?php

$crud = new CRUD();
if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM shops WHERE auto=".$_GET['edt_id']);
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
    <form method="post" action="/?page=shops/dbcrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>">
        <table id="dataview">
            <tr><td><input type="text" name="shopId" placeholder="shopId" value="<?php echo $row['shopId'] ?>" /><br /></td></tr>
            <tr><td><input type="text" name="area" placeholder="area" value="<?php echo $row['area'] ?>" /></td></tr>
            <tr><td><input type="text" name="territory" placeholder="territory" value="<?php echo $row['territory'] ?>" /></td></tr>
            <tr><td><input type="text" name="root" placeholder="root" value="<?php echo $row['root'] ?>" /><br /></td></tr>
            <tr><td><input type="text" name="name" placeholder="name" value="<?php echo $row['name'] ?>" /></td></tr>
            <tr><td><input type="text" name="address" placeholder="address" value="<?php echo $row['address'] ?>" /></td></tr>
            <tr><td><input type="text" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>" /><br /></td></tr>
            
            <tr><td><button type="submit" name="update">update</button></td></tr>
        </table>
    </form>
    </table>
</center>
</body>
</html>

