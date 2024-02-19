<?php
ob_start();
session_start();
require_once("connexiondb.php");
require_once("les_fonctions/fonctions.php");

 $validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['nom']) && isset($_POST['nbr']) && isset($_POST['mise'])&& isset($_POST['date']))
    {
    $nom=$_POST['nom'];
    $nbr=$_POST['nbr'];
    $mise = $_POST['mise'];
    $date=$_POST['date'];
    
    


    if (isset($nbr)) {
        $filtredLogin = filter_var($nbr, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 2) {
            $validationErrors[] = "Erreur!!! Le nombre de participants  doit etre au moins 2 ";
        }
    }

    
    
    $admin_id=$_SESSION['id'];
    if (empty($validationErrors)) {
        
            $req = "INSERT INTO tontine(nom_tontine , nombre_de_participant, mise, id_admin,date_debut) VALUES('$nom', '$nbr', '$mise', '$admin_id','$date') ";
            $res = $pdo->exec($req);
            if($res)
            {
                $r = "select * from tontine where id_admin = $admin_id";
                $s=$pdo->query($r);
                
                while($row = $s->fetch())
                {
                    $idT = $row['id_tontine'];
                    $reqA = "INSERT INTO appartenir(user_id, tontine_id) VALUES('$admin_id','$idT' ) ";
                    $resA = $pdo->exec($reqA);
                 }
                }
                
            // var_dump($res);
            // die();



            $success_msg = "Félicitation, vous venez de créer votre tontine avec succés";
        

    }
 
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
<script>
    function alerter() {
                alert("Félicitation, vous venez de créer votre tontine");
            }
            </script>

<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li style="color:#e6a756;font-weight:bold;font-size:25px;">Création d'une tontine</li>
	
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/creer.jpg" alt="">
                <h3 class="name pull-left clearfix"></h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab" data-toggle="tab"style="color:#e6a756;font-weight:bold">
                            Tontine
                        </a>
                    </li> 
                </ul>

                    <div class="tab-pane bg-faded" id="tab2">
                        <div class="row">
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal " role="form" style="margin-top: 10px;"  method="post">
                                            
                                            
                                            <div class="form-group">
                                                <label for="inputfullname" class="col-lg-2 control-label">Nom</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="nom" class="form-control"  required placeholder="nom de la tontine">
                                                </div>
                                                <label  class="col-lg-2 control-label">Nombre de participants</label>
                                                <div class="col-lg-3">
                                                    <input type="number" name="nbr" class="form-control" placeholder="Nombre de participants" required min = "2">
                                                </div>
                                                
                                            </div>

                                            
                                            
                                            <div class="form-group">
                                            <label for="inputemail" class="col-lg-2 control-label">Mise</label>
                                                <div class="col-lg-3">
                                                    <input type="number" name="mise" class="form-control" id="inputemail" placeholder="Mise:500 CFA" required min = "500">
                                                </div>
                                                <div class="form-group">
                                            <label for="inputemail" class="col-lg-2 control-label">Date de demarrage</label>
                                                <div class="col-lg-3">
                                                    <input type="date" name="date" class="form-control" id="inputemail" placeholder="date de demarrage">
                                                </div>
                                                
                                            
                                                <div class="col-lg-3 d-grid mx-auto" style="margin-left: 35%; margin-bottom:5%;margin-top:5%;text-align:center">
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

        header('refresh:5;url=choice.php');
    }
    ?>                      
