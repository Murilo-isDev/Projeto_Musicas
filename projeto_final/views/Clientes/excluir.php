<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once "../../controllers/ClienteController.php";

    $clienteController = new ClienteController();

    $rs = $clienteController->remove($_GET['id']);

    if ($rs) {
        header("location: ./");
        exit();
    }
}
