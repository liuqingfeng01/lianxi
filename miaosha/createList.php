<?php
// 功能：将数据库中的库存存储到Redis的list结构中
$redis=new Redis;
$redis->connect('127.0.0.1','6379');
$redis->select(10);

$pdo= new PDO('mysql:host=localhost;dbname=test;','root','root');
$sql="select id,stock from goods";
$data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 循环（遍历）所有商品
foreach ($data as $key => $value) {
	// 给每个商品在redis中创建一个对应的列表，这个列表的键名是 goods+id值
	for($i=1;$i<=$value['stock'];$i++){
		$redis->lpush('goods'.$value['id'],$i);		// 键是 goods1 goods2 goods3等
	}	
}