<?php

namespace utils;
use core\lib\PHPMailer;
use utils\Functions;

class Mail 
{

  // attachment file 
  public static function attachFile($file) 
  {
    $dirUpload = "public/uploads/";
    $pathFile = $dirUpload . $file['name'];
    move_uploaded_file($file['tmp_name'], $pathFile);

    return $pathFile;
  }

  // send Mail
  public static function send($data, $pathFile)
  {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
      //Server settings
      // $mail->SMTPDebug = 2;             
      $mail->isSMTP();                                      // Set mailer to use SMTP
      // SMTP Simple mail tranfer protocol giao thức gửi mail 
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      // sử dụng host của smtp
      $mail->SMTPAuth = true;           // true          
      // cho phep su dung tai khoan cua ban than de gui mail
      $officeName = "ShoesShop";          // Enable SMTP authentication

      $mail->Username = 'shoesshop365@gmail.com';                 // SMTP username
      $mail->Password = 'shoesshop123';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      // tls Transport layer security la mot giao thu cung cấp sự riêng tư 
      // và toàn vẹn dữ liệu giữa hai ứng dụng trong môi trường mạng
      $mail->Port = 587;                                    // TCP port to connect to
  
      //Recipients
      $mail->setFrom($mail->Username, $officeName);
      // email của mình đăng nhập để gửi mail
      
      $mail->addAddress($data['email'], $data['name']);     // Add a recipient
      // email của người được nhận

      $mail->addReplyTo($mail->Username, $officeName);
      // email ta muốn họ reply lại
      if (strcmp($data['cc'],"")) {
        $ccs = Functions::convertStrToArray(',' ,$data['cc']);
        foreach($ccs as $cc) {
          $mail->addCC($cc);
        }
      }
      // cc Carbon copy gửi 1 bản sao cho nhiều người,
      // và họ thấy được danh sách những người được gửi

      if (strcmp($data['bcc'],"")) {
        $bccs = Functions::convertStrToArray(',' ,$data['bcc']);
        foreach($bccs as $bcc) {
          $mail->addBCC($bcc);
        }
      }
      //  bcc blind Carbon copy gửi 1 bản sao cho nhiều người,
      // và họ không thấy được danh sách những người được gửi

      // attach file 
      if (strcmp($pathFile,"")) {
        $mail->addAttachment($pathFile); 
      }
      
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $data['subject'];
      $mail->Body    = "<strong>You said: </strong> \"" . $data['content'] . "\" <br/>" ;
      $mail->Body    = $mail->Body . $data['response'] . "<br/>" ;
  
      $mail->send();
      // echo 'Message has been sent';
    } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    
  }
}