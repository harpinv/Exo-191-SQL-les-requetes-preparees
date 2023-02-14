<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'table_test_phpmyadmin';


try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $maConnexion->beginTransaction();
    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $table_test_php_1 = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join)
         VALUES (:nom, :prenom, :email, :pass, :adresse, :code_postal, :pays, :date_join)
    ");

    $table_test_php_1->bindParam(':nom', $nom);
    $table_test_php_1->bindParam(':prenom', $prenom);
    $table_test_php_1->bindParam(':email', $email);
    $table_test_php_1->bindParam(':pass', $pass);
    $table_test_php_1->bindParam(':adresse', $adresse);
    $table_test_php_1->bindParam(':code_postal', $code_postal);
    $table_test_php_1->bindParam(':pays', $pays);
    $table_test_php_1->bindParam(':date_join', $date);

    $dt = new DateTime();
    $date = $dt->format('Y-m-d H:i:s');

    $nom = 'Pit';
    $prenom = 'Brout';
    $email = 'p.brout@gmail.com';
    $pass = '4567';
    $adresse = '2 Rue Nounou';
    $code_postal = '59440';
    $pays = 'France';

    $table_test_php_1->execute();

    $maConnexion->commit();

    /**
     * 2. Insérez un nouveau produit dans la table produit
    */

    // TODO votre code ici.

    $maConnexion->beginTransaction();

    $table_test_php_2 = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:titre, :prix, :description_courte, :description_longue)
    ");

    $table_test_php_2->bindParam(':titre', $titre);
    $table_test_php_2->bindParam(':prix', $prix);
    $table_test_php_2->bindParam(':description_courte', $description_courte);
    $table_test_php_2->bindParam(':description_longue', $description_longue);

    $titre = 'confiture';
    $prix = '2';
    $description_courte = 'confiture de fraise';
    $description_longue = 'fraise avec du sucre et un gélifiant';

    $table_test_php_2->execute();

    $maConnexion->commit();

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
    */

    // TODO Votre code ici.

    $maConnexion->beginTransaction();

    $table_test_php_3 = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join)
         VALUES (:nom1, :prenom1, :email1, :password1, :adresse1, :code_postal1, :pays1, :date_join1),
                (:nom2, :prenom2, :email2, :password2, :adresse2, :code_postal2, :pays2, :date_join2)
    ");

    $table_test_php_3->bindParam(':nom1', $nom1);
    $table_test_php_3->bindParam(':nom2', $nom2);
    $table_test_php_3->bindParam(':prenom1', $prenom1);
    $table_test_php_3->bindParam(':prenom2', $prenom2);
    $table_test_php_3->bindParam(':email1', $email1);
    $table_test_php_3->bindParam(':email2', $email2);
    $table_test_php_3->bindParam(':password1', $pass1);
    $table_test_php_3->bindParam(':password2', $pass2);
    $table_test_php_3->bindParam(':adresse1', $adresse1);
    $table_test_php_3->bindParam(':adresse2', $adresse2);
    $table_test_php_3->bindParam(':code_postal1', $code_postal1);
    $table_test_php_3->bindParam(':code_postal2', $code_postal2);
    $table_test_php_3->bindParam(':pays1', $pays);
    $table_test_php_3->bindParam(':pays2', $pays);
    $table_test_php_3->bindParam(':date_join1', $date1);
    $table_test_php_3->bindParam(':date_join2', $date2);

    $dt1 = new DateTime();
    $date1 = $dt1->format('Y-m-d H:i:s');

    $dt2 = new DateTime();
    $date2 = $dt2->format('Y-m-d H:i:s');

    $nom1 = 'Banne';
    $nom2 = 'Martin';
    $prenom1 = 'Mac';
    $prenom2 = 'Vom';
    $email1 = 'b.mac@gmail.com';
    $email2 = 'm.vom@gmail.com';
    $pass1 = '3498';
    $pass2 = '7102';
    $adresse1 = '3 Rue du bouchon';
    $adresse2 = '5 Rue melon';
    $code_postal1 = '59810';
    $code_postal2 = '59230';
    $pays1 = 'France';
    $pays2 = 'France';

    $table_test_php_3->execute();

    $maConnexion->commit();

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
    */

    // TODO Votre code ici.

    $maConnexion->beginTransaction();

    $table_test_php_4 = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:titre1, :prix1, :description_courte1, :description_longue1),
                (:titre2, :prix2, :description_courte2, :description_longue2)
    ");

    $table_test_php_4->bindParam(':titre1', $titre1);
    $table_test_php_4->bindParam(':titre2', $titre2);
    $table_test_php_4->bindParam(':prix1', $prix1);
    $table_test_php_4->bindParam(':prix2', $prix2);
    $table_test_php_4->bindParam(':description_courte1', $description_courte1);
    $table_test_php_4->bindParam(':description_courte2', $description_courte2);
    $table_test_php_4->bindParam(':description_longue1', $description_longue1);
    $table_test_php_4->bindParam(':description_longue2', $description_longue2);

    $titre1 = 'miel';
    $titre2 = 'chocolat';
    $prix1 = '3';
    $prix2 = '1';
    $description_courte1 = 'miel des abeille';
    $description_courte2 = 'tablette de chocolat';
    $description_longue1 = 'miel liquide fabriqué par des abeille pendant un été';
    $description_longue2 = 'tablette de chocolat au lait de 200g';

    $table_test_php_4->execute();

    $maConnexion->commit();

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
    */

    // TODO Votre code ici.

    $maConnexion->beginTransaction();

    $table_test_php_5 = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join)
         VALUES (:nom1, :prenom1, :email1, :password1, :adresse1, :code_postal1, :pays1, :date_join1),
                (:nom2, :prenom2, :email2, :password2, :adresse2, :code_postal2, :pays2, :date_join2),
                (:nom3, :prenom3, :email3, :password3, :adresse3, :code_postal3, :pays3, :date_join3)
    ");

    $table_test_php_5->bindParam(':nom1', $nom1);
    $table_test_php_5->bindParam(':nom2', $nom2);
    $table_test_php_5->bindParam(':nom3', $nom3);
    $table_test_php_5->bindParam(':prenom1', $prenom1);
    $table_test_php_5->bindParam(':prenom2', $prenom2);
    $table_test_php_5->bindParam(':prenom3', $prenom3);
    $table_test_php_5->bindParam(':email1', $email1);
    $table_test_php_5->bindParam(':email2', $email2);
    $table_test_php_5->bindParam(':email3', $email3);
    $table_test_php_5->bindParam(':password1', $pass1);
    $table_test_php_5->bindParam(':password2', $pass2);
    $table_test_php_5->bindParam(':password3', $pass3);
    $table_test_php_5->bindParam(':adresse1', $adresse1);
    $table_test_php_5->bindParam(':adresse2', $adresse2);
    $table_test_php_5->bindParam(':adresse3', $adresse3);
    $table_test_php_5->bindParam(':code_postal1', $code_postal1);
    $table_test_php_5->bindParam(':code_postal2', $code_postal2);
    $table_test_php_5->bindParam(':code_postal3', $code_postal3);
    $table_test_php_5->bindParam(':pays1', $pays1);
    $table_test_php_5->bindParam(':pays2', $pays2);
    $table_test_php_5->bindParam(':pays3', $pays3);
    $table_test_php_5->bindParam(':date_join1', $date1);
    $table_test_php_5->bindParam(':date_join2', $date2);
    $table_test_php_5->bindParam(':date_join3', $date3);

    $dt1 = new DateTime();
    $date1 = $dt1->format('Y-m-d H:i:s');

    $dt2 = new DateTime();
    $date2 = $dt2->format('Y-m-d H:i:s');

    $dt3 = new DateTime();
    $date3 = $dt3->format('Y-m-d H:i:s');

    $nom1 = 'Color';
    $nom2 = 'Pate';
    $nom3 = 'Violet';
    $prenom1 = 'Will';
    $prenom2 = 'Paffe';
    $prenom3 = 'Blanc';
    $email1 = 'c.will@gmail.com';
    $email2 = 'p.paffe@gmail.com';
    $email3 = 'v.blanc@gmail.com';
    $pass1 = '6082';
    $pass2 = '9345';
    $pass3 = '4071';
    $adresse1 = '1 Rue point';
    $adresse2 = '6 Rue pontton';
    $adresse3 = '4 Rue du marrais';
    $code_postal1 = '59764';
    $code_postal2 = '59342';
    $code_postal3 = '59214';
    $pays1 = 'France';
    $pays2 = 'France';
    $pays3 = 'France';

    $table_test_php_5->execute();

    $maConnexion->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $maConnexion->beginTransaction();

    $table_test_php_6 = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:titre1, :prix1, :description_courte1, :description_longue1),
                (:titre2, :prix2, :description_courte2, :description_longue2),
                (:titre3, :prix3, :description_courte3, :description_longue3)
    ");

    $table_test_php_6->bindParam(':titre1', $titre1);
    $table_test_php_6->bindParam(':titre2', $titre2);
    $table_test_php_6->bindParam(':titre3', $titre3);
    $table_test_php_6->bindParam(':prix1', $prix1);
    $table_test_php_6->bindParam(':prix2', $prix2);
    $table_test_php_6->bindParam(':prix3', $prix3);
    $table_test_php_6->bindParam(':description_courte1', $description_courte1);
    $table_test_php_6->bindParam(':description_courte2', $description_courte2);
    $table_test_php_6->bindParam(':description_courte3', $description_courte3);
    $table_test_php_6->bindParam(':description_longue1', $description_longue1);
    $table_test_php_6->bindParam(':description_longue2', $description_longue2);
    $table_test_php_6->bindParam(':description_longue3', $description_longue3);

    $titre1 = 'lait';
    $titre2 = 'oeuf';
    $titre3 = 'fromage';
    $prix1 = '2';
    $prix2 = '5';
    $prix2 = '3';
    $description_courte1 = 'lait de vache';
    $description_courte2 = 'oeuf de poule';
    $description_courte3 = 'fromage raclette';
    $description_longue1 = 'bouteille de un litre demi écrémé';
    $description_longue2 = 'oeuf de poule élevé en plaine et au grain';
    $description_longue3 = 'fait au lait de vache pasteurisé';

    $table_test_php_6->execute();

    $maConnexion->commit();
}
catch (PDOException $exception) {
    echo "Erreur de connexion: " . $exception->getMessage();
}