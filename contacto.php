<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Dirección de correo a la que se enviará el mensaje (tu correo)
    $to = "santiivlogstudios@gmail.com";  // Cambia esto por tu correo electrónico
    $subject = "Nuevo mensaje de contacto desde el sitio web";
    $message = "Nombre: $nombre\nCorreo: $email\nMensaje: $mensaje";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Si el correo se envió correctamente, mostrar mensaje de agradecimiento
        echo "
        <div class='container mx-auto text-center bg-green-500 text-white p-4 rounded-lg'>
            <h2 class='text-2xl font-bold'>¡Gracias por comunicarte con nosotros!</h2>
            <p>Te responderemos durante 1 o 3 días máximo.</p>
        </div>";
    } else {
        // Si ocurrió un error al enviar el correo, mostrar mensaje de error
        echo "
        <div class='container mx-auto text-center bg-red-500 text-white p-4 rounded-lg'>
            <h2 class='text-2xl font-bold'>Hubo un error al enviar tu mensaje.</h2>
            <p>Por favor, intenta de nuevo más tarde.</p>
        </div>";
    }
}
?>
