<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 04.01.2017
 * Time: 20:26
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Feedback extends ActiveRecord
{

    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';

    public function rules()
    {
        return [
            // атрибут required указывает, что name, email, text обязательны для заполнения
            [['name', 'mail', 'text'], 'required'],

            // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
            ['mail', 'email'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'ctime',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function sendMail()
    {
        $thisEntity = Feedback::findOne("$this->id");
        $ctime = $thisEntity->ctime;

        $text = "<p>Пользователь: $this->name</p><br><p>Оставил сообщение: $this->text</p><br><p>Время отправки сообщения: $ctime</p><br><p>Почта: $this->mail</p>";


        \app\widgets\MailerToAdmin::widget(array(
            'text' => "$text",
            'subject' => "Новая заявка на обратную связь с сайта www.euro-tehnika.com.ua"
        ));
    }
}