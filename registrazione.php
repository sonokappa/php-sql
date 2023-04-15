<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registrazione</title>
</head>
<script>
		function controllo(){
			//Controllo password e ripeti password
			if(document.modulo.password.value.localeCompare(document.modulo.pwRepeat.value)==0){
				//alert("uguali");
				return true;			
			}else{
				alert("Password non confermata");
                //serve per cambiare il valore dell'action del form
                //document.modulo.action="<?php echo $_SERVER["PHP_SELF"]?>";
				return false;
			}
            //document.modulo.action="<?php echo $_SERVER["PHP_SELF"] ?>";
			return false;
		}
	

        <?php
        if (isset($_POST["inviaDati"])) {
            $sql_utente = "INSERT INTO utenti_registrati (username,password,email) VALUES 
            ('" . $_POST["username"] . "','" . $_POST["password"] . "','" . $_POST["email"] . "');";
            require "connessione.php";

            $result = $conn->query($sql_utente);
            if ($result == true) {
                echo "Utente " . $_POST["username"] . " registrato con successo! Esegui l'accesso";
            }
        }
        ?>
</script>
<body>

    <header class="title">
    Inserisci i tuoi dati personali
    </header>
    <article>
        <form name="modulo" action="$_SERVER['PHP_SELF']" method="post" id="inserisci" onsubmit="return controllo();">
            <div class="dati">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="dati">
                <label for="email">Emai</label>
                <input type="text" name="email" required>
            </div>
            <div class="dati">
                <label for="password">Password</label><input type="password" name="password" required>
            </div>
            <div class="dati">
                <label for="pwRepeat">Ripeti password</label><input type="password" name="pwRepeat" required>
            </div>
            <div class="bottoni"><br>
                <input type="submit" name="inviaDati" value="Registra">
                <input type="reset" name="reset" value="Cancella">
            </div>
        </form>
    </article>
    
    <footer>
        <a href="index.php">
            Torna alla Home Page
        </a>
    </footer>
</body>

</html>