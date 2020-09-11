<?php

	session_start();
	
	$msg= "";
	
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
			
			$query = "SELECT * FROM month WHERE id_korisnikk = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$row = mysqli_fetch_array(mysqli_query($link, $query));
			
			
			}
		
	if(array_key_exists("submit", $_POST)) {
		
		
			$query = "SELECT id FROM month WHERE id_korisnikk = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			
			if (mysqli_num_rows($result) > 0) {
				
				
				$query= "UPDATE month SET monthh = '".mysqli_real_escape_string($link,$_POST['month'])."', notes = '".mysqli_real_escape_string($link,$_POST['notes'])."', bday = '".mysqli_real_escape_string($link,$_POST['bday'])."', mon1 = '".mysqli_real_escape_string($link,$_POST['mon1'])."', mon2 = '".mysqli_real_escape_string($link,$_POST['mon2'])."', mon3 = '".mysqli_real_escape_string($link,$_POST['mon3'])."', mon4 = '".mysqli_real_escape_string($link,$_POST['mon4'])."', mon5 = '".mysqli_real_escape_string($link,$_POST['mon5'])."', tue1 = '".mysqli_real_escape_string($link,$_POST['tue1'])."', tue2 = '".mysqli_real_escape_string($link,$_POST['tue2'])."', tue3 = '".mysqli_real_escape_string($link,$_POST['tue3'])."', tue4 = '".mysqli_real_escape_string($link,$_POST['tue4'])."', tue5 = '".mysqli_real_escape_string($link,$_POST['tue5'])."' , wed1 = '".mysqli_real_escape_string($link,$_POST['wed1'])."', wed2 = '".mysqli_real_escape_string($link,$_POST['wed2'])."', wed3 = '".mysqli_real_escape_string($link,$_POST['wed3'])."', wed4 = '".mysqli_real_escape_string($link,$_POST['wed4'])."', wed5 = '".mysqli_real_escape_string($link,$_POST['wed5'])."', thu1 = '".mysqli_real_escape_string($link,$_POST['thu1'])."', thu2 = '".mysqli_real_escape_string($link,$_POST['thu2'])."', thu3 = '".mysqli_real_escape_string($link,$_POST['thu3'])."', thu4 = '".mysqli_real_escape_string($link,$_POST['thu4'])."', thu5 = '".mysqli_real_escape_string($link,$_POST['thu5'])."' , fri1 = '".mysqli_real_escape_string($link,$_POST['fri1'])."', fri2 = '".mysqli_real_escape_string($link,$_POST['fri2'])."', fri3 = '".mysqli_real_escape_string($link,$_POST['fri3'])."', fri4 = '".mysqli_real_escape_string($link,$_POST['fri4'])."', fri5 = '".mysqli_real_escape_string($link,$_POST['fri5'])."', sat1 = '".mysqli_real_escape_string($link,$_POST['sat1'])."', sat2 = '".mysqli_real_escape_string($link,$_POST['sat2'])."', sat3 = '".mysqli_real_escape_string($link,$_POST['sat3'])."', sat4 = '".mysqli_real_escape_string($link,$_POST['sat4'])."', sat5 = '".mysqli_real_escape_string($link,$_POST['sat5'])."' , sun1 = '".mysqli_real_escape_string($link,$_POST['sun1'])."', sun2 = '".mysqli_real_escape_string($link,$_POST['sun2'])."', sun3 = '".mysqli_real_escape_string($link,$_POST['sun3'])."', sun4 = '".mysqli_real_escape_string($link,$_POST['sun4'])."', sun5 = '".mysqli_real_escape_string($link,$_POST['sun5'])."' WHERE id_korisnikk = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1 "; 
				
				
				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
				}
			
				
			} else {
	
			$query = "INSERT INTO month (monthh, notes, bday, mon1, mon2, mon3, mon4, mon5, tue1, tue2, tue3, tue4, tue5, wed1, wed2, wed3, wed4, wed5, thu1, thu2, thu3, thu4, thu5, fri1, fri2, fri3, fri4, fri5, sat1, sat2, sat3, sat4, sat5, sun1, sun2, sun3, sun4, sun5, id_korisnikk) VALUES ('".mysqli_real_escape_string($link, $_POST['month'])."', '".mysqli_real_escape_string($link, $_POST['notes'])."', '".mysqli_real_escape_string($link, $_POST['bday'])."', '".mysqli_real_escape_string($link, $_POST['mon1'])."', '".mysqli_real_escape_string($link, $_POST['mon2'])."', '".mysqli_real_escape_string($link, $_POST['mon3'])."', '".mysqli_real_escape_string($link, $_POST['mon4'])."', '".mysqli_real_escape_string($link, $_POST['mon5'])."', '".mysqli_real_escape_string($link, $_POST['tue1'])."', '".mysqli_real_escape_string($link, $_POST['tue2'])."', '".mysqli_real_escape_string($link, $_POST['tue3'])."', '".mysqli_real_escape_string($link, $_POST['tue4'])."', '".mysqli_real_escape_string($link, $_POST['tue5'])."', '".mysqli_real_escape_string($link, $_POST['wed1'])."', '".mysqli_real_escape_string($link, $_POST['wed2'])."', '".mysqli_real_escape_string($link, $_POST['wed3'])."', '".mysqli_real_escape_string($link, $_POST['wed4'])."', '".mysqli_real_escape_string($link, $_POST['wed5'])."', '".mysqli_real_escape_string($link, $_POST['thu1'])."', '".mysqli_real_escape_string($link, $_POST['thu2'])."', '".mysqli_real_escape_string($link, $_POST['thu3'])."', '".mysqli_real_escape_string($link, $_POST['thu4'])."', '".mysqli_real_escape_string($link, $_POST['thu5'])."','".mysqli_real_escape_string($link, $_POST['fri1'])."', '".mysqli_real_escape_string($link, $_POST['fri2'])."', '".mysqli_real_escape_string($link, $_POST['fri3'])."', '".mysqli_real_escape_string($link, $_POST['fri4'])."', '".mysqli_real_escape_string($link, $_POST['fri5'])."', '".mysqli_real_escape_string($link, $_POST['sat1'])."', '".mysqli_real_escape_string($link, $_POST['sat2'])."', '".mysqli_real_escape_string($link, $_POST['sat3'])."', '".mysqli_real_escape_string($link, $_POST['sat4'])."', '".mysqli_real_escape_string($link, $_POST['sat5'])."',  '".mysqli_real_escape_string($link, $_POST['sun1'])."', '".mysqli_real_escape_string($link, $_POST['sun2'])."', '".mysqli_real_escape_string($link, $_POST['sun3'])."', '".mysqli_real_escape_string($link, $_POST['sun4'])."', '".mysqli_real_escape_string($link, $_POST['sun5'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."')  LIMIT 1";

				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
					}
			}
		}
		
		if(array_key_exists("submit1", $_POST)){
			
			$query = "DELETE FROM month WHERE id_korisnikk = '".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
			
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
				
			body {
				 background:none;
				}
		
			#logout{
				margin-left:1050px;	
			}
					
				
			#navbar{
				font-size:22px;
			}
			
			#textslike {
				margin-left:180px;
				margin-top:22px;
				font-family:Lucida Handwriting;
				font-size:18px;

			}
			

			
			#month {
				margin-left:90px;
				margin-top:10px;
				padding:5px;
				font-family:Lucida Handwriting;
				font-size:28px;
				text-align:center;
				color:#45232C;
				width:270px;
				height:150px;
				background-image: url('<?php echo $rows['monthp'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			
			#notes {
				margin-left:90px;
				margin-top:10px;
				padding:5px;
				font-family:Lucida Handwriting;
				font-size:20px;
				text-align:center;
				color:black;
				width:270px;
				height:150px;
				background-image: url('<?php echo $rows['mnotep'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}
			
			#bday {
				margin-left:90px;
				margin-top:10px;
				padding:5px;
				font-family:Lucida Handwriting;
				font-size:20px;
				text-align:center;
				color:black;
				width:270px;
				height:150px;
				background-image: url('<?php echo $rows['bdayp'];?>');
				background-repeat: no-repeat;
				background-size:100%;		
			}

			#kalendar {
				margin-left:5px;
				margin-top:35px;
			}
			
			.day {
				font-family:Lucida Handwriting;
				text-align:center;
				color:black;
				width:175px;
				height:50px;
				background-color:#B89789;		
			}
			
			.dan {
				width:175px;
				height:175px;
				background-image: url('<?php echo $rows['daysmp'];?>');
				background-repeat: no-repeat;
				background-size:100%;
			}
			
			#text {
				padding:0px;
				height:145px;
				width:150px;
				background-color:#F5EDEB;
				font-family:Lucida Handwriting;
				font-size:15px;
			}
			
			.sl {
				width:150px;
			}
			
			.sli {
				width:150px;
				height:150px;
			}
			
			#dio {
				width:550px;
			}
			

		</style>
		
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
			<a class="nav-link active" href="monthplaner.php">   M O N T H    </a>
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
	
			<table class="table">
				<tbody>
					<tr id="dio">
						<td><p id="textslike">Month</p><textarea id="month" name="month"><?php echo $row["monthh"];?></textarea></td>
						<td><p id="textslike">Notes</p><textarea id="notes" name="notes"><?php echo $row["notes"]; ?></textarea></td>
						<td><p id="textslike">Birthdays</p><textarea id="bday" name="bday"><?php echo $row["bday"];?></textarea></td>
					</tr>
				</tbody>
			</table>
			
			
	<table class="table table-bordered" id="kalendar">
		  <thead>
			<tr>
			  <th class="day">Monday</th>
			  <th class="day">Tuesday</th>
			  <th class="day">Wednesday</th>
			  <th class="day">Thursday</th>
			  <th class="day">Friday</th>
			  <th class="day">Saturday</th>
			  <th class="day">Sunday</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <td class="dan"><textarea id="text" name="mon1"><?php echo $row["mon1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="tue1"><?php echo $row["tue1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="wed1"><?php echo $row["wed1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="thu1"><?php echo $row["thu1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="fri1"><?php echo $row["fri1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sat1"><?php echo $row["sat1"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sun1"><?php echo $row["sun1"]; ?> </textarea></td>
			</tr>
			<tr>
			  <td class="dan"><textarea id="text" name="mon2"><?php echo $row["mon2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="tue2"><?php echo $row["tue2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="wed2"><?php echo $row["wed2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="thu2"><?php echo $row["thu2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="fri2"><?php echo $row["fri2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sat2"><?php echo $row["sat2"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sun2"><?php echo $row["sun2"]; ?> </textarea></td>
			</tr>
			<tr>
			  <td class="dan"><textarea id="text" name="mon3"><?php echo $row["mon3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="tue3"><?php echo $row["tue3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="wed3"><?php echo $row["wed3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="thu3"><?php echo $row["thu3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="fri3"><?php echo $row["fri3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sat3"><?php echo $row["sat3"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sun3"><?php echo $row["sun3"]; ?> </textarea></td>
			</tr>
			<tr>
			  <td class="dan"><textarea id="text" name="mon4"><?php echo $row["mon4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="tue4"><?php echo $row["tue4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="wed4"><?php echo $row["wed4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="thu4"><?php echo $row["thu4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="fri4"><?php echo $row["fri4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sat4"><?php echo $row["sat4"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sun4"><?php echo $row["sun4"]; ?> </textarea></td>
			</tr>
			<tr>
			  <td class="dan"><textarea id="text" name="mon5"><?php echo $row["mon5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="tue5"><?php echo $row["tue5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="wed5"><?php echo $row["wed5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="thu5"><?php echo $row["thu5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="fri5"><?php echo $row["fri5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sat5"><?php echo $row["sat5"]; ?> </textarea></td>
			  <td class="dan"><textarea id="text" name="sun5"><?php echo $row["sun5"]; ?> </textarea></td>
			</tr>

		  </tbody>
		</table>
		<br>
		
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