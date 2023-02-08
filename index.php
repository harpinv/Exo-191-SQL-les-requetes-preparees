<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'bdd_cours';

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $dt = new DateTime();
    $date = $dt->format('Y-m-d H:i:s');

    $nom = sanitize('Pit');
    $prenom = sanitize('Brout');
    $email = sanitize('p.brout@gmail.com');
    $password = sanitize('4567');
    $adresse = sanitize('2 Rue Nounou');
    $code_postal = sanitize('59440');
    $pays = sanitize('France');
    $date_enregistrement = sanitize($date);


    $table_test_php = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_enregistrement)
         VALUES (:Pit, :Brout, :p.brout@gmail.com, :4567, :2 Rue Nounou, :59440, :France, :$date)
    ");

    $table_test_php->bindParam(':Pit', $nom);
    $table_test_php->bindParam(':Brout', $prenom);
    $table_test_php->bindParam(':p.brout@gmail.com', $email);
    $table_test_php->bindParam(':4567', $password);
    $table_test_php->bindParam(':2 Rue Nounou', $adresse);
    $table_test_php->bindParam(':59440', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':$date', $date_enregistrement);

    $result = $maConnexion->exec($table_test_php);
    echo $result;

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $titre = sanitize('confiture');
    $prix = sanitize('2');
    $description_courte = sanitize('confiture de fraise');
    $description_longue = sanitize('fraise avec du sucre et un gélifiant');

    $table_test_php = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:confiture, :2, :confiture de fraise, :fraise avec du sucre et un gélifiant)
    ");

    $table_test_php->bindParam(':confiture', $titre);
    $table_test_php->bindParam(':2', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':confiture de fraise', $description_courte);
    $table_test_php->bindParam(':fraise avec du sucre et un gélifiant', $description_longue);

    $result = $maConnexion->exec($table_test_php);
    echo $result;
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $nom = sanitize('Banne');
    $nom = sanitize('Martin');
    $prenom = sanitize('Mac');
    $prenom = sanitize('Vom');
    $email = sanitize('b.mac@gmail.com');
    $email = sanitize('m.vom@gmail.com');
    $password = sanitize('3498');
    $password = sanitize('7102');
    $adresse = sanitize('3 Rue du bouchon');
    $adresse = sanitize('5 Rue melon');
    $code_postal = sanitize('59810');
    $code_postal = sanitize('59230');
    $pays = sanitize('France');
    $pays = sanitize('France');
    $date_enregistrement = sanitize($date);
    $date_enregistrement = sanitize($date);

    $table_test_php = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_enregistrement)
         VALUES (:Banne, :Mac, :b.mac@gmail.com, :3498, :3 Rue du bouchon, :59810, :France, :$date),
         VALUES (:Martin, :Vom, :m.vom@gmail.com, :7102, :5 Rue melon, :59230, :France, :$date)
    ");

    $table_test_php->bindParam(':Banne', $nom);
    $table_test_php->bindParam(':Martin', $nom);
    $table_test_php->bindParam(':Mac', $prenom);
    $table_test_php->bindParam(':Vom', $prenom);
    $table_test_php->bindParam(':b.mac@gmail.com', $email);
    $table_test_php->bindParam(':m.vom@gmail.com', $email);
    $table_test_php->bindParam(':3498', $password);
    $table_test_php->bindParam(':7102', $password);
    $table_test_php->bindParam(':3 Rue du bouchon', $adresse);
    $table_test_php->bindParam(':5 Rue melon', $adresse);
    $table_test_php->bindParam(':59810', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':59230', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':$date', $date_enregistrement);
    $table_test_php->bindParam(':$date', $date_enregistrement);

    $result = $maConnexion->exec($table_test_php);
    echo $result;

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.

    $titre = sanitize('miel');
    $titre = sanitize('chocolat');
    $prix = sanitize('3');
    $prix = sanitize('1');
    $description_courte = sanitize('miel des abeille');
    $description_courte = sanitize('tablette de chocolat');
    $description_longue = sanitize('miel liquide fabriqué par des abeille pendant un été');
    $description_longue = sanitize('tablette de chocolat au lait de 200g');

    $table_test_php = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:miel, :3, :miel des abeille, :miel liquide fabriqué par des abeille pendant un été),
         VALUES (:chocolat, :1, :tablette de chocolat, :tablette de chocolat au lait de 200g)
    ");

    $table_test_php->bindParam(':miel', $titre);
    $table_test_php->bindParam(':chocolat', $titre);
    $table_test_php->bindParam(':3', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':1', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':miel des abeille', $description_courte);
    $table_test_php->bindParam(':tablette de chocolat', $description_courte);
    $table_test_php->bindParam(':miel liquide fabriqué par des abeille pendant un été', $description_longue);
    $table_test_php->bindParam(':tablette de chocolat au lait de 200g', $description_longue);

    $result = $maConnexion->exec($table_test_php);
    echo $result;

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $nom = sanitize('Color');
    $nom = sanitize('Pate');
    $nom = sanitize('Violet');
    $prenom = sanitize('Will');
    $prenom = sanitize('Paffe');
    $prenom = sanitize('Blanc');
    $email = sanitize('c.will@gmail.com');
    $email = sanitize('p.paffe@gmail.com');
    $email = sanitize('v.blanc@gmail.com');
    $password = sanitize('6082');
    $password = sanitize('9345');
    $password = sanitize('4071');
    $adresse = sanitize('1 Rue point');
    $adresse = sanitize('6 Rue pontton');
    $adresse = sanitize('4 Rue du marrais');
    $code_postal = sanitize('59764');
    $code_postal = sanitize('59342');
    $code_postal = sanitize('59214');
    $pays = sanitize('France');
    $pays = sanitize('France');
    $pays = sanitize('France');
    $date_enregistrement = sanitize($date);
    $date_enregistrement = sanitize($date);
    $date_enregistrement = sanitize($date);

    $table_test_php = $maConnexion->prepare("
         INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_enregistrement)
         VALUES (:Color, :Will, :c.will@gmail.com, :6082, :1 Rue point, :59764, :France, :$date),
         VALUES (:Pate, :Paffe, :p.paffe@gmail.com, :9345, :6 Rue pontton, :59342, :France, :$date),
         VALUES (:Violet, :Blanc, :v.blanc@gmail.com, :4071, :4 Rue du marrais, :59214, :France, :$date)
    ");

    $table_test_php->bindParam(':Color', $nom);
    $table_test_php->bindParam(':Pate', $nom);
    $table_test_php->bindParam(':Violet', $nom);
    $table_test_php->bindParam(':Will', $prenom);
    $table_test_php->bindParam(':Paffe', $prenom);
    $table_test_php->bindParam(':Blanc', $prenom);
    $table_test_php->bindParam(':c.will@gmail.com', $email);
    $table_test_php->bindParam(':p.paffe@gmail.com', $email);
    $table_test_php->bindParam(':v.blanc@gmail.com', $email);
    $table_test_php->bindParam(':6082', $password);
    $table_test_php->bindParam(':9345', $password);
    $table_test_php->bindParam(':4071', $password);
    $table_test_php->bindParam(':1 Rue point', $adresse);
    $table_test_php->bindParam(':6 Rue pontton', $adresse);
    $table_test_php->bindParam(':4 Rue du marrais', $adresse);
    $table_test_php->bindParam(':59764', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':59342', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':59214', $code_postal,PDO::PARAM_INT);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':France', $pays);
    $table_test_php->bindParam(':$date', $date_enregistrement);
    $table_test_php->bindParam(':$date', $date_enregistrement);
    $table_test_php->bindParam(':$date', $date_enregistrement);

    $result = $maConnexion->exec($table_test_php);
    echo $result;

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $titre = sanitize('lait');
    $titre = sanitize('oeuf');
    $titre = sanitize('fromage');
    $prix = sanitize('2');
    $prix = sanitize('1');
    $prix = sanitize('3');
    $description_courte = sanitize('lait de vache');
    $description_courte = sanitize('oeuf de poule');
    $description_courte = sanitize('fromage raclette');
    $description_longue = sanitize('bouteille de un litre demi écrémé');
    $description_longue = sanitize('oeuf de poule élevé en plaine et au grain');
    $description_longue = sanitize('fait au lait de vache pasteurisé');

    $table_test_php = $maConnexion->prepare("
         INSERT INTO produit (titre, prix, description_courte, description_longue)
         VALUES (:lait, :2, :lait de vache, :bouteille de un litre demi écrémé),
         VALUES (:oeuf, :1, :oeuf de poule, :oeuf de poule élevé en plaine et au grain),
         VALUES (:fromage, :3, :fromage raclette, :fait au lait de vache pasteurisé)
    ");

    $table_test_php->bindParam(':lait', $titre);
    $table_test_php->bindParam(':oeuf', $titre);
    $table_test_php->bindParam(':fromage', $titre);
    $table_test_php->bindParam(':2', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':1', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':3', $prix,PDO::PARAM_INT);
    $table_test_php->bindParam(':lait de vache', $description_courte);
    $table_test_php->bindParam(':oeuf de poule', $description_courte);
    $table_test_php->bindParam(':fromage raclette', $description_courte);
    $table_test_php->bindParam(':bouteille de un litre demi écrémé', $description_longue);
    $table_test_php->bindParam(':oeuf de poule élevé en plaine et au grain', $description_longue);
    $table_test_php->bindParam(':fait au lait de vache pasteurisé', $description_longue);

    $result = $maConnexion->exec($table_test_php);
    echo $result;
}
catch (PDOException $exception) {
    echo "Erreur de connexion: " . $exception->getMessage();
}