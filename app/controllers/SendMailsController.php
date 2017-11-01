<?php

namespace app\controllers;

use core\libs;
use utils\SendMail;

class SendMailsController
{
    public function getSendMail()
    {
        return view('userDemos/sendMail');
    }

    function sendMailCC()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $nTo = $_POST['user_name'];
        $mTo = $_POST['email'];
        $address = $_POST['ccmail'];

        $mail = SendMail::sendMail($title, $content, $nTo, $mTo, $address);
        if($mail == 1) {
            echo 'Email was sended';            
        } else {
            echo 'false';
        }
    }

    function sendMailAttachment()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $nTo = $_POST['user_name'];
        $mTo = $_POST['email'];
        $address = $_POST['ccemail'];

        $mail = \sendMail($title, $content, $nTo, $mTo, $address, 'public\uploads\ourstory.jpg', 'send image');
        if($mail == 1) {
            echo 'Email was sended';            
        } else {
            echo 'false';
        }
    }
}