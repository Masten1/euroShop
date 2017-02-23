<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.01.2017
 * Time: 15:15
 */

namespace app\widgets;

use yii\base\Widget;


class CallbackForm extends Widget
{
    function run()
    {
        return $this->render('callbackForm.twig');
    }
}