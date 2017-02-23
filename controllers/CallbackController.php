<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.01.2017
 * Time: 16:42
 */

namespace app\controllers;
use app\models\Callback;


class CallbackController extends AppController
{
    public function actionSave()
    {
        $data = \Yii::$app->request->post();

        $callback = new Callback($data);

        if ($callback->validate()) {
            // все данные корректны

            $callback->save();
            $callback->status_id = 2;
            $callback->save();
            $callback->sendMail();

            return json_encode([
                'type' => 'success',
            ]);
        } else {
            // данные не корректны: $errors - массив содержащий сообщения об ошибках
            $errors = $callback->errors;

            return json_encode([
                'type' => 'error',
                'errors' => array($errors),
            ]);
        }
    }
}