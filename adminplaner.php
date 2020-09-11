<?php


	session_start();
	
	$msg = "";

		$link = mysqli_connect("localhost", "root", "", "planner");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}
		
		$query = "SELECT * FROM pictures";
			
		$row = mysqli_fetch_array(mysqli_query($link, $query));

		if(array_key_exists("submit", $_POST)) {
			
		
			$query= "UPDATE pictures SET dayp = '".mysqli_real_escape_string($link,$_POST['dayp'])."', wnotep = '".mysqli_real_escape_string($link,$_POST['wnotep'])."', weekp = '".mysqli_real_escape_string($link,$_POST['weekp'])."', momentsp = '".mysqli_real_escape_string($link,$_POST['momentsp'])."', placesp = '".mysqli_real_escape_string($link,$_POST['placesp'])."', quotep = '".mysqli_real_escape_string($link,$_POST['qoutep'])."', todop = '".mysqli_real_escape_string($link,$_POST['todop'])."', monthp = '".mysqli_real_escape_string($link,$_POST['monthp'])."', mnotep = '".mysqli_real_escape_string($link,$_POST['mnotep'])."', bdayp = '".mysqli_real_escape_string($link,$_POST['bdayp'])."', daysmp = '".mysqli_real_escape_string($link,$_POST['daysmp'])."' LIMIT 1 "; 
			

				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
		}}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  
	<title>My planner</title> 
	<meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  
	  <style type="text/css">

				
			body {
				 background-color:#F5EDEB;
				 color:black;
				 margin-left:100px;
				 font-family:Lucida Handwriting;

				}


		</style>
	</head>
  <body>
  
  <br>

		<?php
		
			if(array_key_exists("id", $_SESSION)) {
			
			echo "<a href='loginplaner.php?logout=1' class='btn btn-secondary btn active' aria-pressed='true'>Log out</a>";
			
			}else {
			
			header("Location: loginplaner.php");
			
			}
		?>


	<?php
	
		echo "<br><p id='msg'>".$msg."</p>";
	?>
	<form method="post">

	<p> Type image names for the appropriate parts of the page.  </p>
	<br>
	<br><hr>
	<p> Week planer: </p>
	<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Days of the week</label>
			  <div class="col-7">
				<textarea id="text" name="dayp"><?php echo $row['dayp'];?> </textarea>			  </div>
		</div>
		
	<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Notes:</label>
			  <div class="col-7">
			<textarea id="text" name="wnotep"><?php echo $row["wnotep"]; ?> </textarea>			  </div>
		</div>
		
		<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Week:</label>
			  <div class="col-7">
			<textarea id="text" name="weekp"><?php echo $row["weekp"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
	<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Moments:</label>
			  <div class="col-7">
			<textarea id="text" name="momentsp"><?php echo $row["momentsp"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
			<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Places:</label>
			  <div class="col-7">
			<textarea id="text" name="placesp"><?php echo $row["placesp"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
			<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Quote:</label>
			  <div class="col-7">
			<textarea id="text" name="qoutep"><?php echo $row["quotep"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
	<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">To-do:</label>
			  <div class="col-7">
			<textarea id="text" name="todop"><?php echo $row["todop"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
		
	<br><br><hr>
	
		<p> Month planer: </p>
	<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Month:</label>
			  <div class="col-7">
				<textarea id="text" name="monthp"><?php echo $row["monthp"]; ?> </textarea>			  </div>
		</div>
		
	<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Notes:</label>
			  <div class="col-7">
			<textarea id="text" name="mnotep"><?php echo $row["mnotep"]; ?> </textarea>			  </div>
		</div>
		
		<div class="form-group row">
	
		  <label for="example-password-input" class="col-3 col-form-label">Birthdays</label>
			  <div class="col-7">
			<textarea id="text" name="bdayp"><?php echo $row["bdayp"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
	<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Days:</label>
			  <div class="col-7">
			<textarea id="text" name="daysmp"><?php echo $row["daysmp"]; ?> </textarea>			  </div>
			  </div>
		</div>
		
		
	<hr>
	
			<button name="submit" type="submit" class="btn btn-outline-secondary btn active" id="dugme">Save all</button>

	</form>
  </body>
	
</html>


