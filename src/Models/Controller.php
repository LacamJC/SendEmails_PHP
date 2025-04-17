<?php 
use SendMail\Sender\SendEmail;
require_once '../../vendor/autoload.php';

class Controller{
    private $emails;
    private $message;
    

    public function __construct(){
        $this->emails = [];
        $this->message = '';
    }

    public function add(Destinatario $destinatario){
        $this->emails[] = $destinatario->getEmail(); 
    }

    public function setMessage(Message $message){
        $this->message = $message;
    }

    public function send(){
        if(count($this->emails) == 0 )
        {
            throw new Exception("Não há emails para enviar");
        }

        try{
            foreach($this->emails as $email){
                $mail = new SendEmail('', $email, $email, $this->message->getSubject(), $this->message->getBody() );

                $result = $mail->send();

                if($result){
                    echo "Email enviado com sucesso";
                    echo "<br>";
                }else{
                    echo "Erro ao enviar email para: " . $email;
                    echo "<br>";
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}

?>