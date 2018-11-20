<?php
// 前台ajax每秒请求一次此文件，计算一次时间
// 读取商品信息
$pdo=new PDO('mysql:host=localhost;dbname=test','root','root');
$sql="select * from goods";
$data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre/>';
// print_r($data);

// 计算倒计时
foreach($data as $key=>$value){
	//$startTime=$value['starttime'];
	$startTime=time();
	$endTime=$value['endtime'];
	$remainTime=$endTime-$startTime;			// 开始时间和结束时间之间相差的秒数
	$hour=floor($remainTime/3600);		// 1小时是3600秒，所有的秒数除以3600秒，是不就转换成小时了
	$minute=floor(($remainTime-$hour*3600)/60);				// 分钟
	$second=$remainTime-$hour*3600-$minute*60;		// 秒

	$data[$key]['hour']=$hour;
	$data[$key]['minute']=$minute;
	$data[$key]['second']=$second;
	// echo '<pre/>';
	// print_r($data);
}
echo json_encode($data);	// 商品数据和倒计时