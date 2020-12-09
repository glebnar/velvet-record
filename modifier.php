<?php
    include("connection bdd/connection_BDD.php");
    include("controller/modifierController.php");
    include("mep/header.php");
?>
<?php
    // Si des erreurs ont été trouvée, les affiche
    if (count($errs) > 0) { 
?>
    <div id="erreur" class="">
    <?php 
        foreach ($errs as $champEnErreur => $erreursDuChamp) {
            foreach ($erreursDuChamp as $erreur) { 
    ?>
               <p><?=$erreur?></p>
    <?php
            }
        } 
    ?>  
    </div>
    <?php 
        }
    ?>
    <form method="post">
        <div class=" form-group">
            <label for="disc_title">Titre</label>
            <input type="text" class="form-control" name="disc_title" id="disc_title" value="<?= $row->disc_title ?>">
        </div>
        <div class=" form-group">
            <label for="artist_name">Artiste</label>
            <select  class="form-control" name="artist_id" id="artist_name">
                <option value="<?= $row->artist_id ?>"><?= $row->artist_name ?> </option>
                <?php 
                while ($row2 = $resultArtist->fetch(PDO::FETCH_OBJ))
                {?>
                        <option value="<?= $row2->artist_id ?>"><?= $row2->artist_name ?> </option>
                <?php } ?>

            </select>
        </div>
        <div class=" form-group">
            <label for="disc_year">Année</label>
            <input type="text" class="form-control" name="disc_year" id="disc_year" value="<?= $row->disc_year ?>">
        </div>
        <div class=" form-group">
            <label for="disc_label">Label</label>
            <input type="text" class="form-control" name="disc_label" id="disc_label" value="<?= $row->disc_label ?>">
        </div>
        <div class=" form-group">
            <label for="disc_genre">Genre</label>
            <input type="text" class="form-control" name="disc_genre" id="disc_genre" value="<?= $row->disc_genre ?>">
        </div>
        <div class=" form-group">
            <label for="disc_price">Prix</label>
            <input type="number" step="0.01" class="form-control" name="disc_price" id="disc_price" value="<?= $row->disc_price ?>">
        </div>
        <div class=" form-group">
            <label for=""></label>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="disc_picture">Jaquette</label>
                <input type="file" name="disc_picture" id="disc_picture" onchange="loadImg(event)"> 
                <img id="frame"  width="100px" height="auto" />    </div>
        </div>  
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            <input type="submit" class="btn btn-dark bouton-card" name="submit" value="valider" />
            </div>
            <div class="col-4"></div>
        </div>
    </form>
<?php
    include("mep/footer.php");
?>