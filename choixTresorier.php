<!--  require_once("securiser.php"); -->
<?php
session_start();
require_once("connexiondb.php"); 
$idT = $_SESSION['idTontine'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['tont']))
    {
    $id=$_POST['tont'];
    // $nbr=$_POST['nbr'];
    // $mise = $_POST['mise'];
    
    


    if (isset($nbr)) {
        $filtredLogin = filter_var($nbr, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 2) {
            $validationErrors[] = "Erreur!!! Le nombre de participants  doit etre au moins 2 ";
        }
    }

    
    
    $membre_id=$_SESSION['id'];
    if (empty($validationErrors)) {
        
        $req="update tontine set id_tresorier= $id where id_tontine = $idT";
            $res = $pdo->exec($req);
            // var_dump($res);
            // die();



            $success_msg = "Félicitation, votre venez d'adhérer à une tontine";
        

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

<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li>Choix du tresorier</li>
	
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/adh.jpg" alt="">
                <h3 class="name pull-left clearfix">Tresorier</h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab" data-toggle="tab">
                            Tontine
                        </a>
                    </li>
                    
                    
                </ul>

                    <div class="tab-pane bg-faded" id="tab2">
                        <div class="row">
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal " role="form" style="margin-top: 40px;"  method="post">
                                            
                                            <div class="form-group" >
                                            <label for="inputemail" class="col-lg-2 control-label">Tresorier</label>
                                                <div class="col-lg-3">
                                                <select name="tont">
                                                       <option value="">Veuillez choisir un des membre </option>
                                                            <?php $req = $pdo->query("select * from users u, appartenir a where u.id_users = a.user_id
                                                                                       ");
                                                                while($row = $req->fetch()) {?>
                                                            <option value="<?php echo $row['id_users'];?>">
                                                               <?php echo $row['prenom'].' '.$row['nom'];?>
                                                            </option>
                                                               <?php } ?>
                                                    </select>
                                                </div>
                                                
                                            
                                                <div class="col-lg-3 d-grid mx-auto" style="margin-left: 17%; margin-bottom:5%;">
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