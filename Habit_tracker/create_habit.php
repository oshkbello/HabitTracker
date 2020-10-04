<?php
//calling the db conection file
//require_once "htdb_con.php";
include('htdb_con.php');

if (isset($_POST["submit"])) {

	$habit_title = $_POST["habit_title"];

	//verify its not empty
	if (!empty($habit_title){

		#Saving new habits into a text file
		$habit = str_replace(' ', '_', $habit_title);
		$fileName = "./NewHabits/".$habit.".txt";
		$newFileContent = str_replace('_', ' ', $habit_title);
		if (file_put_contents($fileName, $newFileContent)){
			echo "File Created(". basename($newFileContent.")");
			//$current = file_get_contents($fileName);
			$current = PHP_EOL."0";
			file_put_contents($fileName, $current, FILE_APPEND);
		}else{
			echo "Cannot create file (".basename($newFileContent.")");
		}

		header("Location: habitTracker.php");

	}

}else{
	echo "its not set";
}

?>
