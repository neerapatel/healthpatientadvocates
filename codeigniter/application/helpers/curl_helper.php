<?php
function checkRemoteFile($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if(curl_exec($ch)!==FALSE)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function gettime($param, $num)
						{
							$time = new DateTime('now', new DateTimeZone('UTC'));
							$cur_time = $time->format('H:i');
							$data = explode(":",$cur_time);
							if($param == '+')
							$hr = $data[0]+ $num;
							else
							$hr = $data[0]- $num;
							if($hr>24) $hr = $hr-24;
							return $hr.":".$data[1];
						}
?>