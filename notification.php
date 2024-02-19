<?php session_start();
include "connexiondb.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/styleg.css"> -->
        <!-- <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>  -->
        <head>
    <style>    
body{
  font-family: 'Poppins',sans-serif;
}


#ga 
{
  position: absolute; 
  top: 10px;
  text-align:center;
  width: 400px;
  margin-left:200px;
}
.supp
{
  float: right;
}
#med 
{
  width:800px;
}
#afm 
{
  position: absolute;
  top: 250px;
  width: 300px;
  font-size: 25px;
  color: #cca000; 
  
}
table
{
    background-color: #cca000;
}
  </style>
</head>
<body>
<div id="ga"> 
          <?php
          $user = $_SESSION['id'];
           $classe= $_SESSION['idTontine'];
           $req2="SELECT * FROM annonce  WHERE tontine_id=$classe and user_id != $user";
           $res1=$pdo->query($req2);
if ($res1->rowCount()>0) {
echo"<table id='tp' class='table table-bordered table-striped table-condensed table-hover'>";
          echo "<tr id='titretab'>";

echo"<td id='med'>Annonce</td>";
echo"<td>action</td>";

echo"</tr>";
 while ($donneem=$res1->fetch()) {
   
echo "<tr>";
echo "<td>".$donneem['annonce']."</td>";

echo "<td>  

        <form action='supprimerAnnonce.php' method='POST' id='form' class='formu'>
        <input type='hidden' name='id' value=".$donneem['id_annonce']." />
       

        <button  type='button' class='btn  supp'  data-bs-toggle='modal' data-bs-target='#static'>supprimer l'annonce</button>
        


        </form>


        </td>" ;

echo "</tr>";

}

 echo"</table>";

}
else
{
  echo "<p id='afm'>Pas d'annonce a afficher</p>";
}


     ?>  
     </div>
     <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       confimer la suppression
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
        <button type="button" class="btn btn-primary" id="ouiun">oui</button>
      </div>
    </div>
  </div>
</div>    
   
   
  <script type="text/javascript">
  

       
            var inp1=document.getElementById('ouiun');  
               var btn=document.getElementsByClassName("supp")
         
     
         var r= document.getElementsByClassName("formu")

             for (let key = 0; key<btn.length;key++) {

             
              btn[key].addEventListener('click',function(e){
                 
                  inp1.addEventListener('click',function (e){

                      r[key].submit();
                      
                },false)

              },false)
            
      
      }
    </script>
</body>
</html>