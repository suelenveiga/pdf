    
<?php
session_start();

$nome = $_SESSION['login'];

// Lê o cookie "masterdaweb"

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style type="text/css">
        table, th, td {
            border: 1px solid black;
        }
        </style>
        </head>
        <body>
            <table style="width:100%">
                <tr>
                    <th>Arquivos Uploads</th>
                    <th>Tamanho</th> 
                </tr>
                   <?php
                   $dir ="../arquivos/";
                   $file = scandir($dir,1);
                   session_start();
                   array_pop($file); 
                   array_pop($file);
                   $files = array();
                   for ($i=0; $i < count($file) ; $i++) { 
                            if (substr($file[$i], 0, strpos($file[$i], "_")) == $_SESSION['usuario']) {
                                array_push($files, $file[$i]);
                            }
                    }
                   $vetortam = array();
                   for ($i=0; $i < count($files) ; $i++) { 
                        array_push($vetortam,filesize($dir.$files[$i]));
                   }
                   $aux=0;                    
                   foreach ($vetortam as $value) {
                        echo "<tr>";
                        echo "<td>".$files[$aux]."</td>";       
                        echo "<td>".$value."</td>"; 
                        $aux+=1;    
                        echo "<\tr>";
                        
                   }
                   ?> 
            </table>
            <a href="teste2.php">Voltar</a>
            <a href="teste7.php">Gerar Pdf</a>
            <a href="teste6.php">Logout</a>
    </body>
</html>
