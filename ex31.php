<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercici 31</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>PROCESSA CONTACTES</h1>
    
    <?php
    // Leer el contenido del archivo contactes31.txt
    $archivo = fopen('contactes31.txt', 'r');
    
    if ($archivo) {
        echo '<table>';
        echo '<tr><th>Nom</th><th>Cognom1</th><th>Cognom2</th><th>Telèfon</th></tr>';
        
        while (($linea = fgets($archivo)) !== false) {
            $datos = explode(',', $linea);
            
            echo '<tr>';
            echo '<td>' . $datos[0] . '</td>';
            echo '<td>' . $datos[1] . '</td>';
            echo '<td>' . $datos[2] . '</td>';
            echo '<td>' . $datos[3] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        fclose($archivo);

        //generem l'arxiu contactes31b.txt
        $archivoB = fopen('contactes31b.txt', 'w');
        if ($archivoB) {
            $archivo = fopen('contactes31.txt', 'r');
            while (($linea = fgets($archivo)) !==false) {
                $datos = explode(',',$linea);
                $nuevaLinea = implode('#',$datos);
                fwrite($archivoB,$nuevaLinea);
                
            }
            fclose($archivoB);
        }else {
            echo 'No s ha pogut crear el fitxer contactes31b.txt';
        }
    } else {
        echo 'No s ha pogut obrir l arxiu contactes31.txt';
    }

            
    ?>
</body>
</html>
