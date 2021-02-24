<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inscrição</title>
</head>
<body>
    <p>FORMULÁRIO DE INSCRIÇÃO DE COMPETIDORES</p>

    <?php if (isset($_SESSION['erros'])) : ?>
        <ul>
    <?php foreach ($_SESSION['erros'] as $erro) : ?>
            <li><?= $erro ?></li>
    <?php endforeach; ?>
        </ul>
    <?php
        endif;
        unset($_SESSION['erros']);
    ?>

    <form action="script.php" method="POST">
        <p>Seu nome: <input type="text" name="nome" /></p>
        <p>Sua idade: <input type="text" name="idade" /></p>
        <p><input type="submit" /></p>
    </form>
</body>
</html>