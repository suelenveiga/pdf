<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="teste1.php" method="post" enctype="multipart/form-data">
<div id='div1'>
    <label for="usuario">usuario: </label>
    <input type="text" name="usuario" />
    <label for="email">Email: </label>
    <input type="text" name="email" />
    <button type="submit">Enviar</button>
</div>
    <?php
        if (isset($_COOKIE['usuario'])) {
            session_start();
            $_SESSION['usuario'] = $_COOKIE['usuario'];
            $_SESSION['login'] = $_COOKIE['email'];
            header('Location: teste2.php');
        }
    ?>
</form>
</body>
</html>
