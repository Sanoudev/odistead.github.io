<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire de l'email
    $to = "odistead@gmail.com";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Corps de l'email
    $email_body = "Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message";

    // Envoi de l'email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Merci $name, votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite, veuillez réessayer.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>