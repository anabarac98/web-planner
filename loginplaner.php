<?php

	session_start();
	
	$error= "";
	$noterror="";
	
	if(array_key_exists("logout", $_GET)) {
			
			unset($_SESSION['id']);
			setcookie("id", "", time () - 60*60);
			$_COOKIE["id"] = "";
			
		} else if (array_key_exists("id", $_SESSION) OR array_key_exists("id", $_SESSION)) { 
			
			header("Location: weekplaner.php");
		}
		
		
	if(array_key_exists("submit", $_POST)) {	 
		$link = mysqli_connect("localhost", "root", "", "planner");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}

		
		if ($_POST['email'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite email. </div>";
			
		}else if ($_POST['lozinka'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite lozinku. </div>";
			
		}else {
			
			if ($_POST['signUp'] == '0') {
			
			$query = "SELECT id FROM korisnik WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			
			if (mysqli_num_rows($result) > 0) {
				
				$error = "Email adresa je zauzeta.";
				
			}else {
			
				$query = "INSERT INTO korisnik (email, lozinka) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['lozinka'])."')";
							
				if (!mysqli_query($link, $query)) {
					
					$error="Dogodila se neka greška. Molimo pokušajte ponovo.";
				
				}else{
					
				$query= "UPDATE korisnik SET lozinka = '".md5(md5(mysqli_insert_id($link)).$_POST['lozinka'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				
				mysqli_query($link,$query);
				
				
	
				$noterror = "You're registred. You can log in now."; 
				
					
				
				}
					
				}
			}else {
				$query = "SELECT * FROM korisnik WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
				
				$result= mysqli_query($link, $query);
				
				//print_r($result);
				
				$row = mysqli_fetch_array($result);
				
				if(isset($row)) {
					
					$hashedPassword = md5(md5($row['id']).$_POST['lozinka']);
					
					print_r($hashedPassword);
					
					print_r ("---");
					print_r($row['lozinka']);
					
					if ($hashedPassword == $row['lozinka']) {
						
						$_SESSION['id'] = $row['id'];
						
						if($_POST['ostaniprijavljen'] == '1') {
					
							setcookie("id", mysqli_insert_id($link), time() + 60*60);
					
						} if($_POST['email'] == "admin@gmail.com") {
					
							header("Location:adminplaner.php");
				
						} else {
							
							header("Location:weekplaner.php");
							
							}
						
					}else {
						
						$error = "Netočna lozinka";
						
					}
					
				} else {
					
					$error = "Netočan email";
				}
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
				  background: url(prvapozadina.jpg) no-repeat center center fixed; 
				  -webkit-background-size: cover;
				  -moz-background-size: cover;
				  -o-background-size: cover;
				  background-size: cover;
				}
				
			body {
				 background:none;
				}
				
			
			#registracija { 
				
				margin-top:230px;
				margin-left:250px;
				
			}
			
			#dio{
				padding:20px;
				border-color:white;
				border-width:2px;
				font-family:Lucida Handwriting;
			}
			
			#s {
				
				font-family:Book Antiqua;
			}
						
		</style>
	</head>
  <body>
  
	
	<?php 
	if($error != ""){
		echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
	}else {
		echo " ";
	}
	?>
	

<table class="table-bordered" id="registracija">
<td class="table-active" id="dio">

	<div class="login">
	<p id="s"><strong> Log in! </strong></p>
	<form method="post" >
		<div class="form-group row">
		<label for="example-text-input" class="col-3 col-form-label">Email:</label>
			<div class="col-7">
				<input name="email" class="form-control" type="text" placeholder="" id="example-text-input">
			</div>
		</div>

		<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Password:</label>
			  <div class="col-7">
				<input name="lozinka"class="form-control" type="password" placeholder="" id="example-password-input">
			  </div>
		</div>
			<p id="s"> <input type="checkbox" name="ostaniprijavljen" value=1> Stay logged in </p>
		<input type="hidden" name="signUp" value="1">
		<button name="submit" type="submit" class="btn btn-outline-secondary btn active" id="dugme">Log in</button>
		
		</div>
		</form>
	</div>
	
</td>
<td class="table-active" id="dio">
		
		<div>
		<p id="s"> Don't have an account? <strong> Sign up! </strong></p>
	<form method="post">
		<div class="form-group row">
		<label for="example-text-input" class="col-3 col-form-label">Email:</label>
			<div class="col-7">
				<input name="email" class="form-control" type="text" placeholder="" id="example-text-input">
			</div>
		</div>
		<div class="form-group row">
		  <label for="example-password-input" class="col-3 col-form-label">Password:</label>
			  <div class="col-7">
				<input name="lozinka" class="form-control" type="password" placeholder="" id="example-password-input">
			  </div>
		</div>
			<?php echo "<p id='s'>".$noterror." </p>" ?>
		
		<input type="hidden" name="signUp" value="0">
		<button name="submit" type="submit" class="btn btn-outline-secondary btn active" id="dugme">Sign up</button>
		
		</div>
		</form>
	</div>
</td>
</table>
	


	


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>

