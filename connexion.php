<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Authentification</title>
</head>
<body class="p-3 m-0 border-0 bd-example">
<!-- Example Code -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Se connecter</button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">S'authentifier</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="contactForm" action="verifAuthent.php" data-sb-form-api-token="API_TOKEN" method = "post">
                        <div class="form-group">
                    <!-- <label for="login">Login :</label> -->
                    <input type="text" name="login" placeholder="Login"
                           class="form-control" autocomplete="off"/>
                </div>

                <div class="form-group" style = "margin-top:3%">
                    <!-- <label for="pwd">Mot de passe :</label>  -->
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"/>
                </div>

                <button type="submit" class="btn bg-faded" style = "margin-top:2%">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter
                </button>
                <div class="text-right">
                    
              </div>
            </form>
          </div>
          <div class="modal-footer">
          <a href="reinitialiser_mdp.php" class="btn btn-primary">Mot de passe Oublié</a>
            <a class="btn btn-secondary" href="inscription.php">Créer un compte</a>

          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
