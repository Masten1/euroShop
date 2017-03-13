<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 05.01.2017
 * Time: 12:31
 */

namespace app\widgets;
use yii\base\Widget;


class MailerToAdmin extends Widget
{
    // A property
    public $text = '';
    public $subject = '';

    public function run()
    {
        \Yii::$app->mailer->compose()
            ->setFrom('mail@euro-tehnika.com.ua')
            ->setTo(array('masterfrod1991@gmail.com', 'info@euro-tehnika.com.ua'))
            ->setSubject("$this->subject")
            ->setHtmlBody("$this->text")
            ->send();
    }
}