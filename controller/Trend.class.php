<?php
include("model/trend.php");
class Trend extends Controller{
	public function tips(){
		echo json_encode(getTips());
	}
}
?>