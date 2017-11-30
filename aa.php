<?php
session_start();
//unset($_SESSION['stored']);
if(isset($_POST['submit'])){
$myfile = fopen("bb.php", "a") or die("Unable to open file!");
$stored_ar = array();
$input_ar = array('name'=>$_POST['name'],'age'=>$_POST['age']);
$current_final_ar = array();
if(isset($_SESSION['stored'])){
	$stored_ar = $_SESSION['stored'];
	$temp = $stored_ar;
	$current_final_ar = $input_ar;
	$_SESSION['stored'][] = $current_final_ar;
}else
{
$current_final_ar[] = $input_ar;
$_SESSION['stored'] = 	$current_final_ar;
}

if(isset($_SESSION['stored']) && !empty($_SESSION['stored'])){
	header("Location:bb.php");
}
}


?>
<div class="formDiv">
<form action='' method="post">
<div>
<div class="each_sec">Name<br>
<input type="text" name="name">
</div>
<div class="each_sec">Age<br>
<input type="text" name="age">
</div>
</div>
<div class="btnSubmit" style="clear:both"><input type="submit" name="submit" value="Submit"></div>
</form>
</div>
<style>
.each_sec{float:left;width:200px;margin:0 10px 0 0;}
.formDiv{width:60%;border:1px solid #000;padding:30px;height:200px;}
.btnSubmit input {
    margin: 10px 52px 0 0;
    float: left;
}
</style>