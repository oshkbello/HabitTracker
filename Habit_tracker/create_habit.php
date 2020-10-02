<?php
//calling the db conection file
//require_once "htdb_con.php";
include('htdb_con.php');

if (isset($_POST["submit"])) {

	$habit_title = $_POST["habit_title"];
	$user_code = $_POST["user_code"];

	//verify its not empty
	if (!empty($habit_title) && !empty($user_code)){

		#Saving new habits into a text file
		$habit = str_replace(' ', '_', $habit_title);
		$fileName = "./NewHabits/".$habit.".txt";
		$newFileContent = PHP_EOL .str_replace('_', ' ', $habit_title);
		if (file_put_contents($fileName, $newFileContent)){
			echo "File Created(". basename($newFileContent.")");
		}else{
			echo "Cannot create file (".basename($newFileContent.")");
		}

		header("Location: habitTracker.php");

	}

}else{
	echo "its not set";
}

?>