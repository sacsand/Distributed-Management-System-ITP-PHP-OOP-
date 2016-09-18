<?php
/*
Can be used to get the current url of the page
*/
class Pages
{
	function grabCurrentURL(){
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $url = "https://";
        }else{
            $url = "http://";
        }
        $url .= $_SERVER['SERVER_NAME'];
        if($_SERVER['SERVER_PORT'] != 80){
            $url .= ":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        }else{
            $url .= $_SERVER["REQUEST_URI"];    
        }
        return $url;
    }

}