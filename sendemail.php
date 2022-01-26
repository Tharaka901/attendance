<?php
    require "vendor/autoload.php";

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key="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";

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("tharakamihiri@gmail.com", "Tharaka Mihiri");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);  

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo "Email exeption Caught : ".$e->getMessage() . "\n";
                return false;
            }

        }
    }
?> 