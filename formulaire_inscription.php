<?php require_once("header.php"); ?>
<?php include("traitement_inscription.php") ; ?>
<div class="container">
        <div class="row-col-8">
            <form action="" method="post">
                <?php if(isset($error)){echo '<p>'. $error . '</p>' ;} ?>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="valider">Valider</button>
            </form>
        </div>
    </div>