<?php
include 'action.php';
include "header.php";
?>

<!-- Affichage des plats -->
<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
        <?php
        $stmt = $bdd->prepare('SELECT * FROM plats');
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) { ?>

            <div class="col-sm-6 col-md-4 col-lg-3 mb-2 p-4">
                <div class="card-deck">
                    <div class="form3 p-2 border-secondary mb-2">
                        <img src="<?= $row['photo'] ?>" class="img-thumbnail" height="250">
                        <div class="card-body p-1">
                            <h4 class="card-title text-center text-info"><?= $row['nom'] ?></h4>
                            <h5 class="card-text text-center text-danger"></i>&nbsp;&nbsp;<?= number_format($row['prix'], 2) ?> €</h5>
                        </div>

                        <div class="card-footer p-1">
                            <form action="" class="form-submit">
                                <div class="row p-2">
                                    <div class="col-md-6 py-1 pl-4">
                                        <b>Quantitée : </b>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                        <input type="hidden" class="pnom" value="<?= $row['nom'] ?>">
                                        <input type="hidden" class="pprix" value="<?= $row['prix'] ?>">
                                        <input type="hidden" class="pphoto" value="<?= $row['photo'] ?>">
                                        <input type="number" class="form-control qty" value="<?= $row['qty'] ?>">
                                        <input type="hidden" class="total_price" value="<?= $row['total_price'] ?>">
                                    </div>
                                </div>
                                <input type="submit" name="add" class="btn btn-info btn-block" value="Ajouter au panier">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Fin de l'affichage carte des plats -->


    <?php
    $stmt = $bdd->prepare('SELECT * FROM cart'); //préparation de la Bdd pour fetch ttes les lignes du Crud.
    $stmt->execute();
    ?>



include "footer.php";
?>