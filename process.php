<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang het e-mailadres uit het formulier
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email) {
        // E-mail onderwerp en bericht
        $subject = "Bevestiging inschrijving nieuwsbrief";
        $message = "Bedankt voor uw inschrijving op onze nieuwsbrief!";
        
        // Headers voor de e-mail
        $headers = "From: jouw-email@domein.com\r\n";
        $headers .= "Reply-To: jouw-email@domein.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Verzend de e-mail
        if (mail($email, $subject, $message, $headers)) {
            echo "Bedankt voor uw inschrijving! Er is een bevestigingsmail naar $email verzonden.";
        } else {
            echo "Er is een fout opgetreden bij het verzenden van de bevestigingsmail.";
        }
    } else {
        echo "Ongeldig e-mailadres. Probeer het opnieuw.";
    }
}
?>
