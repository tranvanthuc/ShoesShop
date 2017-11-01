<?php

namespace utils;

class SendMail 
{
    public static function sendMail($title, $content, $nTo, $mTo, $addressCC='')
    {
        $nFrom = 'ShoesShop';
        $mFrom = 'minhthai0124@gmail.com'; //my email address
        $mPass = 'macminhthu1303'; //my email address pass
        $mail = new PHPMailer();
        $body = $content;
        
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPDebug = 0; //enable SMTP debug information for testing
        $mail->SMTPAuth = true; //enable SMTP authentication
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = $mFrom; //Gmail user name
        $mail->Password = $mPass; //Gmail pasword
        $mail->setFrom($mFrom, $nFrom);

        $ccmail = explode(',', $addressCC);
        $ccmail = array_filter($ccmail);
        if($empty($ccmail)) {
            foreach($ccmail as $key => $value) {
                $mail->addCC($value);
            }
        }
        $mail->Subject = $title;
        $mail->msgHTML($body);
        $address = $mTo;
        $mail->addAddress($address, $nTo);
        $mail->ReplyTo('info@ShoesShop', 'ShoesShop');
        if($mail->send()) {
            return 0;
        } else {
            return 1;
        }
    }

    public static  function sendMailAttachment($title, $content, $nTo, $mTo, $addressCC='', $file, $fileName)
    {
        $nFrom = "ShoesShop";
        $mFrom = "minhthai0124@gmail.com";
        $mPass = "macminhthu1303";
        $mail = new PHPMailer();
        $body = $content;

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPDebug = 0; //enable SMTP debug information for testing
        $mail->SMTPAuth = true; //enable SMTP authentication
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = $mFrom; //Gmail user name
        $mail->Password = $mPass; //Gmail pasword
        $mail->setFrom($mFrom, $nFrom);

        $ccmail = exlode(',', $addressCC);
        $ccmail = array_filter($ccmail);
        if(!empty($ccmail)) {
            foreach($ccmail as $key => $value) {
                $mail->addCC($value);
            }
        }
        $mail->Subject = $title;
        $mail->msgHTML($body);
        $address = $mTo;
        $mail->addAddress($address, $nTo);
        $mail->addReplyTo('info@ShoesShop', 'ShoesShop');
        $mail->addAttachment($file, $fileName);
        if(!$mail->send()) {
            return 0;
        } else {
            return 1;
        }    
    }
}