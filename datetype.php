<?php
$firstDate = '2014-12-30';
$freq=1;

function getDateType($passingDate){
	$dateFlag = 'first';
	$firstDay = date('j',strtotime($passingDate));
	$lastDay = date('t',strtotime($passingDate));
	
	if($firstDay>1 && $firstDay<$lastDay)
		$dateFlag = 'middle';
	elseif($firstDay==$lastDay)
		$dateFlag = 'last';
		return $dateFlag;
} 


function getNextCreditDate($firstDate,$freq){
	$passingDate = $firstDate;
	$dateFlag = getDateType($firstDate);
	echo $dateFlag;
	$array = array();
	$num_term = date('Y-m-d');
	while ($firstDate <= $num_term) {
	$array[] = $firstDate;
	// echo $firstDate.' <br>';
	for($i=1;$i<=$freq;$i++){
			if($dateFlag!='middle')
			$firstDate = date("Y-m-d",strtotime("$dateFlag day of next month",strtotime($firstDate)));
		else {
			$firstDay = date('j',strtotime($passingDate));
			$y = date('y',strtotime($firstDate));
			$m = date('m',strtotime($firstDate));
			$m++;
			$firstDate = date("Y-m-d", mktime(0,0,0,$m,$firstDay,$y));
			}
		}
	}
	return $array;
	
}
echo "<pre>";
print_r(getNextCreditDate($firstDate,$freq));
echo "</pre>";

// echo $date = date("Y-m-d",mktime(0,0,0,2,29,2018));
?>