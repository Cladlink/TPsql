<?php
include "../Header.php";
/**
 * Created by PhpStorm.
 * User: cladlink
 * Date: 29/03/16
 * Time: 09:44
 */

if(isset($_POST) && isset($_POST['nomAuteur']) && isset($_POST['titreOeuvre']) && isset($_POST['dateParution'])):

    if(!empty($_POST['nomAuteur']) || !empty($_POST['titreOeuvre']) || !empty($_POST['dateParution']))
    {
        if(!empty($_POST['nomAuteur']))
            $where = $where . "AND AUTEUR.nomAuteur like \"%" . $_POST['nomAuteur'] . "%\" ";
        if(!empty($_POST['titreOeuvre']))
            $where = $where . "AND OEUVRE.titreOeuvre like \"%" . $_POST['titreOeuvre'] . "%\" ";
        if(!empty($_POST['dateParution']))
            $where = $where . "AND YEAR(OEUVRE.dateParutionOeuvre) = YEAR(" . $_POST['dateParution'] . ")";
    }
    include "connexion.php";


    $ma_commande_SQL = "SELECT OEUVRE.titreOeuvre, AUTEUR.nomAuteur, AUTEUR.prenomAuteur, OEUVRE.dateParutionOeuvre, EXEMPLAIRE.idExemplaire,
                           COUNT(exemplaire.idExemplaire) as exemplaire_Restant
                        FROM EXEMPLAIRE
                        JOIN OEUVRE ON exemplaire.idOeuvre = oeuvre.idOeuvre
                        JOIN AUTEUR ON oeuvre.idAuteur = auteur.idAuteur
                        WHERE exemplaire.idExemplaire NOT IN
                              (
                          SELECT exemplaire.idExemplaire
                          FROM emprunt
                          JOIN exemplaire ON emprunt.idExemplaire = exemplaire.idExemplaire
                          WHERE dateRendu IS NULL
                        )
                        ". $where ."
                        GROUP BY Oeuvre.titreOeuvre;";
    $reponse = $ma_connexion_mysql->query($ma_commande_SQL);
    $donnees = $reponse->fetchAll();?>
    <table><thead><td>Titre livre</td><td>Nom auteur</td><td>Prenom auteur</td><td>Date de parution</td><td>Quantité disponible</td></thead>
    <?php foreach ($donnees as $row) :

        ?><tr>
            <td><?= $row['titreOeuvre'] ?></td>
            <td><?= $row['nomAuteur']; ?></td>
            <td><?= $row['prenomAuteur']?></td>
            <td><?= $row['dateParutionOeuvre']?></td>
            <td><?= $row['exemplaire_Restant']?></td>
        </tr>
    <?php endforeach; ?>
    </table>


<?php endif;
include "../Footer.php";?>