<?php
require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous avez créées, si vous le souhaitez vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.
$stm = DB_Connect::dbConnect()->prepare("
    INSERT INTO user (nom, prenom, rue, numero, code_postal, ville, pays, mail)
    VALUES (:nom, :prenom, :rue, :numero, :code_postal, :ville, :pays, :mail)
");

$nom = "Decroix";
$prenom = "Noa";
$rue = "ma super rue";
$numero = 5;
$code_postal = 59530;
$ville = "Locquignol";
$pays = " France";
$mail = "noah.decroix3@gmail.com";


$stm->bindParam(':nom', $nom);
$stm->bindParam(':prenom', $prenom);
$stm->bindParam(':rue', $rue);
$stm->bindParam(':numero', $numero);
$stm->bindParam(':code_postal', $code_postal);
$stm->bindParam(':ville', $ville);
$stm->bindParam(':pays', $pays);
$stm->bindParam(':mail', $mail);

/*if ($stm->execute()) {
    echo "L'utilisateur à été ajouté avec succès";
}
**/
$id = 4;
$prenom = "Noah";
 $stm = DB_Connect::dbConnect()->prepare("
    UPDATE user SET prenom = :prenom WHERE id = :id
 ");

$stm->bindParam(":prenom", $prenom);
$stm->bindParam(":id", $id);

if ($stm->execute()) {
    echo "L'utilisateur à été modifié avec succès";
}


/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */