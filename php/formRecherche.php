<?php
/**
 * Created by PhpStorm.
 * User: cladlink
 * Date: 29/03/16
 * Time: 09:44
 */

if(isset($_POST) && isset($_POST['nomAuteur']) && isset($_POST['titreOeuvre']) && isset($_POST['dateParution']))
{
    if(!empty($_POST['nomAuteur']) || !empty($_POST['titreOeuvre']) || !empty($_POST['dateParution']))
    {
        $where = "WHERE ";
        if(!empty($_POST['nomAuteur']))
            $where += "AUTEUR.nomAuteur like \"%" . $_POST['nomAuteur'] . "%\" ";
        if(!empty($_POST['nomAuteur']))
            $where += "AND OEUVRE.titreOeuvre like \"%" . $_POST['titreOeuvre'] . "%\" ";
        if(!empty($_POST['nomAuteur']))
            $where += "AND OEUVRE.dateParutionOeuvre = YEAR(" . $_POST['dateParution'] . ")";
    }
    include "secu.php";
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


    $ma_commande_SQL = "SELECT OEUVRE.titreOeuvre, AUTEUR.nomAuteur, AUTEUR.prenomAuteur, OEUVRE.dateParutionOeuvre, EXEMPLAIRE.idExemplaire,
                           COUNT(exemplaire.idExemplaire) as exemplaire_Restant
                        FROM EXEMPLAIRE
                        JOIN OEUVRE ON exemplaire.idOeuvre = oeuvre.idOeuvre
                        JOIN AUTEUR ON oeuvre.idAuteur = auteur.idAuteur
                        ". $where ."
                        AND exemplaire.idExemplaire NOT IN
                              (
                          SELECT exemplaire.idExemplaire
                          FROM emprunt
                          JOIN exemplaire ON emprunt.idExemplaire = exemplaire.idExemplaire
                          WHERE dateRendu IS NULL
                        )
                        GROUP BY Oeuvre.titreOeuvre;";
    $reponse = $ma_connexion_mysql->query($ma_commande_SQL);
    $donnees = $reponse->fetchAll();
    print_r($donnees);
    echo "<table><thead><td>Titre livre</td><td>Nom auteur</td><td>Prenom auteur</td><td>Date de parution</td><td>Quantité disponible</td></thead>";
    foreach ($donnees as $row)
    {
        echo "<tr><td>" . $row['titreOeuvre'] . "</td>
        <td>" . $row['nomAuteur'] . "</td>
        <td>" . $row['prenomAuteur'] . "</td>
        <td>" . $row['dateParutionOeuvre'] . "</td>
        <td>" . $row['exemplaire_Restant'] . "</td></tr>";
    }
    echo "</table>";

}
