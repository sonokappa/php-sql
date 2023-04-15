<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci libro</title>
</head>
<body>
    <header>
        <h1>Visualizza libro</h1>   
    </header>
    <article>
        <?php
        $sql="SELECT * FROM libri;";
        //Connessione al database
        $conn = new mysqli("localhost","root","","libri");
        if($conn->connect_errno){
            exit("ERRORE n.$conn->connect_errno: Impossibile connettersi al server: $conn->connect_error");
        }
        $libro = $conn->query($sql);
        if($libro->num_rows > 0) {
            echo"<table><tr><th>CODICE AUTORE</th><th>NOME</th><th>DESCRIZIONE'</th><th>PREZZO</th><th>ISBN</th><th>GENERE</th><th>ID_LIBRO</th></tr>";
            //output
            foreach ($libro as $row ) {
                echo "<tr><td>" . $row["ID_AUTORE"] . "</td><td>" . $row["TITOLO"] . "</td><td>" . $row["DESCRIZIONE"] . "</td><td>" . $row["PREZZO"] . "</td><td>" . $row["ISBN"] . "</td><td>" . $row["GENERE"] . "</td><td>" . $row["ID_LIBRO"] . "</td></tr>";
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