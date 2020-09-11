<?php

	session_start();
	
	$msg= "";
	$msga = "";
	$msgd = "";
	$diarycontent= "";
	
		if(array_key_exists("id", $_COOKIE)) {
			
			$_SESSION['id']=$_COOKIE['id'];
		}
		
		$link = mysqli_connect("localhost", "root", "", "planner");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}
		
		if(array_key_exists("id", $_SESSION)) {
			
			$sql= "SELECT * FROM habits WHERE id_korisnk = '".mysqli_real_escape_string($link, $_SESSION['id'])."' ";
			
			$result = $link->query($sql);
			
			
			}
		
	if(array_key_exists("submit", $_POST)) {
		

				$query = "DELETE FROM habits WHERE habit = '".mysqli_real_escape_string($link,$_POST['habbit'])."' ";
				
				if(mysqli_query($link, $query)) {

				$query = "INSERT INTO habits (habit, mon, tue, wed, thu, fri, sat, sun, id_korisnk) VALUES ('".mysqli_real_escape_string($link, $_POST['habbit'])."', '".mysqli_real_escape_string($link, $_POST['mon'])."', '".mysqli_real_escape_string($link, $_POST['tue'])."', '".mysqli_real_escape_string($link, $_POST['wed'])."', '".mysqli_real_escape_string($link, $_POST['thu'])."', '".mysqli_real_escape_string($link, $_POST['fri'])."', '".mysqli_real_escape_string($link, $_POST['sat'])."', '".mysqli_real_escape_string($link, $_POST['sun'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."')  LIMIT 1";

				
				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
				}
				}
				
			
		}
		
		if(array_key_exists("submit1", $_POST)){
			
				if ($_POST['habit'] == ''){
					
					$msga = "Please enter the name of the habit.";
					
				} else {
					
				
					$query = "INSERT INTO habits (habit, mon, tue, wed, thu, fri, sat, sun, id_korisnk) VALUES ('".mysqli_real_escape_string($link, $_POST['habit'])."', '', '', '', '', '', '', '', '".mysqli_real_escape_string($link, $_SESSION['id'])."')  LIMIT 1";
			
					if (mysqli_query($link, $query)) {
					
						$msg= "Saved.";
					
					}
			}
		}
		
		if(array_key_exists("submit2", $_POST)){
			
			if ($_POST['habitt'] == ''){
				
				$msgd = "Please enter the name of the habit.";
				
			}else {
			
				$query = "DELETE FROM habits WHERE habit = '".mysqli_real_escape_string($link,$_POST['habitt'])."' ";
			
					if (mysqli_query($link, $query)) {
					
					$msg= "Deleted.";
					
				}
			}
		}
	
	
		
		
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  
	<title>My planner</title> 
	<meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  
	  <style type="text/css">
		
			html { 
				  background: url(pozadina1.jpg) no-repeat center center fixed; 
				  -webkit-background-size: cover;
				  -moz-background-size: cover;
				  -o-background-size: cover;
				  background-size: cover;
				  
				}
				
			body {
				 background:none;
				}
		
			#logout{
				margin-left:1050px;	
				font-family:Lucida Handwriting;
			}
					
				
			#navbar{
				font-size:22px;
			}
		
			
			.sl {
				width:150px;
			}
			
			.sli {
				width:150px;
				height:150px;
			}
			
			#habit {
				width:200px;
				height:80px;
			}
			
			#day {
				width:100px;
				height:50px;
				font-family:Lucida Handwriting;

			}
			
			#add, #addd {
			  padding: 5px;
			  text-align: center;
			  background-color: #F5EDEB;
			  border: solid 1px #c3c3c3;
			  font-family:Lucida Handwriting;
			}

			#add {
			  padding: 50px;
			  display: none;
			}
			
			#deleted, #deletedd {
			  padding: 5px;
			  text-align: center;
			  background-color: #E8E3DF;
			  border: solid 1px #c3c3c3;
			  font-family:Lucida Handwriting;
			}

			#deletedd {
			  padding: 50px;
			  display: none;
			}
			
			#thead {
				background-color: #F5EDEB;
				font-family:Lucida Handwriting;
			}
			
			#msg {
				font-family:Lucida Handwriting;
			}
			
			#tekkst {
				font-family:Lucida Handwriting;

			}
			
			
			

		</style>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
			
			$(document).ready(function(){
				$("#addd").click(function(){
				$("#add").slideDown("slow");
				});
			});
			
			$(document).ready(function(){
				$("#adgore").click(function(){
				$("#add").slideUp("slow");
				});
			});
			
			$(document).ready(function(){
				$("#deleted").click(function(){
				$("#deletedd").slideDown("slow");
				});
			});
			
			$(document).ready(function(){
				$("#delgore").click(function(){
				$("#deletedd").slideUp("slow");
				});
			});
			</script>
	</head>
  <body>
  

	<img src="naslovna.jpg" class="img-fluid" alt="Responsive image" width="100%">
	
	
	
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="navbar">
	  
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto nav justify-content-center">
		  <li class="nav-item">
			<a class="nav-link" href="weekplaner.php">   W  E  E  K    </a>
		  </li>
			<p> . .   .    </p>
			<li class="nav-item">
			<a class="nav-link" href="monthplaner.php">   M O N T H    </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link active" href="habitsplaner.php">H  A  B  I  T  S        </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link" href="dairyplaner.php">D  I  A  R  Y </a>
		  </li>
			<p> . .   .    </p>
		</ul>
		
		<?php
		
			if(array_key_exists("id", $_SESSION)) {
			
			echo"<li><a href='loginplaner.php?logout=1' class='btn btn-secondary btn active' aria-pressed='true'>Log out</a></li>";
			
			}else {
			
			header("Location: loginplaner.php");
			
			}
		?>
		

	  </div>
	</nav>
	
		<?php
		echo "<br><p id='msg'>".$msg."</p>";
		?>
	
			
