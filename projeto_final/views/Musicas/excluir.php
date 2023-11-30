<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once "../../controllers/MusicaController.php";

    $musicaController = new MusicaController();

    $rs = $musicaController->remove($_GET['id']);

    if ($rs) {
        header("location: ./");
        exit();
    }
}
