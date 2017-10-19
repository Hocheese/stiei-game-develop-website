<?php
/*
获取小贴士
参数：int $count  想要获取$count条小贴士
	 int $start  想要从第$start条开始获取。当bool $random=true时无效。
	 bool $random是否开启随机。
*/
function getTips(int $count=1,int $start=0,bool $random=true){
	$db=new Database();
	$rel;
	if($random){
		
		$total=$db->query("SELECT count(*) AS `total` FROM `tips`");
		if($total['error']==0){
			$rel['error']=0;
			for($i=0;$i<$count;$i++){
				$rnum=rand(0,$total['data'][0]['total']);
				$relt=$db->query("SELECT * FROM `tips` LIMIT ".$rnum." ,1");
				$rel['data'][$i]=$relt["error"]==0?$relt['data'][0]:$relt['data'];
				$rel['error']=$relt["error"]==0?$rel['error']:$relt["error"];
			}
		return $rel;
		}else{
			$rel=$total;
		}
	}else{
		$rel=$db->query("SELECT * FROM `tips` LIMIT ".$start.",".$count);
	}
	return $rel;
}
?>