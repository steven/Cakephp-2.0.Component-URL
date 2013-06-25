<?php
/**
 * --- URL Component ---
 * Github: https://github.com/steven/Cakephp-2.0.Component-URL
 * For generating a short URL by using bitly.com
 * You will need a free account from https://bitly.com/ to set up your API credentials
 *
 * @author Steven Thompson <steven@fantasmagorical.co.uk>
 */
 
class UrlComponent extends Component
{
	var $login = 'LOGINUSERNAME';
	var $apiKey = 'APIKEY';
	
	// Returns the short URL from bit.ly
	function shorten($url) {
		$api_call = file_get_contents("http://api.bit.ly/shorten?version=2.0.1&longUrl=".$url."&login=".$bitly_login."&apiKey=".$bitly_apikey);
		$bitlyinfo=json_decode(utf8_encode($api_call),true);
	
		if ($bitlyinfo['errorCode']==0) {
			return $bitlyinfo['results'][urldecode($url)]['shortUrl'];
		} else {
			return false;
		}
	}
} ?>
