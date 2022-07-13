<?php
namespace frontend\lib\mail;

use Yii;
use PHPMailer\PHPMailer\PHPMailer as PHPMailerClient;
use PHPMailer\PHPMailer\SMTP;
use Exception;

class PHPMailer {
    public $host;
    public $username;
    public $port;

    private $mail;
    private $password;

    public function __construct($host, $username, $password, $port = 465) {
        $this->host     = $host;
        $this->username = $username;
        $this->password = $password;
        $this->port     = $port;
        
        if (empty($this->host) || empty($this->username) || empty($this->password)) {
            throw new Exception("Enter host, username, password");
        }
        try {
            $this->$mail              = new PHPMailerClient(true);
            $this->$mail->isSMTP();
            $this->$mail->Host        = $this->host;
            $this->$mail->SMTPAuth    = true;
            $this->$mail->Username    = $this->username;
            $this->$mail->Password    = $this->password;
            $this->$mail->SMTPSecure  = PHPMailerClient::ENCRYPTION_SMTPS;
            $this->$mail->Port        = $this->port;
            $this->$mail->CharSet     = "UTF-8";
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function sendTemplate($templateName, $templateContent, $message) {
        $template = $this->getTemplate($templateName);

        try {
            $this->$mail->setFrom($message['from_email'], $message['from_name']);
    
            foreach ($message['to'] as $to) {
                if ($to['type'] == 'to') {
                    $this->$mail->addAddress($to['email'], $to['name']);
                }
                if ($to['type'] == 'cc') {
                    $this->$mail->addCC($to['email'], $to['name']);
                }
            }
            
            $content = $this->mergeVar($template, $message['subject'], $templateContent);
            $this->$mail->isHTML(true);
            $this->$mail->Subject = $message['subject'];
            $this->$mail->Body    = $content;
            
            $this->$mail->send();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTemplate($name) {
        try {
            $path = Yii::getAlias('@frontend')."/lib/mail/templates/".$name.".html";
            return file_get_contents($path);
        } catch (Exception $e) {
            return null;
        }
    }

    public function mergeVar($template, $subject, $variables) {
        $template = str_replace('[[subject]]', $subject, $template);
        $template = str_replace('[[CURRENT_YEAR]]', date('Y'), $template);
        $template = str_replace('[[COMPANY_NAME]]', 'Fengshui Republic Sdn Bhd', $template);
        $template = str_replace('[[preview_text]]', '', $template);
        foreach ($variables as $var) {
            $template = str_replace('[['.$var['name'].']]', $var['content'], $template);
        }
        return $template;
    }
}