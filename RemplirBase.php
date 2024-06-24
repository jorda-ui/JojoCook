<html>
<head>
	<title> Confirmation des données </title>
</head>
<body>
<?php

class RemplirBase
{
    private $db;

    // Constructeur de la classe
    public function __construct($host, $username, $password, $database)
    {
        // Connexion à la base de données
        $this->db = mysqli_connect($host, $username, $password, $database);

        // Vérification de la connexion
        if (!$this->db) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }
    }

    // Méthode pour enregistrer les données dans la base de données
    public function enregistre($nom, $prenom, $age, $date_de_naissance, $adresse, $ville, $code_postal, $mail, $nom_utilisateur, $mot_de_passe)
    {
        // Échappement des caractères spéciaux pour éviter les injections SQL
        $nom = mysqli_real_escape_string($this->db, $nom);
        $prenom = mysqli_real_escape_string($this->db, $prenom);
        $age = mysqli_real_escape_string($this->db, $age);
        $date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
        $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
        $code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : '';
        $mail = mysqli_real_escape_string($this->db, $mail);
        $nom_utilisateur = mysqli_real_escape_string($this->db, $nom_utilisateur);
        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO utilisateurs (nom, prenom, age, date_de_naissance, adresse, ville, code_postal, mail, nom_identifiant, mot_de_passe) VALUES ('$nom', '$prenom', '$age', '$date_de_naissance', '$adresse', '$ville', '$code_postal', '$mail', '$nom_utilisateur', '$mot_de_passe')";

        // Exécution de la requête SQL
        if (mysqli_query($this->db, $sql)) {
            return 'Vos informations ont bien été enregistrées dans la base de données';
        } else {
            return "Erreur : " . $sql . "<br>" . mysqli_error($this->db);
        }
    }
}

// Utilisation de la classe RemplirBase
$remplir = new RemplirBase('localhost', 'root', '', 'JojoCook');

// Récupération des données du formulaire
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$nom_utilisateur = isset($_POST['nom_utilisateur']) ? $_POST['nom_utilisateur'] : '';
$mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';

// Appel de la méthode enregistre pour enregistrer les données
$result = $remplir->enregistre($nom, $prenom, $age, $date_de_naissance, $adresse, $ville, $code_postal, $mail, $nom_utilisateur, $mot_de_passe);

// Affichage du résultat de l'enregistrement
echo '<p>' . $result . '</p>';
echo '<p><a href="Connexion.html">Revenir à la page de connexion</a></p>';

?>
</body>
</html>

