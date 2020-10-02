<?php include('htdb_con.php'); include('all_style.css');?>
<div style="width:800px; margin:0 auto;">
	<div>
		<h2>Habit Tracker</h2>
		<h4>
			<p>
				<?php 
				echo "Current Habit: ";
				$habit = $_GET['habit'];//'Wake_Up_5_am'; //variable for the file name we are working with
				
				//the location to the file
				$fileName = "./NewHabits/".$habit; 
				//current time
				$currentDateTime = strtotime(date('Y-m-d H:i:s'));
				

				if(!isset($_POST['streak']))
				{
					//reading last file entry and saving into an arraay of string
					$file = file($fileName); 
					$pieces = $file[count($file) - 1];
					$dt = explode(" ", $pieces); 

					//check if habit was done within last 24hrs. Calculate the dateerence in hours
					$date = abs($currentDateTime - $dt[0]);
					
					//calculate years
					$years = floor($date / (365*60*60*24));  
  					
  					//calculate months
					$months = floor(($date - $years * 365*60*60*24) / (30*60*60*24));  
  					
  					//calculate days 
					$days = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 

					//calculate hourse
					$hours = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));  

					if ($dt[0] == 0){
						$streak = 0;
					}elseif ($dt[0] > 0 && $hours > 24) {
						# code...
						$streakCount = PHP_EOL . "$currentDateTime * $streak"; //to force a new line
						$streak = 0;
					}else{
						$streak = $dt[2];
					}

				}else{
					//increment streak by 1
					$streak = $_POST['streak'] + 1;
					//Create a record of consequtive streak
					$streakCount = PHP_EOL . "$currentDateTime * $streak"; //to force a new line
					
					if (file_put_contents($fileName, $streakCount, FILE_APPEND)){
						echo " ";
					}else{
						echo " ";
					}
				}
				
				echo fgets(fopen($fileName, 'r'));
				?>
			</p>
		</h>
		<p>In order to track today's fulfilment of your daily habit, you have to tap on the big button below. If you do not tap the button atleast once in a day, you will loose your streak and start all over again. Your goal is to create a 21 day streak of daily habit.</p>
	</div>
	<div style="width:300px; margin:0 auto;">
		<div style="margin:0 auto;">
			<p>Your current Streak is <?php echo "<span> $streak day(s)</span>";?></p>
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="hidden" name="streak" id="streak" value="<?php echo $streak;?>"/>
			<button class="button butnround" type="submit"> Tap </button>
		</form>
	</div>
</div>
