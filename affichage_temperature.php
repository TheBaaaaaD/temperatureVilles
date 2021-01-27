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

            //recupération valeur
            $ville = htmlspecialchars($_POST["ville"]);
            $maj = $ville;
            //On établit la connexion
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles',$username ,$password);

            $req = "SELECT temperature,day(lst_update) as jour, month(lst_update) as mois, year(lst_update) as annee, hour(lst_update) as heure, minute(lst_update) as minutes FROM temperaturevilles WHERE ville='$ville'";
            $rep = $bdd->query($req);
            while($donnees = $rep->fetch()){
            echo 'Le ';
            echo htmlspecialchars($donnees['jour']);
            echo ' ';
            echo htmlspecialchars($donnees['mois']);
            echo ' ';
            echo htmlspecialchars($donnees['annee']);
            echo ' à ';
            echo htmlspecialchars($donnees['heure']);
            echo 'h';
            echo htmlspecialchars($donnees['minutes']);
            echo ' il faisait ';
            echo htmlspecialchars($donnees['temperature']);
            echo '°C à ';
            echo $maj = ucfirst($maj);


            }
        ?>
    </body>
</html>