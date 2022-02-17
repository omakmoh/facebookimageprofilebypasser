<?php
	$InputLink = $_POST['InputLink'];
	$RealID = getaccountid($InputLink)[0];
	getaccountimage($RealID);


function getaccountid($input)
	{
	    $post =	 [
   			'url_facebook' => $input,
			];
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,'https://findidfb.com');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    $response = curl_exec($ch);
	    preg_match_all('@<div class="alert alert-success alert-dismissable">Numeric ID: <b>(.+)</b>@', $response, $matches);
	    curl_close($ch);
	    return $matches[1];
	}

function getaccountimage($ID)
		{
		$ch2 = curl_init();
		curl_setopt($ch2, CURLOPT_URL,'https://graph.facebook.com/'. $ID.'/picture?width=5000&access_token=6628568379%7Cc1e620fa708a1d5696fb991c1bde5662');
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION,true); 
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0');
	        curl_getinfo($ch2);
		$respone = curl_exec($ch2);
		echo '<img src="data:image/gif;base64,'.base64_encode($respone).'" />';
		}

function retacctoken()
{


return "6628568379%7Cc1e620fa708a1d5696fb991c1bde5662";

}


		
?>



		