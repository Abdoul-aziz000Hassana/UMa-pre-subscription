<?php
session_start();

if (!(isset($_SESSION['name']))) {
	header("location:index.php");
}

?>

<!DOCTYPE html PUBLIC "­//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1­strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8"><meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
	<title>Accueil</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/accueil.css">
	<script src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<style>
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
		/*.specialBurger{
			position: absolute;
			top: 160px;
			z-index: 999
		}*/
	</style>
	</style>
</head>
<body>
<?php 
$title="Université de Maroua";
include('header.php'); 
?>

<div class="row selected">
	<div class="col-sm-3 col1">
		<img src="images/logo_uMa.png" width="100px">

		<br><br>
		
		<div class="specialBurger">
			<ul>
				
					<li class="sousEdit"><button class="btn btn-primary "><span class="glyphicon glyphicon-th"></span> Menu</button> 
						<ul class="Hiden">
							<a href="settings.php"><li><span class="glyphicon-cog glyphicon"></span>Paramètres de l'application</li></a>
							<a href="help.php"><li><span class="glyphicon-info-sign glyphicon"></span> Aide</li></a>
						 	</ul>
	            	</li>
	           
			</ul>
		</div>
<!-- fenetre modale 1 -->

<div class="modal fade" id="infos">
	<div class="modal-dialog">
		<div class="modal-content well">
			
<?php if(!isset($_SESSION['grade'])){echo '<div class="modal-header">
				<button type="button" class="close" id="clos" data-dismiss="modal">X</button>
				<h4 class="modal-title">Identifiez-vous (preinscription)</h4>
			</div>
			<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					
					<form method="POST" action="subscribe.php"  class="authentify">
						<div class="form-group"><input type="password" class="pass form-control " name="pass" placeholder="Tapez votre mot de passe pour continuer ..."><div class="alert alert-block alert-danger"	style="display:none">
							
						</div>
					</div>
						<button type="submit" name="auth" class="btn btn-success">Valider</button>
					</form>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>';
	}else{
		echo '<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<center><br><br><span class="glyphicon glyphicon-remove" style="font-size: 90px; color: red"></span><br>
					<font size="25"><blockquote>Désolé, vous ne pouvez vous préinscrire avec ce compte utilisateur</blockquote></font></center>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>';
	}
?>
			<div class="modal-footer">
		
			<button class="fermer btn btn-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- fin fenetre modale -->

<!-- fenetre modale 2 -->

<div class="modal fade" id="infos2">
	<div class="modal-dialog">
		<div class="modal-content">
<?php if(!isset($_SESSION['grade'])){
	echo'	<div class="modal-header">
				<button type="button" class="close" id="clos" data-dismiss="modal">X</button>
				<h4 class="modal-title">Identifiez-vous (Consulter dossier)</h4> 
			</div>
			<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<form method="POST" action="folder.php" class="authentify2 form-group">
						<div class="form-group">
							<input type="password" class="form-control pass2" name="pass" placeholder="Tapez votre mot de passe pour continuer ...">
							<div class="alert alert-block alert-danger"	style="display:none">
								
							</div>

							</div>
						<input type="submit" name="auth" value="Valider" class="btn btn-success">
						
					</form>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>';
}else{
	echo '<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<center><br><br><span class="glyphicon glyphicon-remove" style="font-size: 90px; color: red"></span><br>
					<font size="25"><blockquote> Désolé, ce compte utilisateur n\'a pas de dossier </blockquote></font></center>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>';
}
			?>
			<div class="modal-footer">
			
			<button class="fermer2 btn btn-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- fin fenetre modale -->

<!-- Fenetre modale 3 -->

<div class="modal fade" id="infos3">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<center><br><br><span class="glyphicon glyphicon-remove" style="font-size: 90px; color: red"></span><br>
					<font size="25"><blockquote> Accès refusé ! Vous n'êtes pas administrateur </blockquote></font></center>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>
			<div class="modal-footer">
			
			<button class="fermer2 btn btn-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- fin fenetre modale 3 -->

<!-- Fenetre modale 4 -->

<div class="modal fade" id="infos4">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<center><br><br><span class="glyphicon glyphicon-remove" style="font-size: 90px; color: red"></span><br>
					<font size="25"><blockquote> <?php echo "Désolé, ce compte utilisateur n'a pas de dossier" ?> </blockquote></font></center>
				</div>
				<div class="col-sm-2"></div>
			</div>
			</div>
			<div class="modal-footer">
			
			<button class="fermer2 btn btn-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- fin fenetre modale 4 -->
<a href="deconnexion.php" class="btn btn-danger">
	<span class="glyphicon glyphicon-off"></span>
	Déconnexion 
		</a>
	</div>

	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-4">
				<div class="monMenu">
					Contactez-nous
					<hr wid5h="60%" style="" align="left">
					<span class="title">UMa</span>
				</div>

			</div>
			<div class="col-sm-8">	<br><br>	
				
		</div>
		</div>
		<div class="row">
			
			<div class="boutons">
				<a id="toSubscribe" href="#infos" data-toggle="modal" type="button" class="a_cacher btn btn-primary btn-xs">Procéder à la <br> préincription<br> <span style="font-size: 30px" class="glyphicon-list-alt glyphicon"></span></a>
				<a id="toConsult" href="#infos2" data-toggle="modal" class="a_cacher btn btn-success btn-xs">Suivre mon <br> dossier <br> <span style="font-size: 30px" class="glyphicon-folder-open glyphicon"></span></a>
				<a id="toAuthenticate" <?php if (!isset($_SESSION['grade'])) echo 'href="#infos3" data-toggle="modal"'; else echo'href="admin.php"'; ?> class="a_cacher btn btn-info btn-xs">Espace <br> administration <br> <span style="font-size: 30px" class="glyphicon-briefcase glyphicon"></span></a>
			</div>
	
		</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="jeuDelumiere">
						<b>Bienvenue sur la plateforme de préincription en ligne !</b>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--************************************************************************************-->

<!-- <script type="text/javascript" src="scripts/script4accueil.js"></script>
 -->
 <script>
	
$(document).ready(function(){
	$('#toSubscribe').click(function(){
		$('div#infos').show('slow');
	});
	$('#toConsult').click(function(){
		$('div#infos2').show('slow');
	});
	$('#toAuthenticate').click(function(){
		$('div#infos3').show('slow');
	});

	$("form.authentify").on("submit", function() {
		if($("input.pass").val() != "<?php echo $_SESSION['pass']; ?>") {
			$("div.form-group").addClass("has-error");
			$("div.alert").html("<h4>Erreur !</h4>Mot de passe incorrect").show("slow").delay(4000).hide("slow");
			return false;
		}
	});

	$("form.authentify2").on("submit", function() {
		if($("input.pass2").val() != "<?php echo $_SESSION['pass']; ?>") {
			$("div.form-group").addClass("has-error");
			$("div.alert").html("<h4>Erreur !</h4>Mot de passe incorrect").show("slow").delay(4000).hide("slow");
			return false;
		}
	});
});

</script>
<?php include('footer.php'); ?>
</body>
</html>