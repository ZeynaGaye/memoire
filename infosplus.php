<?php
    require_once("connexiondb.php");
    $idT = $_SESSION['idTon'];

    
    

    $login=isset($_GET['login'])?$_GET['login']:"";// pour la recherce
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
   
    // $requeteUser="select * from etudiant where login like '%$login%'";
     $requeteUser="select * from users u, tontine a where u.id_users = a.id_admin or 
      u.id_users = a.id_tresorier  and a.tontine_id= $idT";
    $requeteCount="select count(*) countUser  from users u, appartenir a where u.id_users = a.user_id
     and a.tontine_id= $idT";
   
    $resultatUser=$pdo->query($requeteUser);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrUser=$tabCount['countUser'];
    $reste=$nbrUser % $size;   
    if($reste===0) 
        $nbrPage=$nbrUser/$size;   
    else
        $nbrPage=floor($nbrUser/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des membre</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script> 
    </head>
    <style>
        /* .container
        { 
            box-shadow:3px 3px 3px #fcf8e3;;
        } */
    </style>
    <body>
     
        
        
        <div class="container" >
            <div class="panel  margetop60">
				<div class="panel-heading text-uppercase" >Rechercher des Membres</div>
				<div class="panel-body">
					<form method="get" action="Etudiant.php" class="form-inline">
						<div class="form-group">
                            <input type="text" name="login" 
                                   placeholder="Login"
                                   class="form-control"
                                   value="<?php echo $login ?>"/>
                        </div>
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
					</form>
				</div>
			</div>
            
            <div  style="background-color: #e6a756;">
                <div class="panel-heading">Liste des Membre (<?php echo $nbrUser ?> Membres)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>Nom</th> 
                              <th>Prénom</th> 
                              <th>Adresse</th> 
                              <th>Email</th>
                               <th>Tel</th>
                               <th>CNI</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$resultatUser->fetch()){ ?>
                                <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                    <td><?php echo $user['nom'] ?> </td>
                                    <td><?php echo $user['prenom'] ?> </td>
                                    <td><?php echo $user['adresse'] ?> </td>
                                    <td><?php echo $user['email'] ?> </td>
                                    <td><?php echo $user['tel'] ?> </td> 
                                    <td><?php echo $user['CNI'] ?> </td>
                                   <td>
                                        <a href="editerMembre.php?idUser=<?php echo $user['id_users'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet membre')"
                                            href="supprimermembre.php?idUser=<?php echo $user['id_users'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                <a href="activerMembre.php?idUser=<?php echo $user['id_users'] ?>&etat=<?php echo $user['etat']  ?>">  
                                                <?php  
                                                    if($user['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                            </a>
                                        </td>       
                                </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="listeMembre.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
