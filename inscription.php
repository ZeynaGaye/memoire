<?php
ob_start();
require_once("connexiondb.php");
require_once("les_fonctions/fonctions.php");


$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adr = $_POST['adresse'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $cni=$_POST['cni'];
    $login = $_POST['login'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    


    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
        }
    }

    if (isset($pwd1) && isset($pwd2)) {

        if (empty($pwd1)) {
            $validationErrors[] = "Erreur!!! Le mot ne doit pas etre vide";
        }

        if (($pwd1) !== ($pwd2)) {
            $validationErrors[] = "Erreur!!! les deux mot de passe ne sont pas identiques";

        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valid";

        }
    }

    if (empty($validationErrors)) {
        if (rechercher_par_login($login) == 0 & rechercher_par_email($email) == 0) {
            $requete = $pdo->prepare("INSERT INTO users(nom,prenom,adresse,tel,email,CNI,login,pwd) 
                                        VALUES(:pnom,:pprenom,:padresse,:ptel,:pemail,:pcni,:plogin,:ppwd)");

            $requete->execute(array('pnom'=> $nom,
            'pprenom' => $prenom,
            'padresse' => $adr,
            'ptel' => $tel,
            'pemail' => $email,
            'pcni' => $cni,
            'plogin' => $login,
            'ppwd' => ($pwd1)
            ));
            

            $success_msg = "Félicitation, votre compte est crée avec succés , veuillez vous connecter pour créer ou adhéré à une tontine";
        } else {
            if (rechercher_par_login($login) > 0) {
                $validationErrors[] = 'Désolé le login exsite deja';
            }
            if (rechercher_par_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }

    }

}
// ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <title>Créer Compte</title>
    <style>                            
    body{ 
        background:#eee;}
        .profile img.user { margin: 0 20px 10px 0; }
        .profile .name { margin: 14px 0 10px; }
        .profile h5.sales { margin: 10px 0 10px 10px; }
        .profile .sales .list-group-item i { margin-right: 10px; }
        .profile .list-inline i { margin-right: 7px; }
        .profile .messages .list-group-item img { margin-right: 10px; }
    .well {
    border: 0;
    padding: 20px;
    min-height: 63px;
    background: #fff;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    border-bottom: 2px solid #ccc;
    transition: max-height 0.5s ease;
    -o-transition: max-height 0.5s ease;
    -ms-transition: max-height 0.5s ease;
    -moz-transition: max-height 0.5s ease;
    -webkit-transition: max-height 0.5s ease;
}

.form-control {
    height: 45px;
    padding: 10px;
    font-size: 16px;
    box-shadow: none;
    border-radius: 0;
    position: relative;
}

label {
    font-weight: 400;
    color: #444;
}

.dropzone {
    position: relative
    border: 1px solid rgba(0,0,0,0.03);
    min-height: 360px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: rgba(0,0,0,0.03);
    padding: 23px;
}
.dropzone.dz-clickable {
    cursor: pointer;
}
.dropzone .dz-default.dz-message {
    opacity: 1;
    -ms-filter: none;
    filter: none;
    -webkit-transition: opacity 0.3s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out;
    background-repeat: no-repeat;
    background-position: 0 0;
    position: absolute;
    width: 428px;
    height: 123px;
    margin-left: -214px;
    margin-top: -61.5px;
    top: 50%;
    left: 50%;
    font-size:40px;
    color:#5bc0de;
} 
.bg-faded {
  background-color: #f6e1c5;
} 
/* .btn-secondary {
  color: #fff;
  background-color: #2F170F;
  border-color: #2F170F;}                   */
</style>
</head>
<body>


<!-- <script>
    function alerter() {
                alert("Félicitation, votre compte vous pouvez vous connecter pour créer ou adhéré à une tontine");
            }
            </script> -->

<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li>Création de compte</li>
		<!-- <li><a href="#">Justificatifs</a></li> -->
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/font1.jpg" alt="">
                <h3 class="name pull-left clearfix">S'inscrire</h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab" data-toggle="tab">
                            Aperçu
                        </a>
                    </li>
                    <li class="active" >
                        <a href="#tab2" data-toggle="tab">
                        	Compte
                        </a>
                    </li>
                    
                </ul>
                
                    <div class="tab-pane bg-faded" id="tab2">
                        <div class="row">
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal " role="form" style="margin-top: 10px;"  method="post">
                                            
                                            <div class="form-group" >
                                                
                                                
                                                <label for="inputfullname" class="col-lg-2 control-label" style="margin-left: 6%;">Civilité</label>
                                                    <button class="col-lg-1 btn btn-secondary">
                                                        <input type="radio" class="btn-check" name="civilite">
                                                        M.
                                                    </button>
                                                    <button class="col-lg-1 btn btn-light" style="margin-left: 2px;">
                                                        <input type="radio" class="btn-check" name="civilite"  >
                                                        Mme
                                                    </button>
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="inputfullname" class="col-lg-2 control-label">Nom</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="nom" class="form-control" id="inputfullname" required placeholder="Prénom">
                                                </div>
                                                <label for="inputlastname" class="col-lg-2 control-label">Prénom</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="prenom" class="form-control" id="inputlastname" placeholder="Nom" required>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                
                                                <label  class="col-lg-2 control-label">Adresse</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="adresse" class="form-control" placeholder="Adesse..." required>
                                                </div>

                                                <label for="inputemail" class="col-lg-2 control-label">Tel:</label>
                                                <div class="col-lg-3">
                                                    <input type="tel" name="tel" class="form-control" id="inputemail" required placeholder="+221 -- --- -- --">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="inputemail" class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-3">
                                                    <input type="email" name="email" class="form-control" id="inputemail" placeholder="exemple@gmail.com" required>
                                                </div>
                                                <label  class="col-lg-2 control-label">CNI</label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control " name="cni" placeholder="Cni: ***************" required>
                                                         
                                                </div> 
                                            
                                                
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="inputlastname" class="col-lg-2 control-label">Login</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="login" class="form-control" id="inputlastname" required placeholder="Login">
                                                </div>  
                            
                                            </div>
                                            <!-- <fieldset class='col-lg-10' > -->
                                                <!-- <legend style='margin-left: 5%;'></legend> -->
                                                <div class='form-group'>
                                                    <!-- <label  class='col-lg-2 control-label'>Type</label> -->
                                                    <label for="inputlastname" class="col-lg-2 control-label">Password:</label>
                                                <div class="col-lg-3">
                                                    <input type="password" name="pwd1" class="form-control" id="inputlastname" required placeholder="mot de passe">
                                                </div>
                                                <label for="inputlastname" class="col-lg-2 control-label">Confirmer password</label>
                                                <div class="col-lg-3">
                                                    <input type="password" name="pwd2" class="form-control" id="inputlastname" required placeholder="confirmer mot de passe">
                                                </div>
                                                </div>
                                            <!-- </fieldset> -->
                                            
                                            <div class="col-lg-3 d-grid mx-auto" style="margin-left: 17%; margin-top: 5%; margin-bottom:5%;">
                                                <input class="btn bg-faded rounded-pill btn-lg" name="enregistrer" type="submit"  style= "background:#e6a756"  value="Enregistrer"  />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>   
<?php

    if (isset($validationErrors) && !empty($validationErrors)) {
        foreach ($validationErrors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }


    if (isset($success_msg) && !empty($success_msg)) {
        echo '<div class="alert alert-success">' . $success_msg . '</div>';

        header('refresh:5;url=accueil.php');
    }

    ?>   
</body>
</html>

                
