<?php 
//connecting to habti tracker mysql db
function linkUp(){
	global $mysqli;

	//connecting to server & database.
	$mysqli = mysqli_connect("localhost", "root", "", "habit_tracker");

	//incase the db connection doesnt work, I'm able to see what went wrong by printing a message
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
}

?>