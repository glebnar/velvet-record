<?php
include '../controllers/addDiscController.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="disc_title" type="text" class="validate" name="disc_title" value="<?= isset($_POST['disc_title']) ? $_POST['disc_title'] : '' ?>">
                        <label for="disc_title">Titre</label>
                        <span class="formError"><?= isset($formError['disc_title']) ? $formError['disc_title'] : '' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="disc_label" type="text" class="validate" name="disc_label"value="<?= isset($_POST['disc_label']) ? $_POST['disc_label'] : '' ?>">
                        <label for="disc_label">Label</label>
                        <span class="formError"><?= isset($formError['disc_label']) ? $formError['disc_label'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="disc_price" type="text" class="validate" name="disc_price" value="<?= isset($_POST['disc_price']) ? $_POST['disc_price'] : '' ?>">
                        <label for="disc_price">Prix</label>
                        <span class="formError"><?= isset($formError['disc_price']) ? $formError['disc_price'] : '' ?></span>
                    </div>
                    <div class="input-field col s4">
                        <input id="disc_year" type="text" class="validate" name="disc_year" value="<?= isset($_POST['disc_year']) ? $_POST['disc_year'] : '' ?>">
                        <label for="disc_year">Année</label>
                        <span class="formError"><?= isset($formError['disc_year']) ? $formError['disc_year'] : '' ?></span>
                    </div>
                    <div class="input-field col s4">
                        <input id="disc_genre" type="text" class="validate" name="disc_genre" value="<?= isset($_POST['disc_genre']) ? $_POST['disc_genre'] : '' ?>">
                        <label for="disc_genre">Genre</label>
                        <span class="formError"><?= isset($formError['disc_genre']) ? $formError['disc_genre'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="disc_artist" name="disc_artist">
                            <option value="" disabled>Choose your option</option>
                            <?php
                            foreach ($artList as $artist) {
                                ?>
                                <option value="<?= $artist->artist_id ?>"?><?= $artist->artist_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="disc_artist">Artiste</label>
                        <span class="formError"><?= isset($formError['disc_artist']) ? $formError['disc_artist'] : '' ?></span>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="disc_picture">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="row center-align">
                    <div class="col s6">
                        <a href="discList.php" class="waves-effect waves-light btn" title="Retour à la liste">Retour</a>
                    </div>
                    <div class="col s6">
                        <input type="submit" name="submit" class="waves-effect waves-light btn" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
