<?php 
	$city=$_GET['city'];
    $key='878fc6fbb3074a11a325e14aa7981ba4';
	$url="https://free-api.heweather.com/s6/weather/forecast?location=$city&key=$key";
	$str=curl_get($url);
	// echo $str;

	$data=json_decode($str,true);
	$data=$data['HeWeather6'][0]['daily_forecast'];
	// echo '<pre/>';
	// print_r($data);
	$pdo=new PDO('mysql:host=localhost;dbname=test','root','root');
	foreach ($data as $key => $value) {
		$data=$value['date'];
		$maxTemp=$value['tmp_max'];
		$minTemp=$value['tmp_min'];
		$sql="insert into weather(city,date,maxtemp,mintemp) values('$city','$date','$maxTemp','$minTemp')";
		echo $sql;
		$pdo->exec($sql);
		
	}




function curl_get($url){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	$str=curl_exec($ch);
	curl_close($ch);

	return $str;
}

 ?>