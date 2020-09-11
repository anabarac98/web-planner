<?php

	session_start();
	
	$msg= "";
	$diarycontent= "";
	
		
	
		if(array_key_exists("id", $_COOKIE)) {
			
			$_SESSION['id']=$_COOKIE['id'];
		}
		
		$link = mysqli_connect("localhost", "root", "", "planner");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}
		
		if(array_key_exists("id", $_SESSION)) {
			
			$query = "SELECT * FROM pictures";
			
			$rows = mysqli_fetch_array(mysqli_query($link, $query));
			
			$query = "SELECT * FROM week WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$row = mysqli_fetch_array(mysqli_query($link, $query));
			
			
			}
		
	if(array_key_exists("submit", $_POST)) {
		
			$query = "SELECT id FROM week WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			
			if (mysqli_num_rows($result) > 0) {
				
				
				$query= "UPDATE week SET monday = '".mysqli_real_escape_string($link,$_POST['monday'])."', tuesday = '".mysqli_real_escape_string($link,$_POST['tuesday'])."', wednesday = '".mysqli_real_escape_string($link,$_POST['wednesday'])."', thursday = '".mysqli_real_escape_string($link,$_POST['thursday'])."', friday = '".mysqli_real_escape_string($link,$_POST['friday'])."', saturday = '".mysqli_real_escape_string($link,$_POST['saturday'])."', sunday = '".mysqli_real_escape_string($link,$_POST['sunday'])."', note = '".mysqli_real_escape_string($link,$_POST['note'])."', weeek = '".mysqli_real_escape_string($link,$_POST['week'])."', moments = '".mysqli_real_escape_string($link,$_POST['moments'])."', places = '".mysqli_real_escape_string($link,$_POST['places'])."', book = '".mysqli_real_escape_string($link,$_POST['book'])."', todo = '".mysqli_real_escape_string($link,$_POST['todo'])."' WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1 ";
				
				
				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
				}
			
				
			} else {
	
				
				$query = "INSERT INTO week (monday, tuesday, wednesday, thursday, friday, saturday, sunday, note, weeek, moments, places, book, todo, id_korisnik) VALUES ('".mysqli_real_escape_string($link, $_POST['monday'])."', '".mysqli_real_escape_string($link, $_POST['tuesday'])."', '".mysqli_real_escape_string($link, $_POST['wednesday'])."', '".mysqli_real_escape_string($link, $_POST['thursday'])."', '".mysqli_real_escape_string($link, $_POST['friday'])."', '".mysqli_real_escape_string($link, $_POST['saturday'])."', '".mysqli_real_escape_string($link, $_POST['sunday'])."', '".mysqli_real_escape_string($link, $_POST['note'])."', '".mysqli_real_escape_string($link, $_POST['week'])."', '".mysqli_real_escape_string($link, $_POST['moments'])."', '".mysqli_real_escape_string($link, $_POST['places'])."', '".mysqli_real_escape_string($link, $_POST['book'])."', '".mysqli_real_escape_string($link, $_POST['todo'])."','".mysqli_real_escape_string($link, $_SESSION['id'])."')  LIMIT 1";

				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
					
				}
			}
		}
		
		if(array_key_exists("submit1", $_POST)){
			
			$query = "DELETE FROM week WHERE id_korisnik = '".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
			
				if (mysqli_query($link, $query)) {
					
					$msg= "Deleted.";
					
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
				
		
			#logout{
				margin-left:1050px;	
			}
					
				
			#navbar{
				font-size:22px;
			}
			
			#diary{
				height:900px;
				font-family:Lucida Handwriting;
			}
			
			#msg {
				color:black;
				font-family:Lucida Handwriting;
				margin-left:30px;
			}
			
			#dio {
				width:550px;
			}
			
			#day {
				padding-top:25px;
				width: 200px;
				font-family:Lucida Handwriting;
				font-size:22px;
				color:white;
				text-align:center;
				background-image: url('<?php echo $rows['dayp'];?>');
				background-repeat: no-repeat;
				background-size:100%;
			}
			
			#text {
				padding:0px;
				width:370px;
				font-family:Lucida Handwriting;
			}
			
			#textslike {
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
			}
			
			#moments {
				margin-top:25px;
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:white;
				width:180px;
				height:180px;
				background-image: url('<?php echo $rows['momentsp'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			#places {
				margin-top:25px;
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:white;
				width:180px;
				height:180px;
				background-image: url('<?php echo $rows['placesp'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			#book {
				margin-top:25px;
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:white;
				width:180px;
				height:180px;
				background-image: url('<?php echo $rows['quotep'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			#note {
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:black;
				width:350px;
				height:248px;
				background-image: url('<?php echo $rows['wnotep'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			#week {
				margin-top:20px;
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:black;
				width:210px;
				height:150px;
				background-image: url('<?php echo $rows['weekp'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}

			
			#todo {
				margin-left:70px;
				font-family:Lucida Handwriting;
				font-size:18px;
				text-align:center;
				color:black;
				width:450px;
				height:450px;
				background-image: url('<?php echo $rows['todop'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			.sl {
				width:150px;
			}
			
			.sli {
				width:150px;
				height:150px;
			}
		</style>
	</head>
  <body>
  

	<img src="naslovna.jpg" class="img-fluid" alt="Responsive image" width="100%">
	
	
	
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="navbar">
	  
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto nav justify-content-center">
		  <li class="nav-item">
			<a class="nav-link active" href="weekplaner.php">   W  E  E  K    </a>
		  </li>
			<p> . .   .    </p>
		<li class="nav-item">
			<a class="nav-link" href="monthplaner.php">   M O N T H    </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link" href="habitsplaner.php">H  A  B  I  T  S        </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link" href="dairyplaner.php">D  I  A  R  Y </a>
		  </li>
			<p> . .   .    </p>
		</ul>
		
		<?php
		
			if(array_key_exists("id", $_SESSION)) {
			
			echo "<li><a href='loginplaner.php?logout=1' class='btn btn-secondary btn active' aria-pressed='true'>Log out</a></li>";
			
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
	<table class="table">
	  <tbody>
		<tr>
		  <td id="dio">
				
						<table class="table">
							  <tbody>
								<tr>
								  <td id="day">Monday</td>
								  <td><textarea  id="text" name="monday"> <?php echo $row["monday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Tuesday</td>
								  <td><textarea id="text" name="tuesday"> <?php echo $row["tuesday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Wednesday</td>
								  <td><textarea id="text" name="wednesday"> <?php echo $row["wednesday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Thursday</td>
								  <td><textarea id="text" name="thursday"> <?php echo $row["thursday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Friday</td>
								  <td><textarea id="text" name="friday"> <?php echo $row["friday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Saturday</td>
								  <td><textarea id="text" name="saturday"> <?php echo $row["saturday"] ?> </textarea></td>
								</tr>
								<tr>
								  <td id="day">Sunday</td>
								  <td><textarea id="text" name="sunday"> <?php echo $row["sunday"] ?> </textarea></td>
								</tr>
							  </tbody>
							</table>
							
							
							
							<table class="table">
							  <tbody>
								<tr id="dio">
								  <td><p id="textslike">Moments</p><textarea id="moments" name="moments"><?php echo $row["moments"]; ?></textarea></td>
								  <td><p id="textslike">Places</p><textarea id="places" name="places"><?php echo $row["places"]; ?></textarea></td>
								  <td><p id="textslike">Quote</p><textarea id="book" name="book"><?php echo $row["book"];?></textarea></td>
								</tr>
							  </tbody>
							</table>
		  
		  
		  </td>
		  
		  <td>
				<table class="table">
					<tbody>
						<tr id="dio">
							<td><p id="textslike">N O T E S<textarea id="note" name="note"><?php echo $row["note"] ?></textarea><p></td>
							<td><p id="textslike">Week<textarea id="week" name="week"><?php echo $row["weeek"] ?></textarea><p></td>
						</tr>
					</tbody>
				</table>
				
				<table class="table">
					<tbody>
						<tr id="dio">
							<td><p id="textslike">TO DO LIST</p><textarea id="todo" name="todo"><?php echo $row["todo"] ?></textarea></td>
						</tr>
					</tbody>
				</table>
		  
		  </td>
		</tr>
	  </tbody>
	</table>

	<table class="table table-bordered">
					<tbody>
						<tr id="dio">
							<td class="sl"><img class="sli" src="cvijet1.jpg"></td>
							<td class="sl"><img class="sli" src="citat1.jpg"></td>
							<td class="sl"><img class="sli" src="cvijet2.jpg"></td>
							<td class="sl">
								<br>
								<input type="hidden" name="save" value="0">
								<button id="sl" name="submit" type="submit" class="btn btn-outline-secondary">Save all</button>
								<br><br>
								<input type="hidden" name="save" value="1">
								<button id="sl" name="submit1" type="submit1" class="btn btn-outline-secondary">Delete all</button>
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