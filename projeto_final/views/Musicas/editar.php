<?php

require_once "../../controllers/MusicaController.php";
$musicaController = new MusicaController();

if(isset($_POST) && count($_POST) > 0) {
    
    $c = new Musica();
    $c->setId($_POST['campoId']);
    $c->setNome($_POST['campoNome']);
    $c->setGenero($_POST['campoGenero']);
    $c->setAno($_POST['campoAno']);
    $c->setDuracao($_POST['campoDuracao']);
    $c->setCantor($_POST['campoCantor']);
    $c->setDescricao($_POST['campoDescricao']);
    $c->setViews($_POST['campoViews']);

    $rs = $musicaController->edit($c);

    if($rs) {
        header("location: ./");
        exit();
    }
} else if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $musicaController->findId($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <?php include "../includes/menu.php"; ?>
            <div class="col-9">
                <h3>Edite a Música</h3>
                <form action="" method="post">
                    <input type="hidden" name="campoId" value="<?= $dado->getId(); ?>">

                    <div class="mb-3">
                        <label for="idNome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="campoNome" 
                            id="idNome" placeholder="Seu nome completo"
                            value="<?= $dado->getNome(); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="idGenero" class="form-label">Gênero:</label>
                        <input type="text" class="form-control" name="campoGenero" 
                            id="idGenero" placeholder="Pagode"
                            value="<?= $dado->getGenero(); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="idAno" class="form-label">Ano:</label>
                        <input type="date" class="form-control" name="campoAno" 
                            id="idAno" value="<?= $dado->getAno(); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="idDuracao" class="form-label">Duração:</label>
                        <input type="time" class="form-control" name="campoDuracao" 
                            id="idDuracao" value="<?= $dado->getDuracao(); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="idCantor" class="form-label">Cantor:</label>
                        <input type="text" class="form-control" name="campoCantor" 
                            id="idCantor" placeholder="Roberto Carlos"
                            value="<?= $dado->getCantor(); ?>">
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="idDescricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="idDescricao" name="campoDescricao"><?= $dado->getDescricao(); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="idViews" class="form-label">Views:</label>
                        <input type="number" class="form-control" name="campoViews" 
                            id="idViews" placeholder="1.000.000"
                            value="<?= $dado->getViews(); ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Gravar</button>
                    <a href="./" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>