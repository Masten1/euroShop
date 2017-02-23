<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 15.01.2017
 * Time: 14:31
 */

namespace app\widgets;
use yii\base\Widget;


class MailerToCustomer extends Widget
{
    // A property
    public $text = '';
    public $subject = '';
    public $customerMail = '';

    public function run()
    {
        \Yii::$app->mailer->compose()
            ->setFrom('mail@euro-tehnika.com.ua')
            ->setTo("$this->customerMail")
            ->setSubject("$this->subject")
            ->setHtmlBody("$this->text")
            ->send();
    }
}