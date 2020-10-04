<?php
		$habit = $_POST['habit'];
		$fileName = "./NewHabits/".$habit.".txt";
		if (!unlink($fileName)) {  
    		echo ("$fileName cannot be deleted due to an error");  
		}else {  
    		echo ("$file_pointer has been deleted");  
		}  

		header("Location: habitTracker.php");
?>