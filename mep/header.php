
<!DOCTYPE php>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Velvet record</title>
    <link rel="stylesheet" href="src/css/style.css">

</head>
<body>
<!-- logo/slogan -->
    <div class="row-fluid">
        <img src="src/img/banner.jpg" alt="Banniere" title="banniere" class="img-fluid  p-0">
    </div>
<!-- --- -->
<!-- navigation -->
        <nav class="row navbar navbar-expand-lg navbar-dark bg-dark m-0" >
            <div class="container">
                <a class="navbar-brand" href="index.php">Velvet record</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarnav" aria-controls="navbarnav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarnav">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Accueil <span class="sr-only ">(page actuel)</span></a>
                    <?php if(isset( $_SESSION["niveau"]) &&  $_SESSION["niveau"]=="admin") {?>    
                        <a class="nav*item nav-link" href="ajout.php">Ajouter un produit</a>
                    <?php } ?>
                    </div>
                    <div class="col-sm"></div>
                    <?php
                    if (count($erreurLogin) > 0) { 
                    ?>
                        <div id="erreur" class="col-sm-3">
                        <?php 
                            foreach ($erreurLogin as $champEnErreurLogin => $erreursDuChampLogin) {
                                foreach ($erreursDuChampLogin as $erreurLogin) { 
                        ?>
                                <p id="erreurLogin" class="h4"><?=$erreurLogin?></p>
                        <?php
                                }
                            } 
                        ?>  
                        </div>
                        <?php 
                            }
                        ?>
                    <?php if(!isset($_SESSION["login"])){
                        ?>
                        <div class="btn-group dropup">
                            <button type="button" id="dropup-btn" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Connexion
                            </button>
                            <div class="dropdown-menu">
                                <form class="px-4 py-3" method="post">
                                    <div class="form-group">
                                    <label for="identifiant">Identifiant</label>
                                    <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="identifiant">
                                    </div>
                                    <div class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
                                    </div>
                                    <input type="submit" class="btn btn-dark mt-2 bouton-card" name="login" id="login" value="se connecter">
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item lien-dropdown" href="register.php">s'inscrire</a>
                                <a class="dropdown-item lien-dropdown" href="#">mot de passe oublié</a>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="btn-group dropup">
                            <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?=$_SESSION["login"]?>" hidden>
                            <button type="button" id="dropup-btn" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Bienvenue <?=$_SESSION["login"]?>
                            </button>
                            <div class="dropdown-menu">
                                <form class="px-4 py-3" method="post">
                                    <input type="submit" class="btn btn-dark mt-2 bouton-card" name="logout" value="déconnexion">
                                </form>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </nav>
            </div>
<div class="container">
