<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        Elimina Autore
    </title>
    <meta charset="UTF-8">
    <meta name="author" content="Sara Previato" />
    <meta lang="it">
    <link rel="stylesheet" href="styleMusei.css" type="text/css" />
    <!--<script src="./script.js"type="text/javascript"></script>-->
    <script>
        function check() {
            var confirmed = confirm("Se eliminerai questo museo eliminerai anche tuti i suoi libri e non potrai più ritornare indietro.\nSicuro di voler proseguire?");
            return confirmed;
        }
    </script>
</head>
<body>
<body>
    <header class="title">
        Elimina un autore
    </header>
    <article>
        <?php
        //aggiornamento dei dati se c'è stato una precedente modifica
        if (isset($_POST["del"])) {
            $conn = new mysqli("localhost", "root", "", "libri");
            if ($conn->connect_errno) {
                exit("ERRORE n.$conn->connect_errno: Impossibile connettersi al server: $conn->connect_error");
            }

            $sql = "DELETE FROM autore WHERE ID_AUTORE = " . $_POST["id"] . ";";
            $deleteQuadri = $conn->query($sql);
            $sql = "DELETE FROM autore WHERE ID_AUTORE = " . $_POST["id"] . ";";
            $deleteMuseo = $conn->query($sql);
            $error = $conn->error;
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
            <select name="id" onchange="this.form.submit()">
                <?php
                //prelevo tutte le matricole e setto la prima con la matricola se stata precedentemente scelta
                $sql = "SELECT * FROM autori;";

                $conn = new mysqli("localhost", "root", "", "libri");
                if ($conn->connect_errno) {
                    exit("ERRORE n.$conn->connect_errno: Impossibile connettersi al server: $conn->connect_error");
                }

                $musei = $conn->query($sql);

                if (isset($_GET["id"]) and $_GET["id"] != '0') {
                    foreach ($musei as $museo) {
                        if ($museo["ID_museo"] === $_GET["id"]) {
                            echo "<option value=\"" . $museo["ID_museo"] . "\">" . $museo["nome"] . "</option>";
                        }
                    }
                    foreach ($musei as $museo) {
                        if ($museo["ID_museo"] !== $_GET["id"]) {
                            echo "<option value=\"" . $museo["ID_museo"] . "\">" . $museo["nome"] . "</option>";
                        }
                    }
                } else {
                    echo "<option value=\"0\"></option>";
                    foreach ($musei as $museo) {
                        echo "<option value=\"" . $museo["ID_museo"] . "\">" . $museo["nome"] . "</option>";
                    }
                }
                ?>
            </select>
        </form>
        <?php
        if (isset($_GET["id"]) and $_GET["id"] != '0') {
            $sql = "SELECT * FROM musei WHERE ID_museo = " . $_GET["id"] . ";";

            $conn = new mysqli("localhost", "root", "", "gestioneMuseo");
            if ($conn->connect_errno) {
                exit("ERRORE n.$conn->connect_errno: Impossibile connettersi al server: $conn->connect_error");
            }

            $musei = $conn->query($sql);

            $id_museo = $_GET["id"];
            foreach ($musei as $museo) {
                $nome = $museo["nome"];
                $citta = $museo["citta"];
                $nSale = $museo["numero_sale"];
                $nazione = $museo["nazione"];
            }
            echo "
                <form action=\"" . $_SERVER["PHP_SELF"] . "\" method=\"POST\" onsubmit=\"return check()\">
                <input type=\"number\" name=\"id\" step=\"1\" value=\"$id_museo\" hidden readonly=\"true\"/>
		<div class=\"dati\">
                    <label for=\"nome\"> Nome: </label>
                    <input type=\"text\" name=\"nome\" value=\"$nome\" readonly=\"true\"/>
                </div>
                <div class=\"dati\">
                    <label for=\"citta\"> Città: </label>
                    <input type=\"text\" name=\"citta\" value=\"$citta\" readonly=\"true\"/>
                </div>
                <div class=\"dati\">
                    <label for=\"nSale\"> Numero di Sale: </label>
                    <input type=\"number\" name=\"nSale\" step=\"1\" value=\"$nSale\" readonly=\"true\"/>
                </div>
                <div class=\"dati\">
                    <label for=\"nazione\"> Nazione: </label>
                    <input type=\"text\" name=\"nazione\" value=\"$nazione\" readonly=\"true\"/>
                </div>
                <div class=\"bottoni\">
                    <input type=\"submit\" name=\"del\" value=\"Elimina\"/>
                    <input type=\"reset\" name=\"annulla\" value=\"Annulla\"/>
                </div>
            </form>";
        }
        ?>
        <div id="mex">
            <?php
            if (isset($deleteMuseo)) {
                if ($deleteMuseo == true) {
                    echo "Museo eliminato correttamente.";
                } else {
                    echo "Museo non eliminato correttamente: $error";
                }
            }
            $conn->close();
            ?> 
        </div>
    </article>
    <footer>
        <a href="libri.php">
            Torna alla Home Page
        </a>
    </footer>
</body>
</body>
</html>