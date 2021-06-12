<?php

if (isset($_POST['user']) AND isset($_POST['pass'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

if(!empty($user) AND !empty($pass)){
	if(mysql_connect("localhost","root","")){
		
		if(mysql_select_db('preinscriptionDB')){

			$req="SELECT * FROM users WHERE pseudo='$user' AND password='$pass'";
			if($exec=mysql_query($req)){
				$number=mysql_num_rows($exec);
				
				if ($number==0) {
					$msg="Mot de passe Incorrect ou Utilsateur inexistant!";
				}else{
						$_SESSION['name']=$user;
						$_SESSION['time']=time();
						header("location:admin.php");
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

}