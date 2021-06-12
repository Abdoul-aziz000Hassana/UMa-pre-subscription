<?php

session_start();
if (isset($_POST['submit'])) {
	
$pseudo=$_POST['pseudo'];
$password=$_POST['password'];
$password2=$_POST['password2'];

if(!empty($pseudo) AND !empty($password) AND !empty($password2)){
	if ($password==$password2) {
		if($bdd = mysqli_connect("localhost","root","")){
			mysqli_select_db($bdd, 'preinscriptionDB');
			$req="INSERT INTO etudiants(pseudo, password) VALUES('$pseudo', '$password')";
			$req2="INSERT INTO users(pseudo, password) VALUES('$pseudo', '$password')";

			$exec=mysqli_query($bdd, $req) or die(mysqli_error($bdd));
			$exec=mysqli_query($bdd, $req2) or die(mysqli_error($bdd));

			$msg='<font color="green" size="3px">Utilisateur ajouté avec succès!</font>';
		}else{
			mysqli_error();
		}
	}else{
		$msg='<font color="red" size="3px">Les deux mots de passe ne correspondent pas, veuillez réessayer!</font>';
	}
}else{
	$msg='<font color="red" size="3px">Les champs doivent tous être remplis</font>';
}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	 
	<script src="jquery.js"></script>
	<meta charset="utf-8"><meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
	<style type="text/css">
		body{
			background-image: url(images/dpt.jpg);
			background-size: 100%;
			background-repeat: no-repeat;
			width: 100%;
			background-attachment: fixed;
		}
		
		.title{
			font-size: 25px;
			font-family: forte;
			box-shadow: 2px 2px 50px #000;
			width: 50px;
			height: 50px;
			background: #5cb85c;
			border-radius: 50%;
			text-align: center;
			color: #fff;
			padding: 10px;
		}
		.monMenu{
			padding-left: 3px;
			color: #000;
		}
			
		.piedDepage{
			font-size: 18px;
			letter-spacing: 1px;
		}

		.monMenu hr{
			height: 1px; 
			background-color: #000; 
			margin-top: 1px;
		}
		.specialBurger{
			padding-top: 2% ;
			width: 340px;
		}
		.specialBurger ul li{
			transition: .2s;
		}
		.specialBurger ul li:hover{
			transform: scale(1.1);
		}
		.specialBurger span{
			color: #fff;
			font-size: 30px;
			float: left;
			margin: 16px 10px 0px -10px;
		}
		.specialBurger ul{
			list-style-type: none;
			margin: 0px -10px;
		}
		.specialBurger ul ul{
			line-height: 30px;
			visibility: hidden;
			list-style-type: none;
			position: absolute;
			width: 250px;
			left: 40px;
			top:-120px;
			padding: 10px 15px;
			background-color: #337ab7;
		}
		.specialBurger ul li:hover ul{
			visibility: visible;
		}
		.specialBurger a, .specialBurger a:hover{
			color: #fff;
			font-size: 15px;
		}
		.col1{
			border-right: 2px solid #337ab7
		}
		.col1>*{
			margin: 20px 0px;
		}
		#jeuDelumiere{
			background: #337ab7;
			color: #fff;
			font-size: 21px;
			text-align: center;
			padding: 15px 0px;
			width: 100%;
			font-family: comic sans ms;
			margin-bottom: 29px
		}
		.selected{
			border: 1px solid #337ab7;
			border-radius: 5px;
			padding: 15px 0;
			background: rgba(255, 255, 255, 0.6);
			height: 450px
		}
		.FormulaireAuthentification{
			background: rgba(50, 130, 255, 0.5);
			padding: 30px;
			height: 370px;
			margin-top:20px;
			border: 1px solid #337ab7
		}
		.sousEdit{
			margin-top: -6px;
		}
		.sousEdit ul {
			margin-top: 35px
		}
		.FormulaireAuthentification input[type='text'], .FormulaireAuthentification input[type='password']{
			border: 1px solid #337ab7
		}
		.glyphicon-remove{
			margin-right: 40px
		}
		.specialBurger span, span{
			margin:2px 2px ;font-size: 12px
		}
		.sousEdit span.lo{
			top: 7px;
			right: 5px;
		}
input#password:focus{
	font-size: 20px
}
input#hidee{
	display: none;
}
input#password, input#hidee{
	border: 1px solid black;
}
input#password{
	color: green;
	transition: .3s			
}

	</style>

</head>

<body>
<div class="row">
	<div class="col-sm-12">
		<div id="jeuDelumiere">
			<b>Bienvenue sur la plateforme de préincription en ligne !</b>
		</div>
	</div>
</div>
<div class="row selected">
	<div class="col-sm-2 col1">
		<img src="images/logo_uMa.png" width="100px" style="margin-left: 20px">

		<br><br><br> 
		
		<div class="specialBurger">
			<ul>
				
					<li class="sousEdit"><a class="btn btn-success" onclick="goBack()" href="#"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a></li>
	           
			</ul>
		</div>

	</div>
	<div class="col-sm-1"> </div>
	<div class="col-sm-10">
		
		<div class="row">

	<div class="formulaire FormulaireAuthentification ">
	<!-- <div class="col-lg-4"> -->
		   	<h2 class="tt"><font color="white">Formulaire d'ajout d'un nouvel utilisateur</font></h2><br />
<div class="col-sm-3">
	<br><br>
	<img src="images/add4.png" width="200">
</div>
<div class="col-sm-9">
				<!-- Formulaire d'ajout utilisateur  -->
		<form method="POST" class="form-horizontal form">
		<div class="form-group">
		</div>
		<div class="row">
			<div class="form-group">
			<label for="user" class="col-sm-4">Nom d'utilisateur : </label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="user" name="pseudo" placeholder="Entrez votre nom d'utilisateur...">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
			<label for="pass" class="col-sm-4">Mot de passe : </label>
				<div class="col-sm-8">
				<input type="password" class="form-control" id="pass" name="password" placeholder="Tapez un mot de passe">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
			<label for="pass2" class="col-sm-4">Confirmer mot de passe : </label>
				<div class="col-sm-8">
				<input type="password" class="form-control" id="pass2" name="password2" placeholder="Tapez le même mot de passe à nouveau">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">
				<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
			</div>
			<?php if(isset($msg)) echo $msg; ?>
		</div>
		</form>

</div>

	</div>
	
</div>
<script type="text/javascript">
	function goBack(){
		history.back();
	}
</script>
		</div>
	</div>

	<script>
		
			$("form").on("submit", function() {
				if($("input.password").val().length == 0) {
					$("div.form-group").addClass("has-error");
					$("div.Dangereux").html("<h4>Erreur !</h4>Champ(s) vide(s)").show("slow").delay(2000).hide("slow");
					return false;
				}
			});
	</script>

<!-- Pied de page -->

	<?php
		include 'footer.php';
	?>

</body>
</html>