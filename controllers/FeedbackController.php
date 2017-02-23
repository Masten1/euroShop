<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 04.01.2017
 * Time: 21:29
 */

namespace app\controllers;
use app\models\Feedback;


class FeedbackController extends AppController
{
    public function actionSave()
    {
        $data = \Yii::$app->request->post();

        $feedback = new Feedback($data);

        if ($feedback->validate()) {
            // все данные корректны

            $feedback->save();
            $feedback->status_id = 2;
            $feedback->save();
            $feedback->sendMail();

            return json_encode([
                'type' => 'success',
            ]);
        } else {
            // данные не корректны: $errors - массив содержащий сообщения об ошибках
            $errors = $feedback->errors;

            return json_encode([
                'type' => 'error',
                'errors' => array($errors),
            ]);
        }
    }
}