<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es libri php&sql</title>
</head>
<body>
    <h1>Inserisci autore</h1>
    <article>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET" id="inserisci">
            <div class="dati">
                <label for="nome"> Nome: </label>
                <input type="text" name="nome" required />
            </div>
            <div class="dati">
                <label for="cognome"> Cognome: </label>
                <input type="text" name="cognome" required />
            </div>
            <div class="dati">
                <label for="id"> Id Autore </label>
                <input type="number" name="id" required />
            </div>
            <div class="dati">
                <label for="matricola"> Matricola: </label>
                <input type="number" name="matricola" required />
            </div>
            <div class="dati">
                <label for="indirizzo"> indirizzo: </label>
                <input type="text" name="indirizzo" required />
            </div>
            <div class="dati">
                <label for="citta"> Citta: </label>
                <input type="text" name="citta" required />
            </div>
            <div class="dati">
                <label for="provincia"> Provincia: </label>
                <input type="text" name="provincia" required />
            </div>
            <div class="dati">
                <label for="cap"> CAP: </label>
                <input type="text" name="cap" required />
            </div>
            <div class="dati">
                <label for="telefono"> Telefono: </label>
                <input type="text" name="telefono" required />
            </div>
            <div class="bottoni">
                <input type="submit" name="invio" value="Registra" />
                <input type="reset" name="annulla" value="Annulla" />
            </div>
        </form>
        <div id="mex">
            <?php
            if (isset($_GET["invio"])) {
                $nome = strtoupper($_GET["nome"]);
                $cognome = strtoupper($_GET["cognome"]);
                $idAutore = strtoupper($_GET["id"]);
                $matricola = strtoupper($_GET["matricola"]);
                $indirizzo = strtoupper($_GET["indirizzo"]);
                $citta = strtoupper($_GET["citta"]);
                $provincia = strtoupper($_GET["provincia"]);
                $cap = strtoupper($_GET["cap"]);
                $telefono = strtoupper($_GET["telefono"]);


                $inserisciSql = "INSERT INTO autori(ID_AUTORE,MATRICOLA,COGNOME,NOME,INDIRIZZO,CITTA,PROVINCIA,CAP,TELEFONO) VALUES('$idAutore','$matricola','$cognome','$nome','$indirizzo','$citta','$provincia','$cap','$telefono');";
                /*require 'connessione.php';*/
                
                $conn = new mysqli("localhost", "root", "", "libri");
                if ($conn->connect_errno) {
                    exit("ERRORE n.$conn->connect_errno: impossibile connetteri al server: $conn->connect_error");
                }

                $result = $conn->query($inserisciSql);
                if ($result == true) {
                    echo "Museo $nome registrato correttamente.";
                } else {
                    echo "Museo $nome non registrato correttamente: $conn->error";
                }
                $conn->close();
            }
            ?>
        </div>
    </article>
</body>
</html>