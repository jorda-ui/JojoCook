<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($email && $name && $message) {
        $to = "JojoCook@gmail.com"; // L'adresse email où vous souhaitez recevoir les messages
        $subject = "Nouveau message de contact de $name";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $email_message = "Vous avez reçu un nouveau message de contact.\n\n";
        $email_message .= "Nom: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Message:\n$message\n";

        if (mail($to, $subject, $email_message, $headers)) {
            echo "Merci ! Votre message a été envoyé.";
        } else {
            echo "Impossible d'envoyer votre message. Veuillez réessayer plus tard.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
