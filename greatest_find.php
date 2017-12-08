<title>Find greatest from array</title>
<?php
$my_array = array(16,22,50,6,1,1,9,20,4,7,12,3,15,20,43);

function array_max($arr)
{
	$temp = '';
foreach($arr as $index=>$elem){
	if($temp==''){
		if($elem>=$my_array[($index+1)])
			$temp = $elem;
		else $temp = $my_array[($index+1)];
		}
		else{
		if($elem>=$temp)
			$temp = $elem;
		else $temp = $temp;	
		}
}
return  $temp;
}
echo array_max($my_array);
?>