<?php
session_start();
/*echo '<pre>';
print_r($_SESSION['stored']);
echo '</pre>';*/
if(isset($_POST['action'])){
	$ses_ar = $_SESSION['stored'];
	$sort = array();
foreach($ses_ar as $k=>$v) {
    $sort['name'][$k] = $v['name'];
    $sort['age'][$k] = $v['age'];
}
	if($_POST['sort_by']=='age' && $_POST['sort_dir']=='asc'){
	array_multisort($sort['age'], SORT_ASC,$sort['age'], SORT_ASC,$ses_ar);
	}
	elseif($_POST['sort_by']=='age' && $_POST['sort_dir']=='desc'){
	array_multisort($sort['age'], SORT_DESC,$sort['age'], SORT_DESC,$ses_ar);
	}
	
	elseif($_POST['sort_by']=='name' && $_POST['sort_dir']=='asc'){
	array_multisort($sort['name'], SORT_ASC,$sort['name'], SORT_ASC,$ses_ar);
	}
	elseif($_POST['sort_by']=='name' && $_POST['sort_dir']=='desc'){
	array_multisort($sort['name'], SORT_DESC,$sort['name'], SORT_DESC,$ses_ar);
	}
	
$_SESSION['stored'] = $ses_ar;
}

if(isset($_SESSION['stored']) && !empty($_SESSION['stored'])){
	?>
     <form id="listform" name="list" action="" method="post">
    <table>
    <tr>
	<th align="center" width="50%">Name
	<a href="javascript:void(0);" onClick="submitForm('name','asc');">
    <i class="fa fa-arrow-down" aria-hidden="true"></i>
    </a>
    <a href="javascript:void(0);" onClick="submitForm('name','desc');"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
	</th>
	<th width="50%">Age<a href="javascript:void(0);" onClick="submitForm('age','asc');"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
    <a href="javascript:void(0);" onClick="submitForm('age','desc');"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></th></tr>
	<?php
	foreach($_SESSION['stored'] as $index=>$eachVal)
	{
	?>
<tr><td align="center" width="50%"><?php echo $eachVal['name'];?></td><td><?php echo $eachVal['age'];?></td></tr>
<?php
	}
	?>
    </table>
    <input type="button" onclick="window.location.href='aa.php'" value="Back">
    <input type="hidden" id="sort_by" name="sort_by" value="">
    <input type="hidden" id="sort_dir" name="sort_dir" value="">
    <input type="hidden" name="action" value="1">
    </form>
    <?php
}
?>
<script>
function submitForm(sort_by,sort_dir)
{
document.getElementById("sort_by").value = sort_by;
document.getElementById("sort_dir").value = sort_dir;
document.getElementById("listform").submit();
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">