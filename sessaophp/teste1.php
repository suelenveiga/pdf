<?php
    $name = $_POST['usuario'];
    $email = $_POST['email'];
    $dologin = 0;
    $arq = '../arquivo.txt';
    $open = fopen($arq, "r");
    $cont = fread($open, filesize($arq));
    fclose($open);
    $contarray = explode(";", $cont);
    $limit = count($contarray)-1;
    $userlist = array();
    for ($cont=0; $cont < $limit; $cont+=2) {
        $user = array($contarray[$cont], $contarray[$cont+1]);
        array_push($userlist, $user);
    }
    $limit = count($userlist);
    var_dump($userlist);
    for ($cont=0; $cont < $limit; $cont+=1) { 
        $c = 0;
        if (trim($userlist[$cont][0]) == $name) {
            $c += 1;
        }
        if (trim($userlist[$cont][1]) == $email) {
            $c += 1;
        }
        if ($c == 1) {
            $dologin = 1;
            break;
        }
        if ($c == 2) {
            $dologin = 2;
            break;
        }
    }
    if ($dologin == 1) {
        header('Location: /');
    } 
    if ($dologin == 0) {
        $doc = "{$name};{$email};\n";
        $arq = '../arquivo.txt';
        $open = fopen($arq, "a+");
        $gravar = fwrite($open, $doc);
        fclose($open);
        if($gravar) {
            $_SESSION['usuario'] = $name;
            $_SESSION['login'] = $email;
            setcookie("usuario", $name, time() + 300, "/");
            setcookie("email", $email, time() + 300, "/");
            header('Location: teste2.php');
        }
    }
    if ($dologin == 2) {
        session_destroy();
        session_start();
        $user = trim($_POST['usuario']);
        $email = trim($_POST['email']);
        $_SESSION['usuario'] = $name;
        $_SESSION['login'] = $email;
        setcookie("usuario", $name, time() + 300, "/");
        setcookie("email", $email, time() + 300, "/");
        header('Location: teste2.php');
    }
?>