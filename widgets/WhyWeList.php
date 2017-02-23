<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\WhyWe;


/**
 * Created by PhpStorm.
 * User: masten
 * Date: 18.12.2016
 * Time: 17:13
 */
class WhyWeList extends Widget
{
    function run()
    {
        $whyWe = WhyWe::find()->all();

        return $this->render('whyWeList.twig', compact('whyWe'));
    }
}