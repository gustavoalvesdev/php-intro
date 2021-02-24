<?php 

session_start();

$categorias = [];
$categorias[] = 'infantil';
$categorias[] = 'adolescente';
$categorias[] = 'adulto';
$categorias[] = 'idoso';
//print_r($categorias);

$nome = ucwords(strip_tags(addslashes($_POST['nome'])));
$idade = strip_tags(addslashes($_POST['idade']));

$erros = [];

if (empty($nome) || empty($idade)) {
    $erros[] = 'Os campos nome e idade devem ser preenchidos!';
} 

if (strlen($nome) < 2) {
    $erros[] = 'O nome deve conter 2 ou mais caracteres';
}

if (! preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $nome)) {
    $erros[] = 'O campo nome deve conter apenas letras';
} 

if (! preg_match('/^[0-9]+$/', $idade)) {
    $erros[] = 'O campo idade deve conter apenas números';
}

if ($idade > 125) {
    $erros[] = 'A idade máxima aceita é 125 anos';
}

if (strlen($nome) > 50) {
   $erros[] = 'O campo nome deve conter no máximo 50 caracteres!';
} 

if (empty($erros)) {
    if ($idade >= 6 && $idade <= 12) {
        for ($i = 0; $i < count($categorias); $i++) {
            if ($categorias[$i] == 'infantil') {
                echo 'O nadador '.$nome.' compete na categoria '.$categorias[$i];
            }
        }
    }
    else if ($idade >= 13 && $idade <= 18) {
        for ($i = 0; $i < count($categorias); $i++) {
            if ($categorias[$i] == 'adolescente') {
                echo 'O nadador '.$nome.' compete na categoria adolescente';
            }
        } 
    }
    else {
        for ($i = 0; $i < count($categorias); $i++) {
            if ($categorias[$i] == 'adulto') {
                echo 'O nadador '.$nome.' compete na categoria adulto';
            }
        }
    }
} else {
    $_SESSION['erros'] = $erros;
    header('Location: index.php');
}
