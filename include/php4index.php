<?php if (isset($_POST['connect'])) {
	$pass=$_POST['password'];
	$pseudo=$_POST['pseudo'];
	$user=$_POST['user'];

// Choix des utilisateurs

	if ($user=="CD")
			$pseudo="CD";
	elseif ($user == "CCI") 
		$pseudo = "CCI";
	
		
	if(!empty($pseudo) AND !empty($pass)){
		if($connect = mysqli_connect("localhost","root","")){
			
			if(mysqli_select_db($connect, 'preinscriptionDB')){

				$req="SELECT password, pseudo, privilege FROM administrateurs WHERE pseudo='$pseudo' AND password='$pass'";
				$exec=mysqli_query($connect, $req);
				if (mysqli_num_rows($exec) == 0) {
					$req="SELECT password, pseudo FROM etudiants WHERE pseudo='$pseudo' AND password='$pass'";
					$exec=mysqli_query($connect, $req);
				}
					$number = mysqli_num_rows($exec);
					if ($number==0) {
						$msg="Mot de passe Incorrect ou Utilsateur inexistant!";
					}
					else{
							$data=mysqli_fetch_array($exec);
							$_SESSION['name']=$pseudo;
							$_SESSION['pass']=$pass;
							if(isset($data['privilege'])){$_SESSION['grade']=$data['privilege'];}
							$_SESSION['time']=date('H:i:s');
							header("location:accueil.php");
					}
			}else{
				$msg = "Erreur d'accès à la base de données!";
			}

		}else{
				$msg = "Erreur de connexion au serveur!";
		}
	}else{
		$msg = "Remplissez tous les champs svp!";
	}
}

if (isset($_POST['ajout'])) {
	
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
				die(mysqli_error());
			}
		}else{
			$msg='<font color="red" size="3px">Les deux mots de passe ne correspondent pas, veuillez réessayer!</font>';
		}
	}else{
		$msg='<font color="red" size="3px">Les champs doivent tous être remplis</font>';
	}

}
