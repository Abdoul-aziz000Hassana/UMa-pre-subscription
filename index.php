<?php

session_start();
include 'include/php4index.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<script src="jquery.js"></script>
	<style>
		@media screen and (max-width: 768px) {
			div.col1, img{
				display: none
			}
			div.selected{
				padding: 0;
			}
			div#header{
				height: 91px
			}
			body{
				background-size: 250%;
				font-size: large;
			}
			
		}	
		.specialBurger{
			position: absolute;
			top: 460px;
			z-index: 999
		}
	</style>
	<meta charset="utf-8"><meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
</head>

<body>
<div class="row">
	<div class="col-sm-12" id="header">
		<div id="jeuDelumiere">
			<b>Bienvenue sur la plateforme de préincription en ligne !</b>
		</div>
	</div>
</div>
<div class="specialBurger">
	<ul>
		
			<li class="sousEdit"><button class="btn btn-primary Absolu"><span class="glyphicon glyphicon-th"></span> Menu</button> 
				<ul class="Hiden">
					<a id="create" style="cursor: pointer;"><li><span class="glyphicon-user lo glyphicon"></span>Créer un compte utilisateur</li></a>
					<a href="settings.php"><li><span class="glyphicon-cog lo glyphicon"></span>Paramètres de l'application</li></a>
					<a href="help.php"><li><span class="glyphicon-info-sign lo glyphicon"></span> Aide</li></a>
	        	</ul>
	    	</li>
	   
	</ul>
</div>
<div class="row selected">
	<div class="col-sm-2 col1">
		<img src="images/logo_uMa.png" width="100px" class="logo_uMa" style="margin-left: 20px; margin-bottom: 150px">

	</div>
	<div class="col-sm-1"> </div>
	<div class="col-sm-9">
		
		<div class="row">

	<div class="formulaire FormulaireAuthentification ">
		   	<h2 class="tt"><font color="white">Connectez-vous</font></h2><br />
<div class="col-sm-3 div1">
	<img src="images/cadenas.png" class="caden" width="200">
</div>
<div class="col-sm-6 div2">
<br><br>
	<!-- formulaire de connexion -->
		   	<form method="POST" class="form Connexion">
			
				<select name="user" class="form-control">
					<option value="CD" id="CD">Chef de département</option>
					<option value="CCI">Chef de cellule Informatique</option>
					<option value="Student" id="other">Etudiant</option>
						<input type="text" class="form-control" id="hidee" name="pseudo" placeholder="Entrez votre nom d'Utilsateur">
				</select>
				<input type="password" id="password" class="input password form-control" name="password" placeholder="Enter the password to log-in...">
			 <?php 
			// message d'erreur
				if(isset($msg)){ 
					echo '
					<div class="alert alert-block alert-danger Dangereux2"><span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span>'. $msg.'</font></div>
					<script>
					$(document).ready(function(){
						$("div.Dangereux2").show("slow").delay(2000).hide("slow");
					});
					</script>'; 
				}	
			?>
				<div class="alert alert-block alert-danger Dangereux"	style="display:none"></div>
				<br><button type="submit" class="btn btn-small btn-success" name="connect">Se connecter <span class="glyphicon glyphicon-log-in"></span></button><br>
			
			</form>
</div>
<!-- formulaire de creation d'un compte utilisateur -->

	<h2 class="tc" style="margin-top: 0px"><font color="white">Formulaire d'ajout d'un nouvel utilisateur</font></h2><br />
<div class="col-sm-3 div3">
	<br>
	<img src="images/add4.png" class="userr" width="200">
</div>
<div class="col-sm-6 div4">

<form method="POST" class="form-horizontal form CreateAccount">
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
			 <?php 
			// message d'erreur
				if(isset($msg)){ 
					echo '
					<div class="alert alert-block alert-danger Dangereux4"><span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span>'. $msg.'</font></div>
					<script>
					$(document).ready(function(){
						$("div.Dangereux4").show("slow").delay(2000).hide("slow");
					});
					</script>'; 
				}	
			?>
				<div class="alert alert-block alert-danger Dangereux3"	style="display:none; margin-left: -13px"></div>
		<div class="row">
			<div class="col-sm-12" style="padding-left: 0px">
				<button type="submit" name="ajout" id="ajout" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
				<button type="reset" name="reset" id="Annuler" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
			</div>
			<?php if(isset($msg)) echo $msg; ?>
		</div>
		</form>	

		</div>
	</div>
</div>

</div>
</div>

<script type="text/javascript" src="scripts/script4index.js"></script>

<!-- Pied de page -->

	<?php
		include 'footer.php';
	?>

</body>
</html>