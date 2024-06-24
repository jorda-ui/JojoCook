<?php
// Démarrez la session
session_start();

// Détruisez toutes les variables de session
session_unset();

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur vers une page de confirmation ou une autre page de votre choix
header("Location: Accueil.html"); // Remplacez "index.php" par l'URL de la page vers laquelle vous souhaitez rediriger l'utilisateur après la déconnexion
exit;
?>
