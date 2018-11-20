<?php
$id=$_GET['id'];		// 商品ID
$redis=new Redis;
$redis->connect('127.0.0.1',6379);
$redis->select(10);		// 不写此语句，默认是0号数据库
$pdo= new PDO('mysql:host=localhost;dbname=test;','root','root');

// 使用redis中的list类型（列表，也叫队列）控制高并发下的超卖问题
// 来一个请求，则从队列中移除一个元素，llen是获取队列长度（队列中元素数量）
$key='goods'.$id;		// 键名
// 过来一个请求，则判断一下redis list中是否还有元素（队列长度是否大于0），如果有元素，则退队一个元素，同时库存减1
if($redis->llen($key)>0){
	$redis->lpop($key);		// 从队列中移除一个元素
	// 库存减1
	$sql="update goods set stock=stock-1 where id=$id";
	// 向order表中添加记录————生成订单
	$order_id=date('Ymd',time()).md5(rand(100,999));		// 订单号，你可以随便生成
	$addtime=time();
	$sql1="insert into order(order_id,goods_id,addtime) values('$order_id',$id,$addtime)";

	// 如果库存减1执行成功，则进一步向订单表中添加记录记录，同时向前台返回提示信息
	if($data=$pdo->exec($sql)){
		$pdo->exec($sql1);		// 向订单表中添加记录
		echo json_encode(['code'=>1,'msg'=>'秒杀成功!']);		// 向前台返回数据
	}
}else{
	echo json_encode(['code'=>0,'id'=>$id,'msg'=>'秒杀结束！']);	
}