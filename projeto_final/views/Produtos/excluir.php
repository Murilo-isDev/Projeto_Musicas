<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once "../../controllers/ProdutoController.php";

    $ProdutoController = new ProdutoController();

    $rs = $ProdutoController->remove($_GET['id']);

    if ($rs) {
        header("location: ./");
        exit();
    }
}
