<title>Sort in ascending </title>
<?php
$my_array = array(16,22,6,1,2,1,9,20,4,7,12,3,15,43);
echo "<pre>";
print_r($my_array);
echo "</pre>";
echo "<hr>";
$sorted_ar = array();
while(count($my_array)>0){
$min_key = array_search(min($my_array),$my_array);
$sorted_ar[] = $my_array[$min_key];
unset($my_array[$min_key]);
}
echo "<pre>";
print_r($sorted_ar);
echo "</pre>";
?>
