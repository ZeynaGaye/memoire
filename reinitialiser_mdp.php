<?php include_once 'connexiondb.php';
// session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="styleEtudiants/validation.js"></script>
	<link rel="stylesheet" type="text/css" href="styleEtudiants/form_mdp.css">
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="regForm">
                <h1 id="register">reinitialisation de votre mot de passe!</h1>
                <div class="all-steps" id="all-steps"> 
                  <span class="step"><i class="fa fa-user"></i></span> 
                  <span class="step"><i class="fa fa-mobile-phone"></i></span>
                </div>

                <!-- <div class="tab">
                  <h6>saisissez ici votre numero de carte</h6>
                    <p>
                      <input oninput="this.className = ''" type="text" name="numero" placeholder="numero de carte"></p>
                    
                </div> -->
                <div class="tab">
                  <h6>saisissez ici votre e-mail</h6>
                    <p>
                    	<input type="mail" name="email" placeholder="votre e-mail" oninput="this.className = ''"></p>
                    
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> 
                      <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right btn-outline-success"></i></button> </div>
                      <button type="submit" id="submit" class="btn btn-outline-success">Enregistrer</button> 
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mt-5">
	<div class="col-md-8">
		<div class="row d-flex justify-content-center align-items-center">
			<?php 
               if (isset($_POST['email'])) 
               {
               	// $numero=$_POST['numero'];
               	$email=$_POST['email'];
                 try 
                 {
                 	include_once 'function_mdp.php';
                 	$password=aleatoire_password();
                 	// include_once 'sql_etudiants.php';
                 	// $bdd=connexion_database();
					// $numero = $_SESSION['id'];
                 	if ($pdo) 
                 	{
                 		$requete="UPDATE users set pwd=? where  email=?";
                 		$resultat=$pdo->prepare($requete);
                 		$resultat->bindParam(1,$password);
                 		// $resultat->bindParam(2,$numero);
                 		$resultat->bindParam(2,$email);
                 		try 
                 		{
                 			$resultat->execute();
                 			if ($resultat) 
                 			{
                 				echo "<div class=\"text-success\">
                                    <br>votre mot de passse a été reinitialisé</br>
                                    <div>";
                 			}
                 		} catch (Exception $e) {
                 			echo "Impossible de changer le mot de passe ".$e->getMessage();
                 		}
                 		$subject="Reinitialisation de mot de passe";
	        			$message="Bonjour cher etudiant, votre mot de passe a été reinitilasé avec success. Votre nouveau mot de passe est $password. cliquez sur le lien pour acceder a notre site
	        			http://127.0.0.1/TPs_PHP/memoire/accueil/";
	                    $entete="Content-Type: text/plain; charset=utf-8";
	        			$entete.="From:fatimatasow18@gmail.com";
	        			if (mail($email, $subject, $message,$entete)) 
	        			{
	        			  echo "<div class=\"text-success\">
                                  <br>Votre nouveau mot de passe vous a été envoyé par mail a l'adresse $email. Merci de vous connecter a votre compte pour recuperer votre mot de passe</br>
                                <div>";
	        			}
	        			else
	        			{
	        				echo "<div class=\"text-danger\">
                                  <br>Echec de l'envoi de votre mot de passe a votre mail. veuillez recommencer s'il vous plaît !!</br>
                                <div>";
	        			}
                 	}
                 	
                 } catch (Exception $e) 
                 {
                 	
                 }
               }
			 ?>
		</div>
	</div>
</div>
<!-- < include_once 'footer.php'; ?> -->
</body>
</html>