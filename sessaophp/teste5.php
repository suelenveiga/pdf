<?php
session_start();
$dir = '../arquivos/'.$_SESSION['usuario'].'_'.basename($_FILES['arquivo']['name']);
var_dump($_FILES);
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir)) {
    header('Location: teste2.php');
} else {
    echo "Não foi";
}
?>