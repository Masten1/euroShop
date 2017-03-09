<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 09.03.2017
 * Time: 14:08
 */

namespace app\widgets;

use yii\base\Widget;

class HeaderScrollLine extends Widget
{
    function run()
    {
        return $this->render('scrollLine.twig');
    }
}