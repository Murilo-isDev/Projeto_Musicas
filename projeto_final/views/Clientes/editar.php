<?php

require_once "../../controllers/ClienteController.php";
$clienteController = new ClienteController();

if(isset($_POST) && count($_POST) > 0) {
    
    $c = new Cliente();
    $c->setId($_POST['campoId']);
    $c->setNome($_POST['campoNome']);
    $c->setEmail($_POST['campoEmail']);
    $c->setSexo($_POST['campoSexo']);
    $c->setCpf($_POST['campoCpf']);
    $c->setData($_POST['campoData']);
    $c->setObs($_POST['campoObs']);

    $rs = $clienteController->edit($c);

    if($rs) {
        header("location: ./");
        exit();
    }
} else if(isset($_GET['id']) && !empty($_GET['id'])) {
    $dado = $clienteController->findId($_GET['id']);
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
                <h3>Cadastro de clientes</h3>
                <form action="" method="post">
                    <input type="hidden" name="campoId" value="<?= $dado->getId(); ?>">
                    <!-- nome, email, cpf, sexo (radio), data, obs (textarea) -->
                    <div class="mb-3">
                        <label for="idNome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="campoNome" 
                            id="idNome" placeholder="Seu nome completo"
                            value="<?= $dado->getNome(); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="idEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="campoEmail" 
                            id="idEmail" placeholder="name@example.com"
                            value="<?= $dado->getEmail(); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="idCPF" class="form-label">CPF:</label>
                        <input type="text" class="form-control" name="campoCpf" 
                            id="idCPF" placeholder="12345678909" minlength="11" 
                            maxlength="11"  value="<?= $dado->getCpf(); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="idData" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" name="campoData" 
                            id="idData" value="<?= $dado->getData(); ?>">
                    </div>
                    <div>
                        <label class="form-label">Sexo:</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="campoSexo" 
                            <?php if($dado->getSexo() == 'F') echo "checked"; ?>
                            id="idSexoF" value="F">
                        <label class="form-check-label" for="idSexoF">
                            Feminino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="campoSexo"
                            <?php if($dado->getSexo() == 'M') echo "checked"; ?>
                            id="idSexoM" value="M">
                        <label class="form-check-label" for="idSexoM">
                            Masculino
                        </label>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="idObs" class="form-label">Observação</label>
                        <textarea class="form-control" id="idObs" name="campoObs"><?= $dado->getObs(); ?></textarea>
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