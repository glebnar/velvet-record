<?php
include '../controllers/addArtistController.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
        <div class=" form-group">
            <label for="artist_name">Titre</label>
            <input type="text" class="form-control" name="artist_name" id="artist_name" value="">
            <span class="formError"><?= isset($formError['artist_name']) ? $formError['artist_name'] : '' ?></span>

        </div>
        <div class="row center-align">
            <div class="col s6">
                <a href="artistList.php" class="waves-effect waves-light btn" title="Retour à la liste">Retour</a>
            </div>
            <div class="col s6">
                <input type="submit" name="submit" class="waves-effect waves-light btn" value="Enregistrer">
            </div>
        </div>

        </form>
    </div>
</div>