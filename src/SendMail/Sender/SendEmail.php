<?php 

namespace SendMail\Sender;
require_once '../../config.php';

// require __DIR__ . '../../../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class SendEmail{
    private $to;
    private $from;
    private $port = 587;
    private $subject;
    private $body;
    private $host = 'smtp.gmail.com';
    private $name;
  

    public function __construct($name = '',$to, $from, $subject, $body)
    {
        $this->name = $name;
        $this->setTo($to);
        $this->setFrom($from);
        $this->setSubject($subject);
        $this->setBody($body);
    }

    public function send(){
        $mail  = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = $this->host;
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ativa STARTTLS
            $mail->Port = $this->port;

            $mail->setFrom($this->from, $this->name);
            $mail->addAddress($this->to);

            $mail->Subject = $this->subject;
            $mail->Body = $this->body;

            $mail->send();
            return true;

        }catch(Exception $e){
            echo "Erro: {$mail->ErrorInfo}";
            return false;
        }
    }


    public function setTo($to){
        $this->to = $to;
    }
    public function setFrom($from){
        $this->from = $from;
    }
    public function setSubject($subject){
        $this->subject = $subject;
    }
    public function setBody($body){
        $this->body = $body;
    }
}

?>