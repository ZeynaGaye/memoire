<!--  require_once("securiser.php"); -->
<?php
ob_start();
session_start();
require_once("connexiondb.php"); 
$validationErrors = array();
$id=$_SESSION['id'];

             
            // $req = "INSERT INTO appartenir(user_id, tontine_id) VALUES('$membre_id','$id' ) ";
            // $res = $pdo->exec($req);
            $requete = $pdo->query("  SELECT tontine.* FROM tontine WHERE tontine.id_tontine NOT IN (SELECT appartenir.tontine_id FROM appartenir WHERE appartenir.user_id = 1)and tontine.nombre_de_participant > (select count(a.user_id) 
            from appartenir a where tontine.id_tontine=a.tontine_id)and date_debut >CURRENT_DATE") ;
                                 
             $success_msg = "Félicitation, vous venez d'adhérer à une tontine";
    
 
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
#cli
{
    style=margin-left: 17%; margin-bottom:5%; 
    border: 1px solid rgba(0,0,0,0.03);
    background:#fd7e14;
    border-radius: 3px;
    color:black;
   text-decoration:none;
   -moz-transition: opacity 0.3s ease-in-out;

}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       
        <!-- <link rel="stylesheet" type="text/css" href="css/monstyle.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <link href="css/styleg.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li style="font-size:20px;color:#fd7e14;">Adhérer à  une tontine</li>
	
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/adh.jpg" alt="">
                <h3 class="name pull-left clearfix">Adhérer</h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab" data-toggle="tab" style="font-size:20px;color:#fd7e14;">
                             liste des tontines disponibles
                        </a>
                    </li>
                       <strong><i class="fa-solid fa-triangle-exclamation"></i>
                  <!-- Il est strictement interdit d'adherer la meme tontine deux fois.Vous etes membre q'une seule fois. </strong>  -->
                    
                </ul>

                    <div class="tab-pane bg-faded" id="tab2">
                        <div class="row">
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal " role="form" style="margin-top: 40px;"  method="post">
                                            <div class="form-group">              
                                            <label for="inputemail" class="col-lg-2 control-label"></label>
                                                <div class="col-lg-3">
                                                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>Nom de la tontine</th> 
                              <th>nombre maximum de participant</th> 
                              <th>Mise</th> 
                              <th>Date de demarrage</th>
                              <th>Nombre d'adherant actuel</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$requete->fetch()){ ?>
                                <tr class="'success':'danger'">
                                    <td><?php echo $user['nom_tontine'] ?> </td>
                                    <td><?php   echo $user['nombre_de_participant']?> </td>
                                    <td><?php echo $user['mise'] ?> </td>
                                    <td><?php echo $user['date_debut'] ?> </td>
                                    <td><?php
                                               $nbr=$pdo->query("select user_id from appartenir where tontine_id=".$user['id_tontine']);
                                                  $nombre=$nbr->rowCount();
                                                  echo $nombre; ?> 
                                                  </td> 

                                    <td>
                                          <?php
                                          $membre_id=$_SESSION['id'];
                                          $id=$user['id_tontine'];
                                          echo"<a id='cli' href='tontineAd.php?url=".$membre_id."&id=".$id." ' onclick='even()'  >Adherer</a>";  ?>
                                          </td>
                                          
                            </tr>
                            </tbody> 
                            <?php } ?>
                            </table>                      
                                                
                                            
                                                
                                           
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
<script>
    function even()
{
alert("Félicitation vous  d'adhérer avec succés, veuillez attendre l'activation par l'admin.");
}
</script>     