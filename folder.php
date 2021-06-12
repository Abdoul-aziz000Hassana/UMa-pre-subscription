<?php
session_start();
if (!(isset($_SESSION['name']))) {
	header("location:index.php");
}

if (isset($_POST['submit'])) {
	
if (!empty($_POST['user']) AND !empty($_POST['pass'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if($BD = mysqli_connect("localhost","root","")){
		
		if(mysqli_select_db($BD, 'preinscriptionDB')){

			$req="SELECT * FROM users WHERE pseudo='$user' AND password='$pass' AND privilege=1";
			if($exec=mysqli_qhelpry($BD, $req)){
				$number=mysqli_num_rows($exec);
				
				if ($number==0) {
					$msg="Désolé, vous n'êtes pas administrateur";
				}else{
						$_SESSION['name']=$user;
						$_SESSION['time']=time();
						header("location:manager.php");
				}
			}else{
				die(mysql_error($exec));
			}

		}else{
				$msg = "Erreur d'accès à la base de données";
			}
	}else{
				$msg = "Erreur de connexion au serveur";
		}

}else{
		$msg = "Remplissez tous les champs svp!";
	}
}
?>

<!DOCTYPE html PUBLIC "­//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1­strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8"><meta name="viewport" content="user-scalable=no, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, width=device-width">
	<title>Suivi du dossier</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 
	<script src="jqhelpry.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

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
</style>
</head>
<body>
<?php 
$title="Suivez votre dossier ici";
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
<div class="btn-group">
	<a class="btn btn-danger" href="deconnexion.php"><span class="glyphicon glyphicon-off"></span>
		Déconnexion </a>
	<a class="btn btn-success" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
</div>
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
			<div class="col-sm-8"></div>
		</div>
>
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