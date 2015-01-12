<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 */
class Mailer {

    const EMAIL = true;
    const HOST = "mx1.hostinger.es";
    const PORT = "2525";
    const SMTP_AUTH = true;
    const SMTP_SECURE = "tls/ssl";
    const USERNAME = "dadyalex777@meetclic.com";
    const PASSWORD = "electrap0724p";
    const FROM = "dadyalex777@meetclic.com";
    const FROM_NAME = "Miguel Alba";

    public static function enviarEmail($to, $subject, $body, $from = self::FROM, $fromName = self::FROM_NAME) {
//            var_dump("entro envio");
            if (self::EMAIL) {
                Yii::app()->mailer->Host = self::HOST;
                Yii::app()->mailer->IsSMTP();
                Yii::app()->mailer->Port = self::PORT;
                Yii::app()->mailer->SMTPAuth = self::SMTP_AUTH;
                Yii::app()->mailer->SMTPSecure = self::SMTP_SECURE;
                Yii::app()->mailer->Username = self::USERNAME;
                Yii::app()->mailer->Password = self::PASSWORD;
                Yii::app()->mailer->From = $from;
                Yii::app()->mailer->FromName = $fromName;
                Yii::app()->mailer->AddReplyTo($from);
                Yii::app()->mailer->IsHTML(true);
                if (is_array($to)) {
                    foreach ($to as $t) {
                        Yii::app()->mailer->AddAddress($t);
                    }
                } else {
                    Yii::app()->mailer->AddAddress($to);
                }
                Yii::app()->mailer->Subject = $subject;
                Yii::app()->mailer->Body = $body;
                if (!Yii::app()->mailer->Send()) {
                    throw new Exception('Error enviando el correo');
                } else {
                    var_dump("nvio l correo");
                    die();
                }
            } else {
                
            }
         
    }

}

?>