<form method="post">			
			
			<table class="table table-bordered">
			  <thead id="thead">
				<tr>
				  <th>Habits</th>
				  <th>Mon</th>
				  <th>Tue</th>
				  <th>Wed</th>
				  <th>Thu</th>
				  <th>Fri</th>
				  <th>Sat</th>
				  <th>Sun</th>
				  <th>Save</th>
				</tr>
			  </thead>
			  <tbody>
			  
			  <?php 
			  
				if ($result->num_rows > 0) {
				// output data of each row
				
	
				while($row = $result->fetch_assoc()) {
					

				echo "<form method ='post'><tr><td id='habit'><textarea name='habbit' id='tekkst'>".@$row['habit']."</textarea></td><td><textarea id='day' name = 'mon'>".@$row['mon']."</textarea></td><td><textarea id='day' name = 'tue'>".@$row['tue']."</textarea></td><td><textarea id='day' name = 'wed'>".@$row['wed']."</textarea></td><td><textarea id='day' name = 'thu'>".@$row['thu']."</textarea></td><td><textarea id='day' name = 'fri'>".@$row['fri']."</textarea></td><td><textarea id='day' name = 'sat'>".@$row['sat']."</textarea></td><td><textarea id='day' name = 'sun'>".@$row['sun']."</textarea></td><td><button id='sl' name='submit' type='submit' class='btn btn-outline-secondary'>Save</button></td></tr></form> " ; }


				} else {
		  echo "Add your habits.";
		}
		
		
		$link->close();
		
		?>
			  </tbody>
			</table>
	

		<?php
		echo "<br><p id='msg'>".$msga."</p>";
		echo "<p id='msg'>".$msgd."</p>";
		?>
		
		<p id="addd"> Add habit </p>
		<div class="form-group" id="add">
		<input type="add" name="habit" class="form-control" placeholder="Habit">
		<small class="form-text text-muted">Write the name of your habit.</small>
		<br>
		<button id="adgore" name="submit1" type="submit1" class="btn btn-outline-secondary">Add habit</button>
		</div>
		
	
		<p id="deleted"> Delete habit </p>
		<div class="form-group" id="deletedd">
		<input  name="habitt" class="form-control" placeholder="Habit">
		<small  class="form-text text-muted">Type the name of the habit you want to delete.</small>
		<br>
		<button id="delgore" name="submit2" type="submit2" class="btn btn-outline-secondary">Delete habit</button>
		</div>

					
		<table class="table table-bordered">
			<tbody>
				<tr id="dio">
					<td class="sl"><img class="sli" src="cvijet1.jpg"></td>
					<td class="sl"><img class="sli" src="citat1.jpg"></td>
					<td class="sl"><img class="sli" src="cvijet2.jpg"></td>
						<br>
					<td class="sl"><img class="sli" src="habit.jpg"></td>

						<br><br>
					</td>
					<td class="sl"><img class="sl" src="cvijet3.jpg"></td>
					<td class="sl"><img class="sl" src="citat2.jpg"></td>
					<td class="sl"><img class="sl" src="cvijet4.jpg"></td>							
				</tr>
			</tbody>
		</table>

	</form>
	
</body>
</html>