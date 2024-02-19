<?php
ob_start();
session_start();
     if(!isset($_SESSION['id'])) {
         header('location:accueil.php');
        exit();
    }
require_once("connexiondb.php");
require_once("les_fonctions/fonctions.php");


$validationErrors = array();
$id_T=$_SESSION['idTontine'];
// var_dump($id_T);
// die();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $som=$_POST['som'];
    $user=$_POST['tont'];
    
    


    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
        }
    }
    if (empty($validationErrors)) {
       
            $requete = $pdo->prepare("INSERT INTO tours(somme_recolte, tontine_id, user_id) 
                                        VALUES(:psom,:ptont,:pid)");

            $requete->execute(array(
            'psom'=> $som,
            'ptont' => $id_T,
            'pid' => $user));
            
            $success_msg = "Félicitation, mise à jour effectué!";


    }

}

?>

<style>

                            
body{background:#eee;}
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

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">


<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li>Mise à jour tours</li>
		
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/font1.jpg" alt="">
                <!-- <h3 class="name pull-left clearfix">S'inscrire</h3> -->
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    
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

                                                
                                                
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="inputfullname" class="col-lg-2 control-label">Somme récolté</label>
                                                <div class="col-lg-3">
                                                    <input type="number" name="som" class="form-control" id="inputfullname" required placeholder="la mise totale">
                                                </div>

                                                <!-- <label for="inputlastname" class="col-lg-2 control-label">Membre Elu</label>
                                                <div class="col-lg-3">
                                                    <select name="tont">
                                                       <option value="">Veuillez choisir le membre </option>
                                                            <php $req = $pdo->query("select * from users u, appartenir a where u.id_users = a.user_id
                                                                                      and a.tontine_id =$id_T");
                                                                while($row = $req->fetch()) {?>
                                                            <option value="<php echo $row['id_users'];?>">
                                                               <php echo $row['prenom'].' '.$row['nom'];?>
                                                            </option>
                                                               <php } ?>
                                                    </select>
                                                </div> -->
                                                <div class="col-lg-3 d-grid mx-auto" style="margin-left: 17%; margin-top: 5%; margin-bottom:5%;">
                                                <input class="btn bg-faded rounded-pill btn-lg" name="enregistrer" type="submit"  style= "background:#e6a756"  value="Enregistrer"  />
                                            </div>
                                                
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

        header('refresh:5;url=accueilTresorier.php');
    }

    ?>                        
