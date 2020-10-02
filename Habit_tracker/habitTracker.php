<div>
	<h3> Welcome to habit Tracker </h3>
	<form action="create_habit_frontend.php" method="post">
		<div style="">
			<div>
				<label>Habit List(s): </label>
				<div>
					<?php
						$dir = "./NewHabits/";
						$file = array_diff(scandir($dir), array('.', '..'));
						if (empty($file)){
							echo "<i> You do not have any habits you are tracking. To create use the button below! </i>";
						}
						echo "<ul>";
						foreach ($file as $value)
						{
							# code...
							$rawName = str_replace('_', ' ', $value);
							echo '<li><a href="trackHabit.php?habit='.$value.'">'.
								substr($rawName, 0, strrpos($rawName, ".")).'</a> </li>';
						}
						echo "</ul>";
					?>
				</div>
			</div>
			<div style="padding-top:10px;">
				<button type="submit" name="submit" id="submit">Create New Habit</button>
			</div>
		</div>
	</form>
</div>