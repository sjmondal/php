<title>FILE CUT PASTE FROM ONE TO ANOTHER DIRECTORY</title>
<?php
$source = "source";
$handle  = opendir($source);
$dir_path = dirname(__FILE__);

while(false != ($entry = readdir($handle)) ){
	if(!is_dir($entry)){
	$dest_path = $dir_path."/processed/".$entry;
	copy($entry,$dest_path);
	unlink($dir_path."/source/".$entry);
	}
	
}

?>