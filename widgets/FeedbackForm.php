<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 04.01.2017
 * Time: 17:27
 */

namespace app\widgets;


use yii\base\Widget;

class FeedbackForm extends Widget
{
    function run()
    {
        return $this->render('feedbackForm.twig');
    }
}