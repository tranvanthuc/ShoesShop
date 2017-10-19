<?php 

namespace utils;
use core\lib\PHPMailer;

class Functions 
{
  public static function blockPage() 
  {
    $blockRoutes = ['login', 'register'];
    $currentUri = $_SERVER['REQUEST_URI']; 
  
    foreach($blockRoutes as $route) 
    {
      if(strpos($currentUri, $route)){
        return true;
      }
    }
  
    return false;
  }

  // return api
  public static function returnAPI($data = [], $success = "", $failure = "")
  {
    $result ;
    if ($data) {
      $result = [
        "status" => true,
        "message" => $success,
        "results" => $data
      ];
    } else {
      $result = [
        "status" => false,
        "message" => $failure,
        "results" => $data
      ];
    }
    echo \json_encode($result);
  }


  // get params
  public static function getStringParams($params)
  {
    $result = [];
    $keys = array_keys($params); // 'email' 'name'
    $values = array_values($params); // 'thuc@gmail.com', 'thuc'
    $length = count($params);
    for($i=0; $i< $length; $i++) {
      if(gettype($values[$i]) === "string") {
        $temp = $keys[$i] . "=\"" .$values[$i]. "\"";
      }
      else {
        $temp = $keys[$i] . "=" .$values[$i];
      } 
      array_push($result, $temp);
    }
    return $result;
  } 

  // get json from front-end
  public static function getDataFromClient() 
  {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata, true);
    return $request;
  }

  // get array 
  public static function getArraySizes($sizes)
  {
    $result = [];
    foreach( $sizes as $key ) {
      array_push($result , $key->size);
    }
    return $result;
  }

  // conver string to array
  public static function convertStrToArray($char, $string)
  {
    return explode($char, $string);
  }

  // attachment file 
  public static function attachFile($file) 
  {
    $dirUpload = "public/uploads/";
    $pathFile = $dirUpload . $file['name'];
    move_uploaded_file($file['tmp_name'], $pathFile);

    return $pathFile;
  }

  // send Mail
  public static function sendMail($data, $pathFile)
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
      
      $mail->addAddress($data['email'], $data['fullname']);     // Add a recipient
      // email của người được nhận

      $mail->addReplyTo($mail->Username, $officeName);
      // email ta muốn họ reply lại
      if (strcmp($data['cc'],"")) {
        $ccs = static::convertStrToArray(',' ,$data['cc']);
        foreach($ccs as $cc) {
          $mail->addCC($cc);
        }
      }
      // cc Carbon copy gửi 1 bản sao cho nhiều người,
      // và họ thấy được danh sách những người được gửi

      if (strcmp($data['bcc'],"")) {
        $bccs = static::convertStrToArray(',' ,$data['bcc']);
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
      $mail->Body    = $data['content'];
  
      $mail->send();
      // echo 'Message has been sent';
    } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    
  }
}