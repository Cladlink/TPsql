SELECT OEUVRE.titreOeuvre, AUTEUR.nomAuteur, AUTEUR.prenomAuteur, OEUVRE.dateParutionOeuvre, EXEMPLAIRE.idExemplaire,
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
GROUP BY Oeuvre.titreOeuvre;
SELECT * FROM EMPRUNT;
SELECT * FROM oeuvre;
SELECT * FROM exemplaire;
SELECT COUNT(*) as compte
FROM EXEMPLAIRE;
-- COUNT(EXEMPLAIRE.idExemplaire) as quantite,