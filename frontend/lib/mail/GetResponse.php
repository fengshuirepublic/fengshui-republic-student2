<?php
namespace frontend\lib\mail;

use Yii;
use Getresponse\Sdk\GetresponseClientFactory;
use Getresponse\Sdk\Operation\Model;
use Getresponse\Sdk\Operation\TransactionalEmails\CreateTransactionalEmail\CreateTransactionalEmail;
use Exception;

class GetResponse {
  public $apiKey;
  public $domain;
  public $tagId;

  private $client;

  public function __construct($apiKey, $domain, $tagId) {
    $this->apiKey = $apiKey;
    $this->domain = $domain;
    $this->tagId = $tagId;
    
    if (empty($this->apiKey) || empty($this->domain)) {
      throw new Exception("Enter API Key and Domain provided by GetResponse");
    }
    $this->client = GetresponseClientFactory::createEnterpriseUSWithApiKey($this->apiKey, $this->domain);
  }

  public function sendTemplate($templateName, $templateContent, $message) {
    $template = $this->getTemplate($templateName);

    $recipientTo = null;
    $recipientsCc = [];
    foreach ($message['to'] as $to) {
      if ($to['type'] == 'to') {
        $recipientTo = new Model\TransactionalEmailRecipientTo($to['email']);
        $recipientTo->setName($to['name']);
      }
      if ($to['type'] == 'cc') {
        $recipientCc = new Model\TransactionalEmailRecipientTo($to['email']);
        $recipientCc->setName($to['name']);
        array_push($recipientsCc, $recipientCc);
      }
    }
    
    $emailContent = new Model\TransactionalEmailContent();
    $content = $this->mergeVar($template, $message['subject'], $templateContent);
    $emailContent->setHtml($content);

    $recipients = new Model\TransactionalEmailRecipients($recipientTo);
    if (!empty($recipientsCc)) {
      $recipients->setCc($recipientsCc);
    }

    $modelCreateTransactionalEmail = new Model\CreateTransactionalEmail(
        new Model\FromFieldReference($message['from_field_id']),
        $message['subject'],
        $emailContent,
        $recipients
    );

    $modelCreateTransactionalEmail->setTag(
      new Model\NewTransactionalEmailTag($this->tagId)
    );

    $createTransactionalEmail = new CreateTransactionalEmail($modelCreateTransactionalEmail);
    $response = $this->client->call($createTransactionalEmail);

    return $response->isSuccess();
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