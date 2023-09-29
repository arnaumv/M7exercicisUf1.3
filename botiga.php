<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botiga</title>
</head>
<body>
    <form method="POST">
    <?php

    //crear formulari
    $file = fopen("productes.txt", "r");
    while ($line = fgets($file) ) {
        echo "<input type='checkbox' name='prods[]' value=' ".trim($line)."'>$line
        </input><br>";
    
    }

    echo "<input type='text' name='usaurio' required>";
    echo " <input type='submit' value = 'enviar'> ";

    //processar dades
    if (isset($_POST["prods"])) {
        $user = $_POST["usuario"];
        
        $file2 = fopen("comandes.txt", "a");
        $comanda = $user;
        fwrite($file2, $comanda);
        foreach ($_POST["prods"] as $producte) {
            $comanda .= ", ".$producte;
            

        }
        fwrite($file2, $comanda."\n");


    }
    
    ?>


    </form>
    
</body>
</html>