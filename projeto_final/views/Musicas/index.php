<?php 
    require_once "../../controllers/MusicaController.php";
    $MusicaController = new MusicaController();
    $resultData = $MusicaController->read();
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
                <h3>Cadastro de Músicas</h3>
                <a href="adicionar.php" class="btn btn-success">Adicionar</a>
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Cantor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultData as $dado) { ?>
                            <tr>
                                <th scope="row"><?= $dado->getId(); ?></th>
                                <td><?= $dado->getNome(); ?></td>
                                <td><?= $dado->getGenero(); ?></td>
                                <td><?= $dado->getCantor(); ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $dado->getId(); ?>"
                                            class="btn btn-sm btn-warning">Editar</a>
                                    <a href="javascript:excluir(<?= $dado->getId(); ?>)" 
                                            class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "../includes/js.php"; ?>
    <script>
        function excluir(id) {
            if(confirm("Tem certeza?")) {
                window.location = "excluir.php?id=" + id;
            }
        }
    </script>
</body>

</html>