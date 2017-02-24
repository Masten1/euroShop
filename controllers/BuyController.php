<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 23.02.2017
 * Time: 12:58
 */

namespace app\controllers;

use app\models\Order;
use app\models\Product;


class BuyController extends AppController
{
    public function actionIndex()
    {
        $data = \Yii::$app->request->post();

        $productId = $data["productId"];

        $product = Product::findOne($productId);
        $data["totalPrice"] = $product->getPrice();
        $data["productName"] = $product->title;

        $order = new Order($data);

        if ($order->validate()) {
            // все данные корректны

            $order->save();
            $order->sendMail();

            return json_encode([
                'type' => 'success',
            ]);
        } else {
            // данные не корректны: $errors - массив содержащий сообщения об ошибках
            $errors = $order->errors;

            return json_encode([
                'type' => 'error',
                'errors' => array($errors),
            ]);
        }
    }
}