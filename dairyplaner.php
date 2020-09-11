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
			
			$query = "SELECT diary FROM dairy WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$row = mysqli_fetch_array(mysqli_query($link, $query));
			
			$diarycontent = $row['diary'];
			
			}
		
		
		if(array_key_exists("submit", $_POST)){
			
			$query = "SELECT id_diary FROM dairy WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			
			if (mysqli_num_rows($result) > 0) {
				
				$query= "UPDATE dairy SET diary = '".mysqli_real_escape_string($link,$_POST['diary'])."' WHERE id_korisnik = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1 ";
				
				
				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
				}
				
			} else {
	
				
				$query = "INSERT INTO dairy (diary, id_korisnik) VALUES ('".mysqli_real_escape_string($link, $_POST['diary'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."' )  LIMIT 1";

				if(mysqli_query($link, $query)) {
					
					$msg = "Saved.";
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
				 background-color:white;
				}
		
			#logout{
				margin-left:1050px;	
			}
					
			#dugme {
				margin-left:600px;	
			}
			#navbar{
				font-size:22px;
			}
			
			#diary{
				height:900px;
				font-family:Lucida Handwriting;
				background-color: #F5EDEB;

			}
			
			#diaryy {
				font-size:20px;
				font-family:Lucida Handwriting;
				text-align: center;
			}
			
			#msg {
				color:black;
				font-family:Lucida Handwriting;
				margin-left:30px;
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
			<a class="nav-link" href="monthplaner.php">   M O N T H    </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link" href="habitsplaner.php">H  A  B  I  T  S        </a>
		  </li>
			<p> . .   .    </p>
		  <li class="nav-item">
			<a class="nav-link active" href="dairyplaner.php">D  I  A  R  Y </a>
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

	
	<p id="diaryy"> Welcome to your secret diary. <br><small> Some secrets are meant to stay secret forever. </small></p>

	<div class="container-fluid">
	<form method="post">
		<textarea name= "diary" id="diary" class="form-control"><?php echo $diarycontent ?></textarea>
		<br><button name="submit" type="submit" class="btn btn-outline-secondary btn active" id="dugme">Save</button>
		<br>
		
	<br><br>
	</form>
	</div>
	
	
  </body>
	
</html>