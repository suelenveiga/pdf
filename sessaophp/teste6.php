<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['login']);
    session_destroy();
    unset($_COOKIE['usuario']);
    unset($_COOKIE['email']);
    setcookie('usuario', null, -1, "/");
    setcookie('email', null, -1, "/");
    header('Location: /index.php');
?>