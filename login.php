<?php
session_start();
$message="";
if (isset($_POST['username'])){
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','') ;
$req ="SELECT * FROM users WHERE username=? AND password=?";
$pdostat = $pdo->prepare($req) ;
$pdostat->execute(array($_POST['username'],$_POST['password'])) ; 
if ($utilisateur = $pdostat->fetch()){
	 //echo "Bienvenue {$utilisateur['username']}\n" ;
	 $_SESSION["username"]=$_POST['username'];
	 header("location:ListLivre.php");
 }
else { $message="vérifier login et password" ; }
}
catch (Exception $e) {
  echo "ERREUR : ".$e->getMessage() ;
} 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="form-login" style="background-image: url('./images/background.jpg');">
	
	<div class="container top">
		<div class="row" style="margin-top: 130px;">
			<div class="col-md-7 col-md-offset-2">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h4><b>LOGIN</b></h4>
					</div>
					<div class="panel-body">
						<form action= "" method="Post" class="">
						<?php
							if($message!="")
							echo "<p>$message</p>";
						?>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
							</div>
                            <center>
							<input type="submit" class="btn btn-warning" value="submit " name="submit"/>
                            </center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>