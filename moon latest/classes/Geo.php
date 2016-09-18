<?php

class Geo
{
	protected $geo_api = 'http://www.telize.com/geoip/%s';
	protected $properties = []; 

	public function __get($key)
	{
		if (isset($this->properties[$key])) {
			return $this->properties[$key];
		}

		return null;
	}

	public function request($ip)
	{
		$url = sprintf($this->geo_api, $ip);
		$data = $this->sendRequest($url);

		$this->properties = json_decode($data, true);
		var_dump($this->properties);

	}

	protected function sendRequest($url)
	{
		//pulls out the data in the json format.... json means javascript object notation
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		//handle errors

		return curl_exec($curl);
	}

	function getRealIpAddr() {
	    if(!empty($_SERVER['HTTP_CLIENT_IP']))   //Check IP address from shared Internet
	    {
	        $IPaddress = $_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To check IP address is passed from the proxy
	    {
	        $IPaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	        $IPaddress = $_SERVER['REMOTE_ADDR'];
	    }
	    return $IPaddress;
	}

  	
}