<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.01.2017
 * Time: 15:14
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Callback extends ActiveRecord
{
    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';

    public function rules()
    {
        return [
            [['phone'], 'required'],
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
        $thisEntity = Callback::findOne("$this->id");
        $ctime = $thisEntity->ctime;

        $text = "<p>Заказ обратного звонка</p><br>
                <p>Номер телефона: $this->phone</p><br>
                <p>Время заявки: $ctime</p>";


        \app\widgets\MailerToAdmin::widget(array(
            'text' => "$text",
            'subject' => "заказ звонка с сайта www.euro-tehnika.com.ua"
        ));
    }
}