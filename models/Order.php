<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 08.01.2017
 * Time: 22:54
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Order extends ActiveRecord
{
    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';

    public function rules()
    {
        return [
            // атрибут required указывает, что name, email, text обязательны для заполнения
            [['name', 'phone', 'mail'], 'required'],

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
        $thisEntity = Order::findOne("$this->id");
        $ctime = $thisEntity->ctime;

        $product = Product::findOne($this->productId);
        $productUrl = "www.euro-tehnika.com.ua".$product->url;

        $text = "Уважаемый товарищ. <br>
                Поступил заказ на товарную позицию <b><a href='$productUrl'>$product->title</a></b>, 
                для потверждения заказа свяжитесь с заказчиком (контактные данные):<br><br>
                Имя: <b>$this->name</b><br><br>
                Телефон: <b>$this->phone</b><br><br>
                Почта: <b>$this->mail</b><br><br>
                Время заказа: <b>$ctime</b>";

        //to admin
        \app\widgets\MailerToAdmin::widget(array(
            'text' => "$text",
            'subject' => "У Вас заказ на покупку товара с сайта www.euro-tehnika.com.ua"
        ));

        //to customer
        $textToCustomer = "Уважаемый $this->name, Вы совершили заказ <b><a href='$productUrl'>$product->title</a></b> 
                в интернет - магазине <b><a href='http://www.euro-tehnika.com.ua'>euro-tehnika</a></b>.<br>
                В ближайшее время с Вами свяжеться представитель нашей компании, для уточнение деталей заказа и доставки.<br> 
                Спасибо, что вы с нами, интернет магазин <b><a href='http://www.euro-tehnika.com.ua'>euro-tehnika</a></b>.";

        \app\widgets\MailerToCustomer::widget(array(
            'text' => "$textToCustomer",
            'subject' => "Заказ № $this->id",
            'customerMail' => "$this->mail"
        ));
    }
}