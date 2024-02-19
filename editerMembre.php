<?php
    // session_start();
    // if(!isset($_SESSION['use'])) {
    //     header('location:authEnseignant.php');
    //     exit();
    // }
    require_once('connexiondb.php');

    $id=isset($_GET['idUser'])?$_GET['idUser']:0;

    $requete="select users.* from users,tontine where id_users=$id";

    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();
    
    $nom=$utilisateur['nom'];
    $prenom=$utilisateur['prenom'];
    $login=$utilisateur['login'];
    $email=$utilisateur['email'];
    $adresse=$utilisateur['adresse'];
    $tel=$utilisateur['tel'];
    $cni=$utilisateur['CNI'];

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un Etudiant</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="css/monstyle.css"> -->
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    <style>
       
        
    </style>
    </head>
    <body>
        <!-- include("menu.php");  -->

<!-- <nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container-fluid">

    <div class="navbar-header">
    
        <a href="accueilAdmin.php" class="navbar-brand" style="color:">Retour</a>
        
    </div> -->
    
    <!-- <ul class="nav navbar-nav">
                
        <li><a href="EnseignantResp.php">
                <i class="fa fa-vcard"></i>
                &nbsp Les Membres
             </a>
        </li> -->
        
        <!-- <li><a href="gestion.php">
                <i class="fa fa-tags"></i>
                &nbsp Gestion
            </a>
        </li> -->
    <!-- </ul>
    
    
    <ul class="nav navbar-nav navbar-right">
                
        <li>
            <a href="editerMembre.php?id">
                <i class="fa fa-user-circle-o"></i>
                
                // echo  ' '.$_SESSION['user']['login']
                ?>
            </a> 
        </li>
        
        <li>
            <a href="seDeconnexion.php">
                <i class="fa fa-sign-out"></i>
                &nbsp Se déconnecter
            </a>
        </li>
                        
    </ul>
    
</div>
</nav> -->


        <!-- menu -->
        
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
/* .btn-secondary {
  color: #fff;
  background-color: #2F170F;
  border-color: #2F170F;}                   */
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
    <hr>
    <ol class="breadcrumb ">
    	<li style="color:color:#5bc0de;"></li>
		<li><a href="#"><a href="accueilAdmin.php" class="navbar-brand" style="color:">Retour</a></a></li>
		<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
	</ol>
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well profile">
                <img class="user img-circle pull-left clearfix" height="54" src="assets/img/font1.jpg" alt="">
                <h3 class="name pull-left clearfix">Modifier compte</h3>
                <div class="clearfix"></div>
                <ul class="nav nav-tabs">
                    <!-- <li class="active">
                        <a href="#tab" data-toggle="tab">
                            Aperçu
                        </a>
                    </li> -->
                    <li class="active" >
                        <a href="#tab2" data-toggle="tab">
                        	<?php echo $nom.' '.$prenom?>
                        </a>
                    </li>
                    
                </ul>
                    <div class="tab-pane bg-faded" id="tab2">
                        <div class="row">
                            <div class="col-xs-20 col-sm-20 col-md-20">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <form class="form-horizontal " role="form" style="margin-top: 10px;"  method="post" action="updateMembre.php">
                                            
                                            <div class="form-group" >
                                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>"/>
                                                
                                                <label for="inputfullname" class="col-lg-2 control-label" style="margin-left: 6%;">Civilité</label>
                                                    <button class="col-lg-1 btn btn-secondary">
                                                        <input type="radio" class="btn-check" name="civilite" value="<?php echo $civilite ?>">
                                                        M
                                                    </button>
                                                    <button class="col-lg-1 btn btn-light" style="margin-left: 2px;">
                                                        <input type="radio" class="btn-check" name="civilite" value="<?php echo $civilite1 ?>" >
                                                        Mme
                                                    </button>
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="inputfullname" class="col-lg-2 control-label">Nom</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="nom" class="form-control" id="inputfullname" <input type="hidden" name="iduser" class="form-control" value="<?php echo $nom ?>" placeholder="Prénom"/>
                                                </div>
                                                <label for="inputlastname" class="col-lg-2 control-label">Prénom</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="prenom" class="form-control" id="inputlastname" placeholder="Nom" <input type="hidden" name="iduser" class="form-control" value="<?php echo $prenom ?>"/>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                
                                                <label  class="col-lg-2 control-label">Adresse</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="adresse" class="form-control" placeholder="Adesse..." <input type="hidden" name="iduser" class="form-control" value="<?php echo $adresse ?>"/>
                                                </div>

                                                <label for="inputemail" class="col-lg-2 control-label">Tel:</label>
                                                <div class="col-lg-3">
                                                    <input type="tel" name="tel" class="form-control" id="inputemail"  placeholder="+221 -- --- -- --" <input type="hidden" name="iduser" class="form-control" value="<?php echo $tel ?>"/>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="inputemail" class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-3">
                                                    <input type="email" name="email" class="form-control" id="inputemail" placeholder="exemple@gmail.com" <input type="hidden" name="iduser" class="form-control" value="<?php echo $email ?>"/>
                                                </div>
                                                <label  class="col-lg-2 control-label">CNI</label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control " name="cni" placeholder="Cni: ***************" <input type="hidden" name="iduser" class="form-control" value="<?php echo $cni ?>"/>
                                                         
                                                </div> 
                                            
                                                
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="inputlastname" class="col-lg-2 control-label">Login</label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="login" class="form-control" id="inputlastname"  placeholder="Login" <input type="hidden" name="iduser" class="form-control" value="<?php echo $login ?>"/>
                                                </div>  
                            
                                            </div>
                                            <!-- <fieldset class='col-lg-10' > -->
                                                <!-- <legend style='margin-left: 5%;'></legend> -->
                                                
                                            <!-- </fieldset> -->
                                            
                                            <div class="col-lg-3 d-grid mx-auto" style="margin-left: 17%; margin-top: 5%; margin-bottom:5%;">
                                                <input class="btn bg-faded rounded-pill btn-lg" name="enregistrer" type="submit"  style= "background:#e6a756"  value="Enregistrer" />
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
