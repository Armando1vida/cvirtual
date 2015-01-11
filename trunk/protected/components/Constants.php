<?php


class Constants {

    //constantes
    //constante para el envío de mails
    const SEND_MAILS = true;
    

    /* Key para Mandrill App */
    const KEY_MANDRILLAPP = "geLwclGctKoLT8n4Us5ZkQ";


    /*     * Medios de Envio Mail* */

    const MAIL_MANDRILL = "MANDRILL";
    const MAIL_YIIMAILER = "YIIMAILER";


    /* Array Medios de envio MAIL */

    public static $codigoMail = array(
        1 => array('id' => 1, 'nombre' => self::MAIL_MANDRILL),
        2 => array('id' => 2, 'nombre' => self::MAIL_YIIMAILER),
    );

    /* Array Medios de envio SMS */
    public static $mediosEnvioSms = array(
        1 => array('id' => 1, 'nombre' => self::SMS_MEDIO_SOAP),
    );



}
