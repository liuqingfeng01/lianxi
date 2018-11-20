<?php
// 读取商品信息
$pdo=new PDO('mysql:host=localhost;dbname=test','root','root');
$sql="select * from goods";
$data=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre/>';
// print_r($data);
?>

<html>
<head>
	<title></title>
	<script src='jquery.js'></script>
</head>
<body>
<?php foreach($data as $value):?>
<div style='float:left;margin-right:20px;'>
	<p>
		<span id="h<?=$value['id']?>"></span> 时 
		<span id="m<?=$value['id']?>"></span> 分 
		<span id="s<?=$value['id']?>"></span> 秒
	</p>

	<p><img src="<?=$value['path']?>" width='280' height='200'></p>
	<p><?=$value['name']?></p>
	<p><?=$value['price']?></p>
	<p><input type='button' value='抢购' id="<?=$value['id']?>"></p>
</div>
<?php endforeach;?>
</body>
</html>

<script>
// 倒计时
$(document).ready(function(){
	//var i=0;
	// 计时器
	window.setInterval(function(){
		//i++;
		//var ajax=new Ajax();
		$.ajax({
			url:'calctime.php',
			type:'get',
			dataType:'json',
			success:function(data){
				//eval("var data = "+data);
				for(var i=0;i<data.length;i++){
					id=data[i]['id'];		// 商品ID
					//console.log(id)
					$('#h'+id).text(data[i]['hour']);
					$('#m'+id).text(data[i]['minute']);
					$('#s'+id).text(data[i]['second']);
				}
			}
		});
	},1000);		// 每秒(1000毫米）执行一次代码

	// 抢购按钮加单击事件
	$("input[type=button]").click(function(){
		var id=$(this).attr('id');
		$.ajax({
			url:'miaosha.php',
			type:'get',
			dataType:'json',
			data:{'id':id},
			success:function(data){
				if(data['code']==1){
					alert(data['msg']);
				}else{
					alert(data['msg']);
				}
			}
		});
	});	
});

</script>


