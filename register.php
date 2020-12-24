<?php
    include("connection bdd/connection_BDD.php");
    include("controller/loginController.php");
    include("controller/registerController.php");
    include("mep/header.php");
    // Si des erreurs ont été trouvée, les affiche
    if (count($errs) > 0) { 
?>
    <div id="erreur" class="">
    <?php 
        foreach ($errs as $champEnErreur => $erreursDuChamp) {
            foreach ($erreursDuChamp as $erreur) { 
    ?>
               <p class="text-danger"><?=$erreur?></p>
    <?php
            }
        } 
    ?>  
    </div>
    <?php 
        }
    ?>
    <form method="post" >
        <fieldset>
            <legend class="h3">Formulaire d'inscription</legend>
                <div class="form-goup ">
                    <label for="identifiant">Identifiant</label>
                    <input class="form-control" type="text" name="identifiant" id="identifiant">
                </div>
                <div class="form-goup ">
                    <label for="mail">E-mail</label>
                    <input class="form-control" type="email" name="mail" id="mail">
                </div>
                <div class="form-goup ">
                    <label for="mdp">Mot de passe (au moins 8 caractères dont une majuscule, un chiffre et un caractére spécial)</label>
                    <input class="form-control" type="password" name="mdp" id="mdp">
                    <div class="text-danger" id="erreur_mdp"></div>
                </div>
                <div class="form-goup ">
                    <label for="confirm_mdp">Confirmez votre mot de passe</label>
                    <input class="form-control" type="password" name="confirm_mdp" id="confirm_mdp">
                    <div class="text-danger" id="erreur_confirm_mdp"></div>
                </div>
        </fieldset>
        <div class="row pt-3">
            <div class="col-sm"></div>
            <input type="submit" class="btn btn-dark bouton-card" name="submit" value="valider">
            <div class="col-sm"></div>
        </div>
    </form>
<?php
    include("mep/footer.php");
?>