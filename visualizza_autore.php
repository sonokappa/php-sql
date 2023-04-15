<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza libro</title>
</head>
<body>
    <header>
        <h1>Visualizza libro</h1>   
    </header>
    <article>
        <?php
        $sql="SELECT * FROM autori;";
        //Connessione al database
        $conn = new mysqli("localhost","root","","libri");
        if($conn->connect_errno){
            exit("ERRORE n.$conn->connect_errno: Impossibile connettersi al server: $conn->connect_error");
        }
        $autore = $conn->query($sql);
        if($autore->num_rows > 0) {
            echo"<table><tr><th>CODICE AUTORE</th><th>MATRICOLA</th><th>COGNOME</th><th>NOME</th><th>INDIRIZZO</th><th>CITTA'</th><th>PROVINCIA</th><th>CAP</th><th>TELEFONO</th></tr>";
            //output
            foreach ($autore as $row ) {
                echo "<tr><td>" . $row["ID_AUTORE"] . "</td><td>" . $row["MATRICOLA"] . "</td><td>" . $row["COGNOME"] . "</td><td>" . $row["NOME"] . "</td><td>" . $row["INDIRIZZO"] . "</td><td>" . $row["CITTA"] . "</td><td>" . $row["PROVINCIA"] . "</td><td>" . $row["CAP"] . "</td><td>" . $row["TELEFONO"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Non è presente nesun libro</p>";
        }
        $conn->close();
        ?>

    </article>

    <footer>
        <a href="libri.php">
            Torna alla Home Page
        </a>
    </footer>
</body>
</html>