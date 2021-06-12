<?php
session_start();
if (!(isset($_SESSION['name']))) {
	header("location:index.php");
}

require_once 'include/connexion.php';

$req1 = 'SELECT * FROM cycle';
$req2 = 'SELECT * FROM faculte';
$req3 = 'SELECT * FROM parcours';

$exec1 = mysqli_query($connect, $req1);
$exec2 = mysqli_query($connect, $req2);
$exec3 = mysqli_query($connect, $req3);
?>

<!DOCTYPE html PUBLIC "­//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1­strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
	<title>Préinscription</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 
	<script src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap-datepicker.js"></script>
	<style type="text/css">
		body{
			background-image: url(images/dpt.jpg);
			background-size: 100%;
			background-repeat: no-repeat;
			padding-top: 72px;
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
			margin-top: 130px;
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
			visibility: hidden;
			list-style-type: none;
			position: absolute;
			width: 190px;
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
		
		.col1>*{
			margin: 20px 20px;
		}
		.selected{
			border: 1px solid #337ab7;
			border-radius: 5px;
			padding: 15px 0;
			background: rgba(255, 255, 255, 0.6);
		}
		.sousEdit{
			margin-top: -6px;
		}
		.sousEdit ul {
			margin-top: 35px
		}
		.glyphicon-remove{
			margin-right: 40px
		}
		.specialBurger span, span{
			margin:2px 2px ;font-size: 12px
		}
		div.civil, div.Dangereux, div.parcours{
			display: none;
		}

</style>
</head>
<body>
<?php 
$title="Faites-vous préinscrire ici";
include('header.php'); 
?>

<div class="row selected">
	<div class="col-sm-3 col1">
		<img src="images/logo_uMa.png" width="100px" style="margin-left: 70px">

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
<div class="btn-group">
	<a class="btn btn-danger" href="deconnexion.php"><span class="glyphicon glyphicon-off"></span>
		Déconnexion </a>
	<a class="btn btn-success" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
</div>
	</div>

	<div class="col-sm-9">

<div class="row" >
<div class="col-sm-11" style="background: rgba(255, 255, 255, 0.8); padding: 5px 30px; border: 1px solid #337ab7">
<h3>Formulaire de préinscription</h3>
<div class="alert alert-block alert-danger Dangereux"></div>
<hr style="height: 2px; background: #337ab7; ">	

<form class="form-horizontal well col-sm-11" method="POST">
<div class="form-group departement">
<legend>Choix du département (Année académique : 2021/2022)</legend>
</div>

<div class="row departement">

<div class="col-sm-3">Choix du cycle : </div>
<div class="col-sm-9">

<?php while ($res1 = mysqli_fetch_array($exec1)) {
	echo '<input type="radio" class="check" name="cycle" id="'.$res1['intitule'].'">
			<label for="'.$res1['intitule'].'"><span class="btn btn-default">'.$res1['intitule'].'</span></label>';
} ?>

</div>

</div>
<!-- Choix de la faculté -->
<div class="row departement">

<div class="col-sm-3">Choix de la faculté : </div>
<div class="col-sm-9">

<?php while ($res2 = mysqli_fetch_array($exec2)) {
	echo '<input type="radio" class="check" name="fac" id="'.$res2['intitule'].'">
			<label for="'.$res2['intitule'].'"><span class="btn btn-default">'.$res2['intitule'].'</span></label>';
} ?>

</div>

</div>
<!-- Choix du departement -->
<div class="row departement">

<div class="col-sm-3">Choix du département : </div>
<div class="col-sm-9">
	<div class="row">
		<div class="col-xs-5">
			1er choix : <br>
		<select id="multiple" multiple="multiple" name="dpt1" class="input-mini" required="required">
<?php
	while ($res3 = mysqli_fetch_array($exec3)) {
		echo '<option>'.$res3['filiere'].'</option>';
	} 
?>
			</select>
		</div>
		<div class="col-xs-2"></div>
		<div class="col-xs-5">
			2e choix : <br>

<select id="multiple" multiple="multiple" name="dpt1" class="input-mini" required="required">
	
<?php
$exec3 = mysqli_query($connect, $req3);
	while ($res3 = mysqli_fetch_array($exec3)) {
		echo '<option>'.$res3['filiere'].'</option>';
	} 
?>
</select>
		</div>
	</div>	

</div>

</div>

<!-- Etat civil -->

<div class="row civil">
	<div class="col-sm-3"> Nom et prénom : </div>
	<div class="col-sm-9"><input type="text" class="form-control" name="nometprenom"></div>

	<div class="col-sm-3">Date de naissance : </div>
	<div class="col-sm-9"><input type="date" name="date_naiss" class=" form-control"></div>	
	
<div class="col-sm-3">Sexe : </div>
	<div class="col-sm-9"><input type="radio" name="sex" id="masculin"><label for="masculin"><span class="btn btn-default">Masculin</span></label>
		<input type="radio" name="sex" id="feminin"><label for="feminin"><span class="btn btn-default">Féminin</span></label>
</div>

<div class="col-sm-3">Statut matrimonial : </div>
	<div class="col-sm-9"><input type="radio" name="statut_mat" id="maried"><label for="maried"><span class="btn btn-default">Marié</span></label>
		<input type="radio" name="statut_mat" id="celib"><label for="celib"><span class="btn btn-default">Célibataire</span></label>
</div>

<div class="col-sm-3"> Nationalité : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="national" required></div>

<div class="col-sm-3"> Région d'origine : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="region" required></div>

<div class="col-sm-3"> Département d'origine : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="departement" required></div>

<div class="col-sm-3"> Nom du père : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="pere" required></div>

<div class="col-sm-3"> Profession du père : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="profession_pere" required></div>

<div class="col-sm-3"> Nom de la mère : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="mere" required></div>

<div class="col-sm-3"> Profession de la mère : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="profession_mere" required></div>

<div class="col-sm-3"> Contact des parents : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="contatc_parents" required></div>

<div class="col-sm-3"> Nom du tuteur à Maroua : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="tuteur" required></div>

<div class="col-sm-3"> Contact du tuteur : </div>
<div class="col-sm-9"><input type="text" class="form-control" name="contact_tuteur" required></div>
</div>

<!-- Choix parcours -->
<div class="parcours">
	<div class="col-sm-4"> Nature du diplôme d'entrée : </div>
	<div class="col-sm-8"><input type="text" class="form-control" name="nature_diplome" required></div>
	
	<div class="col-sm-4">  </div>
	<div class="col-sm-2">Mention :</div>
	<div class="col-sm-6">
		<select class="input-mini" multiple="multiple" name="mention">
			<option value="Passable">Passable</option>
			<option value="Assez-bien">Assez-bien</option>
			<option value="Bien">Bien</option>
			<option value="Très-bien">Très-bien</option>
			<option value="Excellent">Excellent</option>
			<option value="Parfait">Parfait</option>
		</select>
	</div>

	<div class="col-sm-4"> Année d'obtention : </div>
	<div class="col-sm-8"><input type="year" class="form-control" name="annee_obtention" required></div>
	

</div>

<div class="navigationBar">
	<br>
	<div class="btn-group">
		<a class="btn btn-default disabled" id="prev" href=""><span class="glyphicon glyphicon-backward"></span>
			Précédent </a>
		<a class="btn btn-success" id="next" >Suivant <span class="glyphicon glyphicon-forward"></span></a>
		<button style="display: none" type="submit" name="submit" class="submit btn btn-warning"> <span class="glyphicon glyphicon-ok"></span> Valider </button>
	</div>
	

</div>

</form>

</div>
<div class="col-sm-1"></div>
</div>

<script>
	$("#next").click(function() {
		if($("div.departement input:checked").val() && $('div.departement option:selected').val()) {
			$('div.departement').hide('slow');
			$('div.civil').show('slow');
			$('#prev').removeClass('disabled btn-default').addClass('btn-success');

			$("#next").click(function() {
				if($("div.civil input").val() != '') {
					$('div.civil').hide('slow');
					$('div.parcours').show('slow');
					$('#next'). addClass('disabled');
					$('button.submit').show('fast');
				}
				else{
					$('div.civil input').css("border", "1px solid orange");
					$("div.Dangereux").html('<span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span>Remplissez tous les champs').show("slow").delay(2000).hide("slow");
					return false;
				}
			});
		}
		else{
			$("div.Dangereux").html('<span class="glyphicon Remov glyphicon-remove form-controlfeedback"></span>Erreur ! Champ(s) vide(s)').show("slow").delay(2000).hide("slow");
			return false;
		}
	});
</script>
		</div>
	</div>

<script type="text/javascript">
	function goBack(){
		history.back();
	}
</script>
<!--************************************************************************************-->

<?php include('footer.php'); ?>
</body>
</html>