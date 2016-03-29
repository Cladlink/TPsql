<?php
/**
 * Created by PhpStorm.
 * User: cladlink
 * Date: 29/03/16
 * Time: 09:44
 */
                define("username","cladlink");
                define("password","Tr1f0rc31987..");
                $dsn = "mysql:host=193.253.204.231;port=12269;dbname=TPSQL;charset=utf8";

                try
                {
                    $ma_connexion_mysql = new PDO($dsn, username, password);
                    // pour afficher les erreurs
                    $ma_connexion_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // pour récupérer le résultat des requêtes SELECT sous forme de tableaux associatifs
                    $ma_connexion_mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                }
                catch (PDOException $e)
                {
                    echo 'Connexion échouée : ' . $e->getMessage();
                }

            $ma_commande_SQL = "SELECT * FROM AUTEUR;";
            $reponse = $ma_connexion_mysql->query($ma_commande_SQL);
            $donnees = $reponse->fetchAll();
            echo "<table><thead><td>nom étudiant</td><td>sexe</td><td>Adresse</td></thead>";
            foreach ($donnees as $row)
            {
                echo "<tr><td>" . $row['idAuteur'] . "</td><td>" . $row['nomAuteur'] . "</td><td>" . $row['prenomAuteur'] . "</tr></td>";
            }
            echo "</table>";