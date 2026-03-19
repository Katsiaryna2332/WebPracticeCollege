<?php
    $to = 'koshkalojka7@gmail.com';
    $subject = "Test";
    $message = "Здравствуйте!\r\n Вы подписались на рассылку\r\n по ПССИП";

    $message = wordwrap($message, 70, "\r\n"); 
    $headers = 'From: PSSIP@tut.by'. "\r\n".
                'X-Mailer: PHP/' .phpversion();

    if(mail($to, $subject, $message, $headers)) echo "Письмо с темой ".$subject." на адрес ".$to." отправлено";
?>
