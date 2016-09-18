<?php
    $invoice = new INVOICE();

    $route = json_decode($_POST["route"]);

    $res = $invoice->shops_show($route);

    $shops = array();


    while($r1 = mysql_fetch_array($res))
    {
        array_push( $shops,$r1['name'] );
    }

    

    print json_encode($shops);

?>