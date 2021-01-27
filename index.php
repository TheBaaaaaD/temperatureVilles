<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>
        <?php
            $bddname = 'temperaturevilles';
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $ville = 'nivolas-vermelle';

            //On établit la connexion
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles',$username ,$password);

            $req = 'SELECT ville FROM temperaturevilles';
            $rep = $bdd->query($req);

            ?>
            <form method="post" action="affichage_temperature.php">
                    <select name="ville">
            <?php while ($donnees = $rep->fetch())
            {
                ?>
                  <option>
                  <?php echo ucfirst($donnees['ville']) ?>
                  </option>
            <?php
            }
            ?>     </select>
                <input type="submit" value="Choisissez une ville">
            </form>

    </body>
</html>