<?php
	$name = $_GET['name'];
	$id = $_GET['id'];
	if(file_exists($name.'/index.php') && file_exists($name.'/read.php')){
       	header('Location: '.$name.'/index.php?name='.$name.'&id='.$id);
	}else{
	    $originIndex = 'exIndex.php';
	    $originRead = 'exRead.php';
	    mkdir($name);
		$newIndex = $name.'/index.php';
		$newRead = $name.'/read.php';
		if (copy($originIndex, $newIndex) && copy($originRead, $newRead)) {
		  	header('Location: '.$name.'/index.php?name='.$name.'&id='.$id);
		}else {
			echo "Loading Error... So sorry :(\n";
		}
	}
?>